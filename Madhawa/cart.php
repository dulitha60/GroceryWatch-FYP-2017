<?php
    session_start();

    if(!isset($_SESSION["uid"])){
        header("location:index.php"); 
    }
?>

<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Grocery Store</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="main.js"></script>
    </head>     
<body>
   <div class="navbar navbar-inverse navebar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">Grocery Store</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-modal-window"></span> Product</a></li>
            </ul>
       </div>
    </div>
    <p><br/></p>
    <p><br/></p>
    <div class="containter-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="cartmsg">
                
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                     <div class = "panel-heading">Cart Checkout</div>
                     <div class = "panel-body">
                         <div class="row">
                             <div class="col-md-2"><b>Action</b></div>
                             <div class="col-md-2"><b>Product Image</b></div>
                             <div class="col-md-2"><b>Product Name</b></div>
                             <div class="col-md-2"><b>Product Quantity</b></div>
                             <div class="col-md-2"><b>Product Price</b></div>
                             <div class="col-md-2"><b>Price in $</b></div>
                         </div>
                         <div id="cart_checkout">
                         
                         </div>
<!--
                         <div class="row">
                             <div class="col-md-2">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                    <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
                                 </div>
                             </div>
                             <div class="col-md-2"><img src='product_images/imges.jpg'></div>
                             <div class="col-md-2">Product Name</div>
                             <div class="col-md-2"><input type='text' class='form-control' value='5000' ></div>
                             <div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
                             <div class="col-md-2"><input type='text' class='form-control' value='5000' ></div>
                         </div>  
-->
<!--
                         <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <b>Total $5000</b>
                            </div>
                         </div>

-->                     
                         <div class="row">
                             <div class="col-md-2"></div>
                             <div class="col-md-2"></div>
                             <div class="col-md-2"></div>
                             <div class="col-md-2"></div>
                             <div class="col-md-2"></div>
                             <div class="col-md-2"></div>
                         </div>
                         
                     </div>
                     <div class = "panel-footer"></div>
                </div> 
            </div>
            <div class="col-md-2"></div>
           
        </div>
    </div>
</body>
</html>
