<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');	
?>
<?php 
	class Product
	{		
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database(); 
			$this->fm = new Format();
		}
		public function productInsert($data,$file)
		{
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$catId       = mysqli_real_escape_string($this->db->link, $data['catId']);
			$fid         = mysqli_real_escape_string($this->db->link, $data['fid']);
			$body        = mysqli_real_escape_string($this->db->link, $data['body']);
			$unit        = mysqli_real_escape_string($this->db->link, $data['unit']);
			$price       = mysqli_real_escape_string($this->db->link, $data['price']);

			$permited  = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $file['image']['name'];
		    $file_size = $file['image']['size'];
		    $file_temp = $file['image']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "uploads/".$unique_image;

		    if ($productName == "" || $catId == "" || $fid == "" || $body == "" || $unit == "" ||
		    	$price == "" ) {
		    	$msg = "<span class='error'> Field must not be empty !</span>";
				return $msg;
		    }else{
		    	move_uploaded_file($file_temp, $uploaded_image);
		    	$query = "INSERT INTO tbl_product(productName, catId, fid, body, unit, price, image) VALUES('$productName','$catId','$fid','$body','$unit','$price','$uploaded_image')";
		    	$inserted_row = $this->db->insert($query);
	     		if ($inserted_row) {
	     			$msg = "<span class='success'>Product Inserted Successfully.</span>";
	     			return $msg;
	     		}
	     		else
	     		{
	     			$msg = "<span class='error'>Product not Inserted.</span>";
	     			return $msg;
	     		} 
		    } 
		}
		public function getAllProduct()
		{
			$query = "SELECT p.*, c.catName
					  FROM tbl_product as p, tbl_catagory as c
					  WHERE p.catId = c.catId 
					  ORDER BY p.productId DESC";

			$result= $this->db->select($query);
			return $result;
		}
		public function getProById($id)
		{
			$query  = "SELECT * FROM tbl_product WHERE productId = '$id'";
	    	$result =$this->db->select($query);
	    	return $result;
		}
		public function productUpdate($data, $file, $id)
		{
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$catId       = mysqli_real_escape_string($this->db->link, $data['catId']);
			$fid         = mysqli_real_escape_string($this->db->link, $data['fid']);
			$body        = mysqli_real_escape_string($this->db->link, $data['body']);
			$unit        = mysqli_real_escape_string($this->db->link, $data['unit']);
			$price       = mysqli_real_escape_string($this->db->link, $data['price']);

			$permited  = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $file['image']['name'];
		    $file_size = $file['image']['size'];
		    $file_temp = $file['image']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "uploads/".$unique_image;

		    if ($productName == "" || $catId == "" || $fid == "" || $body == "" || $unit == "" || 
		    	$price == "" ) {
		    	$msg = "<span class='error'> Field must not be empty !</span>";
				return $msg;
		    }
		    else {
		    	if (!empty($file_name)) {

				    if ($file_size >1048567) {
					     echo "<span class='error'>Image Size should be less then 1MB!
					     </span>";
					    } 
					    elseif (in_array($file_ext, $permited) === false) {
					     echo "<span class='error'>You can upload only:-"
					     .implode(', ', $permited)."</span>";
					    }
					    else{
					    	move_uploaded_file($file_temp, $uploaded_image);
					    	$query = "UPDATE tbl_product
					    			  SET 
					    			  productName = '$productName',
					    			  catId       = '$catId',
					    			  fid         = '$fid',
					    			  body        = '$body',
					    			  unit        = '$unit',
					    			  price       = '$price',
					    			  image       = '$uploaded_image'
					    			  WHERE productId = '$id'";
					    	$updated_row = $this->db->update($query);
				     		if ($updated_row) {
				     			$msg = "<span class='success'>Product Updated Successfully.</span>";
				     			return $msg;
				     		}
				     		else
				     		{
				     			$msg = "<span class='error'>Product not Updated.</span>";
				     			return $msg;
				     		} 
				   		}
					} else{
					    	$query = "UPDATE tbl_product
					    			  SET 
					    			  productName = '$productName',
					    			  catId       = '$catId',
					    			  fid         = '$fid',
					    			  body        = '$body',
					    			  unit        = '$unit',
					    			  price       = '$price'
					    			  WHERE productId = '$id' ";
					    	$updated_row = $this->db->update($query);
				     		if ($updated_row) {
				     			$msg = "<span class='success'>Product Updated Successfully.</span>";
				     			return $msg;
				     		}
				     		else
				     		{
				     			$msg = "<span class='error'>Product not Updated.</span>";
				     			return $msg;
				     		}
					}
				}
		}
		public function delProductById($id)
		{
			$query  = "SELECT * FROM tbl_product WHERE productId = '$id'";
			$getData = $this->db->select($query);
			if ($getData) {
				while ( $delImg = $getData->fetch_assoc()) {
					$dellink = $delImg['image'];
					unlink($dellink);
				}
			}
			$delquery = "DELETE FROM tbl_product WHERE productId ='$id'";
			$deldata= $this->db->delete($delquery);
			if ($deldata) {
	   			$msg = "<span class='success'>Product Deleted Successfully.</span>";
			    return $msg;
	   		}else{
			    	$msg = "<span class='error'>Product not Deleted.</span>";
			     	return $msg;
			    }
		}
		public function getFrontProduct()
		{
			$query  = "SELECT p.* FROM tbl_product as p, tbl_catagory as c 
						WHERE p.catId = c.catId AND c.catName = 'Vegetables' ORDER BY productId DESC LIMIT 4";
	    	$result =$this->db->select($query);
	    	return $result;
		}
		public function getNewProduct()
		{
			$query = "SELECT p.* FROM tbl_product as p, tbl_catagory as c 
					WHERE p.catId = c.catId AND c.catName = 'Fruits' 
					ORDER BY productId DESC LIMIT 4";
	    	$result =$this->db->select($query);
	    	return $result;
		}
		public function getSingleProduct($id)
		{
			$query = "SELECT p.*, c.catName, f.name
					  FROM tbl_product as p, tbl_catagory as c, tbl_farmer as f
					  WHERE p.catId = c.catId AND p.productId = '$id' AND p.fid = f.fid";

			$result= $this->db->select($query);
			return $result;
		}
		public function productByCat($id)
		{
			$catId  = mysqli_real_escape_string($this->db->link, $id);
			$query  = "SELECT * FROM tbl_product WHERE catId = '$catId'";
	    	$result = $this->db->select($query);
	    	return $result;
		}
		public function proSearch($productName)
		{
			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link,$catName);

			if (empty($catName)) {
				$msg = "<span class='error'>Catagory Field must not be empty !</span>";
				return $msg;  
		     }
		     else
		     	{
		     		$query     = "INSERT INTO tbl_catagory(catName) VALUES('$catName')";
		     		$catinsert = $this->db->insert($query);
		     		if ($catinsert) {
		     			$msg = "<span class='success'>Catagory Inserted Successfully.</span>";
		     			return $msg;
		     		}
		     		else
		     		{
		     			$msg = "<span class='error'>Catagory not Inserted.</span>";
		     			return $msg;
		     		}
		     	}
		}
		/*public function getFarmerId()
		{
			$query  = "SELECT fid FROM tbl_farmer ";
	    	$result =$this->db->select($query);
	    	return $result;
		}*/
	}
?>