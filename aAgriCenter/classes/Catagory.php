<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');	
?>
<?php 
	class Catagory
	{		
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database(); 
			$this->fm = new Format();
		}
		public function catInsert($catName)
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

	    public function getAllCat()
	    {
	    	$query  = "SELECT * FROM tbl_catagory ORDER BY catId DESC";
	    	$result =$this->db->select($query);
	    	return $result;
	    }
	    public function getCatById($id)
	    {
	   		$query  = "SELECT * FROM tbl_catagory WHERE catId ='$id'";
	    	$result =$this->db->select($query);
	    	return $result;
		}
		public function catUpdate($catName,$id)
		{
			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link,$catName);
			$id      = mysqli_real_escape_string($this->db->link,$id);
			if (empty($catName)) {
				$msg = "<span class='error'>Catagory Field must not be empty !</span>";
				return $msg;  
		    }
		    else
		    {
			   	$query       = "UPDATE tbl_catagory SET catName = '$catName' WHERE catId = '$id'";
		    	$updated_row = $this->db->update($query);
		    
			    if ($updated_row) {
			    	$msg = "<span class='success'>Catagory Updated Successfully.</span>";
			     	return $msg;
			    }else{
			    	$msg = "<span class='error'>Catagory not Updated.</span>";
			     	return $msg;
			    }
			} 
	    }
	   public function delCatById($id){
	   		$id     = mysqli_real_escape_string($this->db->link,$id);
	   		$query  = "DELETE FROM tbl_catagory WHERE catId ='$id'";
	   		$deldata= $this->db->delete($query);
	   		if ($deldata) {
	   			$msg = "<span class='success'>Catagory Delete Successfully.</span>";
			    return $msg;
	   		}else{
			    	$msg = "<span class='error'>Catagory not Deleted.</span>";
			     	return $msg;
			    }
	   }
	}

 ?>