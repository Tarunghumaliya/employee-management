<?php require_once('includes/header.php');

session_start();
?>

 <div>
    <?php
        $name = $_SESSION['userName'];
		$sql = "SELECT * FROM `users` WHERE user_name= '$name' ";
		$result = $connect->query($sql);
		if($result->num_rows != 0) {
			foreach ($result as  $value) {
				
				$name= $value['user_name'];
				$image = $value['photo'];
	?>
    
                     <img src="uploads/<?php echo $image?>" width='100' height='100' >
                     <?php  echo $name; ?>				
	  <?php
			}
		  
		}
	?>
</div>
