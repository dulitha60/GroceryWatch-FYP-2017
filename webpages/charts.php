<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta name="viewport" content="width=device-width, intial-scale=1.0" />
        
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        
        <!-- Bootstrap Core CSS -->
        <link href="../custom/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../custom/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../custom/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../custom/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

               
		
    </head>
    
    <body>
        
        <div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
    </div>
        
<!--        <div class="container">-->
       
            <div id="wrapper">
                
                <!-- Navigation Bar -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Grocery Watch</a>
            </div>
            <!-- navbar-header -->

            <ul class="nav navbar-top-links navbar-right navbar-nav">
                
                <li>   
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                         
                    </ul>
                    
                </li>
                
                <!-- /.dropdown -->
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                    </ul>
                </li>
                
                <!-- /.dropdown -->
                <li>
                    
                        <a href="login.php"> Logout</a>
                       
                    <!-- /.dropdown-user -->
                </li>
            </ul>
                
                <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        <li>
                            <a href="inde.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="charts.php"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                        </li>
                        
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                    </ul>
                    </div>
                </div> 
                </nav>
                
    <div id="page-wrapper">
                
                 <div class="row">
                        <div class="col-lg-4">
                    <h3 class="page-header">Vegetables Chart</h3></a>
                        </div>

                      <div id="chart-container">
                        <canvas id="mycanvas"> </canvas>
                        </div>

               </div>

    </div>

    <div id="page-wrapper">
        <div class="row">
        <div class="col-lg-4">
                    <h3 class="page-header">Cans Chart</h3></a>
                        </div>
        <div id="chart-container">
                <canvas id="mycanvas2"> </canvas>
        </div>

        </div>
    </div>














<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/app2.js"></script>
    
        
    </body>
</html>

    