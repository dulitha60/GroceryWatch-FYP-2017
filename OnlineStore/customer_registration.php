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
    
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">Cusomer Sign Up Form</div>
                    <div class="panel-body">
                    <div class="container-fluid">
                    <div class="row">                        
                        <div class="col-md-12" id="signup_msg">                         
                        </div>                       
                    </div>
                    <form method="post">                       
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" name="fname" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="lname">First Name</label>
                                <input type="text" id="lname"  name="lname" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input type="text" id="email"  name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="password">Password</label>
                                <input type="password" id="password"  name="password" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="repassword">Re-enter passworf</label>
                                <input type="password" id="repassword"  name="repassword" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="mobile">Mobile</label>
                                <input type="text" id="mobile"  name="mobile" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="address1">Address Line 1</label>
                                <input type="text" id="address1"  name="address1" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="address2">Address Line 2</label>
                                <input type="text" id="address2"  name="address2" class="form-control">
                            </div>
                        </div>
                        <p><br/></p>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <input type="button" style="float:right" id="sign_up_btn"  name="sign_up_btn" class="btn btn-success" value="Sign Up">
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="panel-footer">All ready a member? </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</body>
    