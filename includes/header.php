<?php require_once('php_action/db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>

	<title>Employee</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">
  
	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  
  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>


	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

    <ul class="nav navbar-nav navbar-left">  
    <li id="navDashboard"><a href="home.php"> Employee</a></li>        
    </ul>
        	     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div>      

      <ul class="nav navbar-nav navbar-right">        

      	<li id="navDashboard"><a href="addemployee.php"><i class="glyphicon glyphicon-list-alt"></i>  Add Employee</a></li>                

        <li id="navCategories"><a href="seeemployee.php"> <i class="glyphicon glyphicon-search"></i> See Employee</a></li>        
        <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>    
      </ul>
            
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>


</body>
</html>