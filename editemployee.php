<?php require_once('includes/header.php'); ?>


<?php 

$errors = array();

if($_POST) {		

    $id = $_POST['editdata'];


    $sql = "SELECT * FROM `employe` WHERE e_id= '$id' ";
		$result = $connect->query($sql);
		if($result->num_rows != 0) {
			foreach ($result as  $value) {
				
				$ename= $value['e_name'];
				$eaddress=$value['e_address'];
				$enumber = $value['e_contact'];
				$image = $value['uploadphoto'];
            }
        }
}?>



<div class="container">
		<div class="row vertical">
				<form class="form-horizontal" action="php_action/editdata.php" method="post" id="addemployee" enctype="multipart/form-data">
					<fieldset>
							  
					  	<div class="form-group">
							<label for="ename" class="col-sm-2 control-label">Employee Name</label>
							<div class="col-sm-9">
							  	<input type="text" class="form-control" id="ename" value="<?php echo $ename;?>" name="ename" placeholder="Name" autocomplete="off"/>
							</div>
						</div>

                        <div class="form-group">
							<label for="address" class="col-sm-2 control-label">Employee Address</label>
							<div class="col-sm-9">
							  	<input type="text" class="form-control" id="address" value="<?php echo $eaddress;?>" name="address" placeholder="Address" autocomplete="off"/>
							</div>
						</div>
                        <div class="form-group">
							<label for="enumber" class="col-sm-2 control-label">Employee Number</label>
							<div class="col-sm-9">
							  	<input type="number" class="form-control" id="enumber" value="<?php echo $enumber;?>" name="enumber" placeholder="Contact Number" autocomplete="off"/>
							</div>
						</div>
						<div class="form-group">
							<label for="fileToUpload" class="col-sm-2 control-label">Upload Image</label>
							<div class="col-sm-9">
								<input type="file" class="form-control" id="fileToUpload" name="fileToUpload" autocomplete="off" />
							</div>
						</div>

                        <input type="hidden" value="<?php echo $id;?>" id="id" name="id">								
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" value="Upload Image" name="submit" class="btn btn-default"> <i class="glyphicon glyphicon-edit"></i> Edit</button>
							</div>
						</div>
					</fieldset>
				</form>
		</div>
		<!-- /row -->
	</div>
	<!-- container -->	
