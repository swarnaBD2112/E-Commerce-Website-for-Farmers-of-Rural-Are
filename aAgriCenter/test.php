











   <?php include 'inc/header.php';?>
<?php 
    $fid = $fmr->getFarmerId();

?>
<style>
.payment{width:500px;min-height:200px;text-align: center;border:1px solid #ddd;margin:0 auto;padding: 50px; }
.payment h2{border-bottom: 1px solid #ddd; margin-bottom: 40px; padding-bottom: 10px;}
.payment a{background: #5858 none;color: #fff;font-size: 28px;padding: 5px 20px;border-radius: 3px;}
</style>
 <div class="main">
    <div class="content">
        <div class="section group">
            <div class="payment">
                <h2>Contact With Farmer</h2>
                 <?php  
            //$fid     = Session::get("fmrId");
            $getdata = $fmr->getAllFarmerData($fid);
            if ($getdata) {
                while ($result = $getdata->fetch_assoc()) {
         ?>
            <table class="tblone">
                `<tr>
                    <td colspan="3"></td>
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
            </table>
            <?php } } ?>
            </div>
        </div>
    </div>
</div>

   <?php include 'inc/footer.php';?>
