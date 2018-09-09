<?php include 'inc/header.php';?>
<?php 
    $fid = $fmr->getFarmerId();

?>
<style>
.payment{width:700px;min-height:200px;text-align: center;border:1px solid #ddd;margin:0 auto;padding: 50px; }
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
            $i = 0;
            if ($getdata) {
            ?>
            <table  id="example" class=" tblone data display datatable ">
            <thead>
            <tr> 
            <th class="sorting_asc" rowspan="1" colspan="1" style="width: 27px;">No.</th>
            <th class="sorting" rowspan="1" colspan="1" style="width: 152px;">Farmer's Name</th>
            <th class="sorting" rowspan="1" colspan="1" style="width: 152px;">Product's Name</th>
            <th class="sorting" rowspan="1" colspan="1" style="width: 152px;">Address </th>
            <th class="sorting" rowspan="1" colspan="1" style="width: 152px;">Phone Number</th>
            <th class="sorting" rowspan="1" colspan="1" style="width: 152px;">Amount</th>
 
                </tr>
                </thead>
                <tbody>
            <?php    
            while ($result = $getdata->fetch_assoc()) {
                    $i++;
                    if($i%2 == 1){

         ?> 
                <tr class="gradeX odd">
                     <td class=" sorting_1"><?php echo $i; ?></td>
                    <td><?php echo $result['name']; ?></td>
                    <td><?php echo $result['productName']; ?></td>
                    <td><?php echo $result['address']; ?></td>
                    <td><?php echo $result['phone']; ?></td>
                    <td><?php echo $result['price'] * $result['quantity']; ?></td>

                </tr>
                <?php
            }
                    else{

                ?>
                 <tr class="gradeX even">
                     <td class=" sorting_1"><?php echo $i; ?></td>
                    <td><?php echo $result['name']; ?></td>
                    <td><?php echo $result['productName']; ?></td>
                    <td><?php echo $result['address']; ?></td>
                    <td><?php echo $result['phone']; ?></td>
                    <td><?php echo $result['price'] * $result['quantity']; ?></td>

                </tr>
                 
             <?php }
            ?>
            <?php }
            ?>
            </tbody>
            </table>
            <?php

             } ?>
            </div>
        </div>
    </div>
</div>

   <?php include 'inc/footer.php';?>



