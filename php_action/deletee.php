<?php 
require_once 'db_connect.php';  
 ?>


<?php 


$errors = array();

if($_POST) {		

    $id = $_POST['deletee'];

    $sql = "DELETE FROM `employe` WHERE e_id= '$id'";
	$result = $connect->query($sql);

            $errors[] = "Upload successfully.";
            header('location: \employee/seeemployee.php');

foreach ($errors as $key => $value) {
    echo $value;										
    }
} // /if $_POST
?>
