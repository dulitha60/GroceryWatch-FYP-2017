<!DOCTYPE html>
<html lang="en">
    <head>
        <title>drinks</title>
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
        <div id="wrapper">
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
                        <div class="col-lg-12">
                            <h1 class="page-header">Drinks</h1> 
                        </div>
                </div>
                   
                
              <?php
                $link = mysqli_connect("localhost", "root", "rootroot", "drinks"); 
                
                $sql = "SELECT id, name, time, quantity FROM drinksdata";
                $result = $link->query($sql);
                
                echo "<table class='table table-hover thead-inverse'>";
                
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
        </div>
    </body>
</html>