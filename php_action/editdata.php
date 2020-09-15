<?php 
require_once 'db_connect.php';  
?>


<?php 

$errors = array();

if($_POST) {		

    
    $id = $_POST['id'];
    $ename = $_POST['ename'];
    $address = $_POST['address'];
    $enumber = $_POST['enumber'];
	$fileToUpload = $_FILES['fileToUpload']['name'];
    
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

			
			$sql11 = "UPDATE employe SET e_name='$ename', e_address='$address', e_contact=$enumber, uploadphoto='$fileToUpload' WHERE e_id = $id";
			$result11 = $connect->query($sql11);

            $errors[] = "Upload successfully.";
			header('location: \employee/seeemployee.php');

		} else {
			$errors[] = "Sorry, there was an error uploading your file.";
		}


	}
    foreach ($errors as $key => $value) {
        echo $value;										
        }
} // /if $_POST
?>

