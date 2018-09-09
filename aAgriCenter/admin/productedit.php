<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include '../classes/Catagory.php';?>

<?php include '../classes/Farmer.php';?>
<?php
     if (!isset($_GET['proid']) || $_GET['proid'] == NULL ) {
        echo "<script>window.location = 'productlist.php'</script>";
     } else{
        $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['proid']);
     }

     $pd = new Product(); 
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $updateProduct = $pd->productUpdate($_POST, $_FILES, $id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>
        <div class="block"> 
        <?php 
            if (isset($updateProduct)) {
                echo $updateProduct;
            }
         ?> 
         <?php 
            $getpro = $pd->getProById($id);
            if ($getpro) {
                while ($value = $getpro->fetch_assoc()) {

          ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $value['productName']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php 
                                $cat    = new Catagory();
                                $getCat = $cat->getallCat();
                                if ($getCat) {
                                    while ($result = $getCat->fetch_assoc()) {
                             ?>
                            <option 
                                <?php 
                                   if ($value['catId'] == $result['catId']) {  ?>
                                        selected = "selected"
                                <?php } ?> value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?>        
                            </option>
                            <?php } } ?>
                        </select>
                    </td>
                </tr>
               <tr>
                    <td>
                        <label>Farmer Id</label>
                    </td>
                    <td>
                        <select id="select" name="fid">
                            <option>Select Farmer Id</option>
                            <?php 
                                $fmr    = new Farmer();
                                $getFar = $fmr->getallFarmer();
                                if ($getFar) {
                                    while ($result = $getFar->fetch_assoc()) {
                             ?>
                            <option 
                                <?php 
                                   if ($value['fid'] == $result['fid']) {  ?>
                                        selected = "selected"
                                <?php } ?> value="<?php echo $result['fid']; ?>"><?php echo $result['fid'];?>
                                
                            </option>
                            <?php } } ?>
                        </select>
                    </td>
                </tr>
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                            <?php echo $value['body']; ?>
                        </textarea>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Per Unit</label>
                    </td>
                    <td>
                        <input type="text" name="unit" value="<?php echo $value['unit']; ?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $value['price']; ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['image']; ?>" height="80px" width="200px"><br/>
                        <input type="file" name="image" />
                    </td>
                </tr>
               
                <tr>
                    <td></td>
                    <td>                       
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


