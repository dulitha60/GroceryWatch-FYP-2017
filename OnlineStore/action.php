<?php
session_start();
include "db.php";

//print category
    if(isset($_POST["category"])){
        $category_query = "SELECT * FROM categories";
        $run_query = mysqli_query($con, $category_query);
            
            echo "
                <div class='nav nav-pills nav-stacked'>
                    <li class='active'><a href='#'><h4>Categories</h4></a></li>
            ";
            
            
            if(mysqli_num_rows($run_query) > 0){
                while($row = mysqli_fetch_array($run_query)){
                    $cid = $row["Cat_id"];
                    $cat_name = $row["Cat_title"];
                    echo "
                        <li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
                    ";
                }
                echo"</div>";
            }
    }

//print brand
if(isset($_POST["brand"])){
        $brand_query = "SELECT * FROM brand";
        $run_query = mysqli_query($con, $brand_query);
            
            echo "
                <div class='nav nav-pills nav-stacked'>
                    <li class='active'><a href='#'><h4>Brand</h4></a></li>
            ";
            
            
            if(mysqli_num_rows($run_query) > 0){
                while($row = mysqli_fetch_array($run_query)){
                    $bid = $row["brand_id"];
                    $brand_name = $row["brand_title"];
                    echo "
                        <li><a href='#' class='selectbrand' bid='$bid' >$brand_name</a></li>
                    ";
                }
                echo"</div>";
            }
    }

if(isset($_POST["page"])){
    $sql = "SELECT * FROM products";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    $pageno = ceil($count/3);
    for($i=1;$i<=$pageno;$i++){
        echo "
        <li><a href='#' page='$i' id= 'page'>$i</a></li>
        ";
    }
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

if(isset($_POST["updateProduct"])){
    $uid = $_SESSION["uid"];
    $pid = $_POST["updateId"];
    $qty = $_POST["qty"];
    $price = $_POST["price"];
    $total = $_POST["total"];
    
    $sql = "UPDATE cart SET quantity = '$qty', price = '$price', total_amount = '$total' WHERE user_id = '$uid' AND product_id= '$pid' ";
    $run_query = mysqli_query($con,$sql);
    if($run_query){
        
        echo "<div class='alert alert-success' role='alert' >
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b><strong>Product has been Updated in your Cart Successfully!</strong></b>
           </div>";
    }

}


        
?>