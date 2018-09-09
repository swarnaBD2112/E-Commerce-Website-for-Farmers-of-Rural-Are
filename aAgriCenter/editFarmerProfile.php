<?php include 'inc/header.php';?>
<?php 
	$f_login = Session::get("fmrlogin");
	if ($f_login == false) {
		header("Location:f_login.php");
	}
?>
<?php
	 $fmrId = Session::get("fmrId");
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
         $updateFmr = $fmr->farmerUpdate($_POST, $fmrId);
    }
?>
<style>
.tblone{width: 550px;margin: 0 auto;border:2px solid #ddd;}
.tblone tr td{text-align: justify;}
.tblone input[type="text"]{width:400px; padding:5px;font-size: 15px;}
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
    	<form action="" method="post">
			<table class="tblone">
				<tr>
					<td colspan="2"><h2>Update Your Profile</h2></td>
				</tr>
				<?php 
					if (isset($updateFmr)) {
						echo "<tr><td colspan='2'>".$updateFmr."</td></tr>";
					}
				?>
				<tr>
					<td width="20%">Name</td>
					<td><input type="text" name="name" value="<?php echo $result['name']; ?>"></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" name="address" value="<?php echo $result['address']; ?>"></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><input type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Save"></td>
				</tr>
			</table>
		</form>
			<?php } } ?>
 		</div>
 	</div>
</div>

   <?php include 'inc/footer.php';?>