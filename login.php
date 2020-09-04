<?php 
require_once 'php_action/db_connect.php';

session_start();
$errors = array();

if($_POST) {		

	$username = $_POST['username'];
	$password = $_POST['password'];

		$sql = "SELECT * FROM users WHERE user_name = '$username'";
		$result = $connect->query($sql);
		if($result->num_rows == 1) {
			// exists
			$password = md5($password);
			$mainSql = "SELECT * FROM users WHERE user_name = '$username' AND password = '$password'";
			$mainResult = $connect->query($mainSql);
			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['id'];
				$user_name = $value['user_name'];

				// set session

				$_SESSION['userId'] = $user_id;
				$_SESSION['userName'] = $user_name;

				header('location: home.php');	
			} else{
				
				$errors[] = "Incorrect username/password combination";
			} // /else
		} else {		
			$errors[] = "Username doesnot exists";		
		} // /else

	
} // /if $_POST
?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee</title>

	
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">	

	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row vertical">
			<div class="col-md-7 col-md-offset-4" style="margin-top: 20%;">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Please Sign in</h3>
					</div>
					<div class="panel-body">

						<div class="messages">
							<?php if($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
						</div>



						<form class="form-horizontal" action="#" method="post" id="loginForm">
							<fieldset>
							  <div class="form-group">
									<label for="username" class="col-sm-2 control-label">User Name</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" Required id="username" name="username" placeholder="User Name" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
									  <input type="password" class="form-control" Required  id="password" name="password" placeholder="Password" autocomplete="off" />
									</div>
								</div>								
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									  <button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-log-in"></i> Sign in</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<!-- panel-body -->
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-4 -->
		</div>
		<!-- /row -->
	</div>
	<!-- container -->	
</body>
</html>
