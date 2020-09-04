<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 
 ?>


<?php 

$errors = array();

if($_POST) {		

    $ename = $_POST['ename'];
    $address = $_POST['address'];
    $enumber = $_POST['enumber'];
	$fileToUpload = $_FILES['fileToUpload']['name'];
	
	if(strlen($contactno) == '10'){

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

			
			$sql = "INSERT INTO `employe`(`e_name`, `e_address`, `e_contact`, `uploadphoto`) VALUES ('".$ename."', '".$address."', '".$enumber."','".$fileToUpload."')";
			$result = $connect->query($sql);

            $errors[] = "Upload successfully.";

		} else {
			$errors[] = "Sorry, there was an error uploading your file.";
		}


	}

	}else {
		$errors[] = "Sorry, only 10 digit number allow.";
	}
    foreach ($errors as $key => $value) {
        echo $value;										
		}
	
} // /if $_POST
?>


<div class="container">
		<div class="row vertical">
				<form class="form-horizontal" action="#" method="post" id="addemployee" enctype="multipart/form-data">
					<fieldset>
							  
					  	<div class="form-group">
							<label for="ename" class="col-sm-2 control-label">Employee Name</label>
							<div class="col-sm-9">
							  	<input type="text" class="form-control" id="ename" name="ename" placeholder="Name" autocomplete="off"/>
							</div>
						</div>

                        <div class="form-group">
							<label for="address" class="col-sm-2 control-label">Employee Address</label>
							<div class="col-sm-9">
							  	<input type="text" class="form-control" id="address" name="address" placeholder="Address" autocomplete="off"/>
							</div>
						</div>
                        <div class="form-group">
							<label for="enumber" class="col-sm-2 control-label">Employee Number</label>
							<div class="col-sm-9">
							  	<input type="text" class="form-control" id="enumber" name="enumber" placeholder="Contact Number" autocomplete="off"/>
							</div>
						</div>
						<div class="form-group">
							<label for="fileToUpload" class="col-sm-2 control-label">Upload Image</label>
							<div class="col-sm-9">
								<input type="file" class="form-control" id="fileToUpload" name="fileToUpload" autocomplete="off" />
							</div>
						</div>								
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" value="Upload Image" name="submit" class="btn btn-default"> <i class="glyphicon glyphicon-plus"></i> Add</button>
							</div>
						</div>
					</fieldset>
				</form>
		</div>
		<!-- /row -->
	</div>
	<!-- container -->	
