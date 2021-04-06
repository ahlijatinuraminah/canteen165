<?php 
	include "inc.koneksi.php";		
	class User
	{
		public $id =0;
		public $nama = '';
		public $alamat = '';
		public $email='';
		public $password='';			
		public $tempatlahir='';
		public $tanggallahir='';
		public $handphone='';
		public $jeniskelamin='';
		public $hasil = false;
		public $message ='';
				
		public function AddUser(){
			$sql = "INSERT INTO tbluser(Nama, alamat) 
		            values ('$this->nama', '$this->alamat')";
			$this->hasil = mysql_query($sql);
			$this->message ='Data berhasil ditambahkan!';								
		}
		
		public function UpdateUser(){
			$sql = "UPDATE tbluser SET Nama ='$this->nama',
					alamat = '$this->alamat'
					WHERE IDUser = $this->id";
			$this->hasil = mysql_query($sql);			
			$this->message ='Data berhasil diubah!';								
		}
		
		public function DeleteUser(){
			$sql = "DELETE FROM tbluser WHERE IDUser=$this->id";
			$this->hasil = mysql_query($sql);
			$this->message ='Data berhasil dihapus!';					
		}
		
		public function SelectAllUser(){
			$sql = "SELECT * FROM tbluser ORDER BY IDUser ASC";
			$result = mysql_query($sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysql_num_rows($result) > 0){				
				while ($data = mysql_fetch_array($result))
				{
					$objUser = new User(); 
					$objUser->id=$data['IDUser'];
					$objUser->nama=$data['Nama'];
					$objUser->alamat=$data['Alamat'];
					$objUser->email=$data['Email'];
					$objUser->password=$data['Password'];			
					$objUser->tempatlahir=$data['TempatLahir'];
					$objUser->tanggallahir=$data['TanggalLahir'];
					$objUser->handphone=$data['Handphone'];
					$objUser->jeniskelamin=$data['JenisKelamin'];
					$arrResult[$cnt] = $objUser;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectOneUser(){
			$sql = "SELECT * FROM tbluser WHERE IDUser='$this->id'";
			$resultOne = mysql_query($sql) or die(mysql_error());	
			if(mysql_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysql_fetch_assoc($resultOne);
				$this->nama = $data['Nama'];				
				$this->alamat = $data['alamat'];				
			}							
		}
 	}	 
?>
