<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include_once '../helpers/Format.php';?>
<?php include '../classes/Farmer.php';?>
<?php 
	$pd  = new Product();
	$fm  = new Format();
	$fmr = new Farmer();
?>
<?php 
   if (isset($_GET['delproduct'])) {
   	$id     = $_GET['delproduct'];
   	$delproduct = $pd->delProductById($id);
   }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">
        	<?php 
            	if (isset($delproduct)) {
            		echo $delproduct;
            	}
            ?>    
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Farmer Id</th>
					<th>Description</th>
					<th>Unit</th>
					<th>Price</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$getpd = $pd->getAllProduct();
				if ($getpd) {
					$i = 0;
					while($result = $getpd->fetch_assoc()){
						$i++;				
			    ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName']; ?></td>
					<td><?php echo $result['catName']; ?></td>
					<td><?php echo $result['fid']; ?></td>
					<td><?php echo $fm->textShorten($result['body'], 40); ?></td>
					<td><?php echo $result['unit']; ?></td>
					<td>Tk<?php echo $result['price']; ?></td>
					<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"></td>

					<td><a href="productedit.php?proid=<?php echo $result['productId']; ?>">Edit</a> || 
					     <a onclick = "return confirm('Are you sure to delete!')" href="?delproduct=<?php echo $result['productId']; ?>">Delete</a>
					</td>
				</tr>

				<?php } } ?>

			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
