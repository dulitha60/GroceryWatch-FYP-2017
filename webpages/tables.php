<!DOCTYPE html>
<html>
    <head>
        <title>Tables</title>
        <meta name="viewport" content="width=device-width, intial-scale=1.0" />
        
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        
        <!-- Bootstrap Core CSS -->
        <link href="../custom/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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
                <a class="navbar-brand" href="inde.php">Grocery Watch</a>
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
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                        </li>
                        
                        <li>
                            <a href="tables.php"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        
                            <!-- ........-->
                        
                        
                        
                    </ul>
                    
                    </div>

                </div> 
                </nav>
            
            <div id="page-wrapper">
                 <div class="row">
                        <div class="col-lg-12" >
                            <h1 class="page-header">Table Data</h1>
                        </div>
                </div> 
                

                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="panel with-nav-tabs panel-info">
                            <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab1" role="tab" class="nav-link" data-toggle="tab"><b>Vegetables</b></a></li>
                                        <li><a href="#tab2" role="tab" class="nav-link" data-toggle="tab"><b>Drinks</b></a></li>
                                        <li><a href="#tab3" role="tab" class="nav-link" data-toggle="tab"><b>Water bottles</b></a></li>
                                    </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" role="tabpanel1" id="tab1">
                                        <?php
                                                $link = mysqli_connect("localhost", "root", "rootroot", "vegetables"); 

                                                $sql = "SELECT id, name, time, weight FROM vegedata";
                                                $result = $link->query($sql);

                                                echo "<table class='table table-hover thead-inverse'>";

                                                echo "<tr>";
                                                    echo "<th>ID</th>";
                                                    echo "<th>Name</th>";
                                                    echo "<th>Time</th>";
                                                    if($row["Water"]>16){
                                                        echo "<td>" . $row["Water"] . "</td>";

                                                        $to = "dulitha60@hotmail.com";
                                                        $subject = "Grocery Watch Alert!";
                                                        $txt = "Hey,You are runing low on your water. Would you like to order online?";
                                                        $headers = "From: groceryfyp@gmail.com" . "\r\n" .
                                                        "CC: dulithamrin@yahoo.com";

                                                        mail($to,$subject,$txt,$headers);

                                                    }else{
                                                        echo "<td>" . $row["weight"] . "</td>";

                                                    }
                                                echo "</tr>";

                                                if ($result->num_rows > 0) {

                                                    while($row = $result->fetch_assoc()) {

                                                        echo "<tr>";
                                                        echo "<td>" . $row["id"] . "</td>";
                                                        echo "<td>" . $row["name"] . "</td>";
                                                        echo "<td>" . $row["time"] . "</td>";
                                                        echo "<td>" . $row["weight"] . "</td>";
                                                        echo "</tr>";			
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }

                                                echo "</table>";
            
                                        ?>
                                        
                                    
                                    
                                    
                                    
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel2" id="tab2">
                                    
                                    <?php
                                        $link = mysqli_connect("localhost", "root", "rootroot", "drinks"); 

                                        $sql = "SELECT id, name, time, quantity FROM drinksdata";
                                        $result = $link->query($sql);
                                        
                                        

                                        echo "<table class='table table-hover table-inverse'>";
                                     
                                        echo "<tr>";
                                            echo "<th>ID</th>";
                                            echo "<th>Name</th>";
                                            echo "<th>Time</th>";
                                            echo "<th>quantity</th>";
                                        echo "</tr>";
                                       

                                        if ($result->num_rows > 0) {

                                            while($row = $result->fetch_assoc()) {

                                                echo "<tr>";
                                                echo "<td>" . $row["id"] . "</td>";
                                                echo "<td>" . $row["name"] . "</td>";
                                                echo "<td>" . $row["time"] . "</td>";
                                                echo "<td>" . $row["quantity"] . "</td>";
                                                echo "</tr>";			
                                            }
                                        } else {
                                            echo "0 results";
                                        }

                                        echo "</table>";
            
                                    ?>
                                    
                                    
                                    
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel3" id="tab3">
                                        
                                        Water bottles data
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
                </div>
                   
            </div>
            
            
        </div>
         <!-- jQuery - required for Bootstrap's JavaScript plugins -->
        <script src="../js/jquery.min.js"></script>
        
        <!-- All Bootstrap plug-ins file -->
        <script src="../js/bootstrap.min.js"></script>
        
        <!-- Basic AngularJS-->
        <script src="../js/angular.min.js"></script>
    </body>
</html>