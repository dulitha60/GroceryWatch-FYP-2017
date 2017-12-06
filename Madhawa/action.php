<?php
session_start();
include "db.php";



if(isset($_POST["getProduct"])){
    $limit = 6;
    if(isset($_POST["setPage"])){
        $pageno = $_POST["pageNumber"];
        $start = ($pageno * $limit) - $limit;
    }else{
        $start = 0;
    }
    
    $product_query = "SELECT * FROM products  LIMIT $start,$limit";
    $run_query = mysqli_query($con, $product_query);
    
    if(mysqli_num_rows($run_query) > 0){
        
        while($row = mysqli_fetch_array($run_query) ){
            
            $product_id = $row["product_id"];
            $product_cat = $row["product_cat"];
            $product_brand = $row["product_brand"];
            $product_title = $row["product_title"];
            $product_price = $row["product_price"];
            $product_desc = $row["product_desc"];
            $product_image = $row["product_image"];
            
            echo "
                
                <div class='col-md-4'>
                            <div class='panel panel-info'>
                                <div class='panel-heading'>$product_title</div>
                                <div class='panel-body'>
                                    <img class='img-responsive rounded mx-auto d-block' src='product_images/$product_image'>
                                </div>
                                <div class='panel-heading'>RM. $product_price
                                    <button pid='$product_id'' style='float:right' class='btn btn-danger btn-xs' id='product'>AddToCart</button>
                                </div>
                            </div>
                        </div>
            
            ";
            
        }
        
    }
    
}

if(isset($_POST["get_selected_Category"]) || isset($_POST["selectbrand"]) || isset($_POST["search"]) ){
    
        if(isset($_POST["get_selected_Category"])){
            $id = $_POST["Cat_id"];
            $sql = "SELECT * from products WHERE  product_cat = '$id'";
        }else if(isset($_POST["selectbrand"])){
            $id = $_POST["brand_id"];
            $sql = "SELECT * from products WHERE  product_brand = '$id'";
        }else{
            $keyword = $_POST["keyword"];
            $sql = "SELECT * from products WHERE  product_keywords LIKE '%$keyword%' ";
        }
    
        
        $run_query = mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($run_query)){
            
            $product_id     = $row["product_id"];
            $product_cat    = $row["product_cat"];
            $product_brand  = $row["product_brand"];
            $product_title  = $row["product_title"];
            $product_price  = $row["product_price"];
            $product_desc   = $row["product_desc"];
            $product_image  = $row["product_image"];
            
            echo "
                
                <div class='col-md-4'>
                            <div class='panel panel-info'>
                                <div class='panel-heading'>$product_title</div>
                                <div class='panel-body'>
                                    <img class='img-responsive rounded mx-auto d-block' src='product_images/$product_image'>
                                </div>
                                <div class='panel-heading'>RM. $product_price
                                    <button pid='$product_id'' style='float:right' class='btn btn-danger btn-xs' id='product'>AddToCart</button>
                                </div>
                            </div>
                        </div>
            
            ";
            
        }
}

if(isset($_POST["addToCart"])){
    
    if(isset($_SESSION["uid"])){
        
        $p_id = $_POST["proId"];
        $user_id = $_SESSION["uid"];
        $sql = "SELECT * FROM cart WHERE product_id = '$p_id' AND user_id = '$user_id' ";
        $run_query = mysqli_query($con,$sql);
        $count = mysqli_num_rows($run_query);    
        if($count > 0){
            echo "<div class='alert alert-warning' role='alert' >
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b><strong>Product is already in your cart !</strong></b>
               </div";
        }else{
            $sql = "SELECT * FROM products WHERE product_id = '$p_id' ";
            $run_query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($run_query);
                $id = $row["product_id"];
                $pro_name = $row["product_title"];
                $pro_image = $row["product_image"];
                $pro_price = $row["product_price"];
            $sql = "INSERT INTO `cart` (`id`, `product_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `quantity`, `price`, `total_amount`) VALUES (NULL, '$p_id', '0', '$user_id', '$pro_name', '$pro_image', '1', '$pro_price', '$pro_price' )";
            if(mysqli_query($con,$sql)){
                echo "<div class='alert alert-success' role='alert' >
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b><strong>Product has been added to your Cart!</strong></b>
               </div>";
            }

        }  
    }else{
        echo "<div class='alert alert-success' role='alert' >
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b><strong>Sorry Go and sign up first if you want to add the producct to your cart!</strong></b>
               </div>";
    }
    
}

