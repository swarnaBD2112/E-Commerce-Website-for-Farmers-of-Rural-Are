<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');	
?>
<?php 
	class Farmer
	{		
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database(); 
			$this->fm = new Format();
		}
		public function farmerRegistration($data)
		{
			$name     = mysqli_real_escape_string($this->db->link, $data['name']);
			$address  = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone    = mysqli_real_escape_string($this->db->link, $data['phone']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));

			if ($name == "" || $address == "" || $phone == "" || $password == "" ) {
		    	$msg = "<span class='error'> Field must not be empty !</span>";
				return $msg;
		    }
		    $phonquery = "SELECT * FROM tbl_farmer WHERE phone = '$phone' LIMIT 1";
		    $phonchk   = $this->db->select($phonquery);
		    if ($phonchk != false) {
		    	$msg = "<span class='error'> Phone already exist !</span>";
				return $msg;
		    }else{
		    	$query = "INSERT INTO tbl_farmer(name, address, phone, password) VALUES('$name','$address',
		    	         '$phone','$password')";
		    	$inserted_row = $this->db->insert($query);
	     		if ($inserted_row) {
	     			$msg = "<span class='success'>Farmer registration Successfully.</span>";
	     			return $msg;
	     		}
	     		else
	     		{
	     			$msg = "<span class='error'>Farmer not Inserted.</span>";
	     			return $msg;
	     		} 
		    }
		}
		public function farmerLogin($data)
		{
			$phone    = mysqli_real_escape_string($this->db->link, $data['phone']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			if (empty($phone) || empty($password)) {
				$msg = "<span class='error'>Field must not be empty!</span>";
	     		return $msg;
			}
			$query  = "SELECT * FROM tbl_farmer WHERE phone = '$phone' AND password = '$password'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("fmrlogin", true);
				Session::set("fmrId", $value['fid']);
				Session::set("fmrName", $value['name']);
				header("Location:index.php");
				//$msg = "<span class='error'>I love madhu!</span>";
				//return $msg;
			}else{
				$msg = "<span class='error'>Email or password not match!</span>";
	     		return $msg;
			}
		}
		public function getAllFarmerData($fid)
		{
			$sId    = session_id();
			$query  = "SELECT f.*, p.productName, tc.price ,tc.quantity
	   				   FROM tbl_farmer as f, tbl_product as p, tbl_cart tc 
	   				   WHERE f.fid = p.fid AND 
	   				         p.productId = tc.productId AND
	   				         sId = '$sId'";
	    	$result =$this->db->select($query);
	    	return $result;
		}
		public function getFarmerData($fid)
		{
			$query  = "SELECT * FROM tbl_farmer WHERE fid = '$fid' ";
	    	$result =$this->db->select($query);
	    	return $result;
		}
		public function farmerUpdate($data, $fmrId)
		{
			$name    = mysqli_real_escape_string($this->db->link, $data['name']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone   = mysqli_real_escape_string($this->db->link, $data['phone']);

			if ($name == "" || $address == "" || $phone == "" ) {
		    	$msg = "<span class='error'> Field must not be empty !</span>";
				return $msg;
		    }else{
		    	$query = "UPDATE tbl_farmer 
		    			  SET 
		    			  name     = '$name',
		    			  address  = '$address',
		    			  phone    = '$phone'
		    			  WHERE fid = '$fmrId'";
		    	$updated_row = $this->db->update($query);
			    if ($updated_row) {
			    	$msg = "<span class='success'>Farmer data Updated Successfully.</span>";
			     	return $msg;
			    }else{
			    	$msg = "<span class='error'>Farmer data not Updated.</span>";
			     	return $msg;
			    }
		    }
		}
		public function getallFarmer()
	    {
	    	$query  = "SELECT * FROM tbl_farmer ";
	    	$result =$this->db->select($query);
	    	return $result;
	    }
	   public function getFarmerId()
	   {
	   		$query  = "SELECT fid FROM tbl_farmer ";
	    	$result =$this->db->select($query);
	    	return $result;
	   }
	}
?>