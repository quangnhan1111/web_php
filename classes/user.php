<?php
	$filepath = realpath(dirname(__FILE__));
	// tim hieu filepath
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


 
<?php 
	/**
	* 
	*/
	class user
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function update_pass($pass_old,$pass_new,$adminid)
		{
			$pass_old= $this->fm->validation(md5($pass_old)); //gọi ham validation từ file Format để ktra
			$pass_new= $this->fm->validation(md5($pass_new)); //gọi ham validation từ file Format để ktra
			$pass_old = mysqli_real_escape_string($this->db->link, $pass_old);
			$pass_new = mysqli_real_escape_string($this->db->link, $pass_new);
			$adminid = mysqli_real_escape_string($this->db->link, $adminid);
			if($pass_old=="" || $pass_new=="" ){
				$alert = "<span class='error'>Pass must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_admin SET adminPass= '$pass_new' WHERE  adminId='$adminid' AND adminPass='$pass_old' ";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Password Update Successfully</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Update Password NOT Success</span>";
					return $alert;
				}
			}
		}
	}
 ?>