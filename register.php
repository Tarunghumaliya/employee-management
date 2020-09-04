<?php 
require_once 'php_action/db_connect.php';  
session.session_start();
 ?>


<?php 

$errors = array();

if($_POST) {		

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $contactno = $_POST['contactno'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
	$fileToUpload = $_FILES['fileToUpload']['name'];

	if($password == $cpassword){
		if(strlen($contactno) == '10'){

			if(is_string($firstname) == 'TRUE')
			{
				if(is_string($lastname) == 'TRUE')
				{
					if(strlen($password) >= '8')
					{

						$sql1="SELECT * FROM `users` WHERE user_name = '$username' ";
						$result = $connect->query($sql1);
						if($result->num_rows == 1) {
							$errors[] = "Sorry, try other username.";
						}
						else{
		

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$errors[] = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$errors[] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

			
			$password = md5($password);
			$sql = "INSERT INTO `users`(`user_name`, `password`, `first_name`, `last_name`, `contact_no`, `photo`) VALUES ('".$username."', '".$password."', '".$firstname."','".$lastname."','".$contactno."','".$fileToUpload."')";
			$result = $connect->query($sql);

		
				$_SESSION['userName']='$username';
				$errors[] = "Upload successfully.";
				header('location: home.php');
			

		} else {
			$errors[] = "Sorry, there was an error uploading your file.";
		}

		}
	}
	}else {
		$errors[] = "Sorry, password must be min 8 character.";
	}
	}else {
		$errors[] = "Sorry, Last name is only string.";
	}
	}else {
		$errors[] = "Sorry, First name is only string.";
	}
	}else {
		$errors[] = "Sorry, Mobile Number is only 10 Digit allow.";
	}
	}else {
		$errors[] = "Sorry, password not same.";
	}

	foreach ($errors as $key => $value) {
		echo $value;										
		}
	
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
			<div class="col-md-7 col-md-offset-4" style="margin-top: 50px;">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Register Here</h3>
					</div>
					<div class="panel-body">

						<div class="messages">
						<form class="form-horizontal" action="#" method="post" id="registerform" enctype="multipart/form-data">
							<fieldset>
							  
								<div class="form-group">
									<label for="firstname" class="col-sm-2 control-label">First Name</label>
									<div class="col-sm-10">
									    <input type="text" class="form-control" required id="firstname" name="firstname" placeholder="First Name" required autocomplete="off" />
									</div>
								</div>

								<div class="form-group">
									<label for="lastname" class="col-sm-2 control-label">Last Name</label>
									<div class="col-sm-10">
									    <input type="text" class="form-control" required id="lastname" name="lastname" placeholder="Last Name" required autocomplete="off" />
									</div>
								</div>

								<div class="form-group">
									<label for="username" class="col-sm-2 control-label">Username</label>
									<div class="col-sm-10">
									    <input type="text" class="form-control" required id="username" name="username" placeholder="Username" required autocomplete="off" />
									</div>
								</div>

							  <div class="form-group">
									<label for="contactno" class="col-sm-2 control-label">Contact No</label>
									<div class="col-sm-10">
									    <input type="number" class="form-control" required id="contactno" name="contactno" placeholder="Contact Number" required autocomplete="off" />
									</div>
								</div>


								<div class="form-group">
									<label for="password" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
									    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required  autocomplete="off" />
									</div>
								</div>	

								<div class="form-group">
									<label for="cpassword" class="col-sm-2 control-label">Conform Password</label>
									<div class="col-sm-10">
									    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Renter Password" required  autocomplete="off" />
									</div>
								</div>	

								<div class="form-group">
									<label for="fileToUpload" class="col-sm-2 control-label">Upload Image</label>
									<div class="col-sm-10">
										<input type="file" class="form-control" id="fileToUpload" name="fileToUpload" autocomplete="off" />
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									    <button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-plus"></i> Register</button>
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
