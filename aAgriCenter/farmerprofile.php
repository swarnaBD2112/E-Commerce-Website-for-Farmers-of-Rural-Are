<?php include 'inc/header.php';?>
<?php 
	$f_login = Session::get("fmrlogin");
	if ($f_login == false) {
		header("Location:f_login.php");
	}
?>
<style>
.tblone{width: 550px;margin: 0 auto;border:2px solid #ddd;}
.tblone tr td{text-align: justify;}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    	 <?php  
    	 	$fid     = Session::get("fmrId");
    	 	$getdata = $fmr->getFarmerData($fid);
    	 	if ($getdata) {
    	 		while ($result = $getdata->fetch_assoc()) {
    	 ?>
			<table class="tblone">
				`<tr>
					<td colspan="3"><h2>Your Profile Details</h2></td>
				</tr>
				<tr>
					<td width="20%">Name</td>
					<td width="5%">:</td>
					<td><?php echo $result['name']; ?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td><?php echo $result['address']; ?></td>
				</tr>
				
				<tr>
					<td>Phone</td>
					<td>:</td>
					<td><?php echo $result['phone']; ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><a href="editFarmerProfile.php">Update profile</a></td>
				</tr>
			</table>
			<?php } } ?>
 		</div>
 	</div>
</div>

   <?php include 'inc/footer.php';?>