if(isset($_POST["getCartProduct"]) || isset($_POST["cart_checkout"]) ){
    $uid = $_SESSION["uid"];
    $sql = "SELECT * FROM cart WHERE user_id = '$uid' ";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    if($count > 0){
        $no = 1; 
        $total_amt = 0;
        while($row = mysqli_fetch_array($run_query)){
            $id = $row["id"];
            $pro_id = $row["product_id"];
            $pro_name = $row["product_title"];
            $pro_image = $row["product_image"];
            $qty = $row["quantity"];
            $pro_price = $row["price"];
            $total = $row["total_amount"];
            $price_array = array($total);
            $total_price_sum = array_sum($price_array);
            $total_amt = $total_amt + $total_price_sum;
            
            if(isset($_POST["getCartProduct"])){
                echo "
            
                <div class='row'>
                        <div class='col-md-3'>$no</div>
                        <div class='col-md-3'><img src='product_images/$pro_image' width='60px' height='50px'></div>
                        <div class='col-md-3'>$pro_name</div>
                        <div class='col-md-3'>Rm.$pro_price</div>
                </div>
            
            ";
            $no = $no + 1;
            }else{
                
                echo "<div class='row'>
                             <div class='col-md-2'>
                                <div class='btn-group'>
                            <a href='#' remove_id='$pro_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
                            <a href='#' update_id='$pro_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
                                </div>
                             </div>
                             <div class='col-md-2'><img src='product_images/$pro_image' width='120px' height='100px'></div>
                             <div class='col-md-2'>$pro_name</div>
                             <div class='col-md-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty' ></div>
                             <div class='col-md-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>
                             <div class='col-md-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>
                             <p><br/><p>
                         </div>"
                    ;
                
            }
            
        }
        if(isset($_POST["cart_checkout"])){
            echo "
                    <div class='row'>
                        <div class='col-md-10'></div>
                        <div class='col-md-2'>
                            <h3>Total: RM.$total_amt</h3>
                        </div>
                    </div>
            ";
        }
        
        echo '
        
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
              <input type="hidden" name="cmd" value="_cart">
              <input type="hidden" name="business" value="madhawaonline1123@gmail.com">
              <input type= "hidden" name="upload" value="1">';
              
        $x=0;
        $sql= "SELECT * FROM cart WHERE user_id='$uid'";
        $run_query = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($run_query)){
            $x++;
           echo'     <input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
                  <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
                  <input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
                  <input type="hidden" name="quantity_'.$x.'" value="'.$row["quantity"].'">'; 
        }
        
         

       echo '      
                    <input type="hidden" name="return" value="http://
                    <input style="float:right;" type="image" name="submit"
                    src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" 
                    alt="PayPal - The safer, easier way to pay online">
                </form>    
        ';
    }
    
}

if(isset($_POST["cart_count"]) AND isset($_SESSION["uid"])){
    $uid = $_SESSION["uid"];
    $sql = "SELECT * FROM cart WHERE user_id = '$uid' ";
    $run_query = mysqli_query($con,$sql);
    echo mysqli_num_rows($run_query);
}


if(isset($_POST["removeFromCart"])){
    $pid = $_POST["removeId"];
    $uid = $_SESSION["uid"];
    $sql = "DELETE FROM cart WHERE user_id = '$uid' AND product_id= '$pid'";
    $run_query = mysqli_query($con,$sql);
    if($run_query){
        
        echo "<div class='alert alert-success' role='alert' >
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b><strong>Product has been Removed From your Cart Successfully!</strong></b>
           </div>";
    }
}




        
?>