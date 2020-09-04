<?php require_once('includes/header.php'); ?>

 
    <table class="table" >
                <thead>
					<tr>
						<th>#</th>
						<th>Photo</th>
						<th>Name</th>
						<th>Address</th>
						<th>Number</th>
                        <th style="width:5%;">Edit</th>
                        <th style="width:5%;">Delete</th>
					</tr>
				</thead>
    <?php
		$count = 0; 
		$sql = "SELECT * FROM `employe` ";
		$result = $connect->query($sql);
		if($result->num_rows != 0) {
			foreach ($result as  $value) {
				
				$id = $value['e_id'];
				$ename= $value['e_name'];
				$eaddress=$value['e_address'];
				$enumber = $value['e_contact'];
				$image = $value['uploadphoto'];
                $count ++;
	?>
    
                <tr >
                    <td ><?php echo $count; ?></td>
                    <td ><img src="uploads/<?php echo $image?>" width='100' height='100' ></td>
                    <td ><?php  echo $ename; ?></td>
                    <td ><?php  echo $eaddress; ?></td>
                    <td ><?php  echo $enumber; ?></td>
					
					<form id="deletee" action="editemployee.php" method="POST">
							<input type="hidden" id="editdata" name="editdata" value="<?php echo $id; ?>">      
							<td style="width:5%;">
								<button type="submit" class="btn btn-primary" id="editdata" data-loading-text="Loading..." autocomplete="off"><i class="glyphicon glyphicon-edit"></i></button>
							</td>
					</form>

					<form id="deletee" action="php_action/deletee.php" method="POST">
							<input type="hidden" id="deletee" name="deletee" value="<?php echo $id; ?>">      
							<td style="width:5%;">
								<button type="submit" class="btn btn-primary" id="deletee" data-loading-text="Loading..." autocomplete="off"><i class="glyphicon glyphicon-trash"></i></button>
							</td>
						</form>				
                </tr>	
	  <?php
			}
		  
		}
	?>
    </table>

