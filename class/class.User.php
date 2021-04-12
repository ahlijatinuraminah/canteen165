<?php 
	
	class User extends Connection
	{
		private $id =0;
		private $nama = '';
		private $alamat = '';
		private $email='';
		private $password='';			
		private $role='';	
		private $tempatlahir='';
		private $tanggallahir='';
		private $handphone='';
		private $jeniskelamin='';
		private $hasil = false;
		private $message ='';

		public function __get($atribute) {
			if (property_exists($this, $atribute)) {
				return $this->$atribute;
			}
		}
	
		public function __set($atribut, $value){
			if (property_exists($this, $atribut)) {
					$this->$atribut = $value;
			}
		}
				
		public function AddUser(){
			$this->password ='123456';
			$sql = "INSERT INTO tbluser(nama, alamat, email, password, tempatlahir, tanggallahir, handphone, jeniskelamin) 
		            values ('$this->nama', '$this->alamat', '$this->email', '$this->password', '$this->tempatlahir', '$this->tanggallahir', '$this->handphone', '$this->jeniskelamin')";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';
		}
		
		public function UpdateUser(){
			$sql = "UPDATE tbluser SET nama ='$this->nama',
					alamat = '$this->alamat',
					email = '$this->email',
					alamat = '$this->alamat',
					tempatlahir = '$this->tempatlahir',
					tanggallahir = '$this->tanggallahir',
					handphone = '$this->handphone',
					jeniskelamin = '$this->jeniskelamin'
					WHERE id = $this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';
		}
		
		public function DeleteUser(){
			$sql = "DELETE FROM tbluser WHERE id=$this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';				
		}
		
		public function SelectAllUser(){
			$sql = "SELECT * FROM tbluser ORDER BY id ASC";
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objUser = new User(); 
					$objUser->id=$data['id'];
					$objUser->nama=$data['nama'];
					$objUser->alamat=$data['alamat'];
					$objUser->email=$data['email'];
					$objUser->password=$data['password'];			
					$objUser->tempatlahir=$data['tempatlahir'];
					$objUser->tanggallahir=$data['tanggallahir'];
					$objUser->handphone=$data['handphone'];
					$objUser->jeniskelamin=$data['jeniskelamin'];
					$arrResult[$cnt] = $objUser;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectOneUser(){
			$sql = "SELECT * FROM tbluser WHERE id='$this->id'";
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->nama = $data['nama'];				
				$this->alamat = $data['alamat'];			
				$this->handphone=$data['handphone'];		
				$this->email=$data['email'];
				$this->password=$data['password'];			
				$this->role=$data['role'];			
				$this->tempatlahir=$data['tempatlahir'];
				$this->tanggallahir=$data['tanggallahir'];				
				$this->jeniskelamin=$data['jeniskelamin'];		
			}							
		}


		public function ValidateEmail($email){
			$sql = "SELECT * FROM tbluser WHERE email='$email'";    
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->nama = $data['nama'];				
				$this->alamat = $data['alamat'];			
				$this->handphone=$data['handphone'];		
				$this->email=$data['email'];
				$this->password=$data['password'];			
				$this->role=$data['role'];			
				$this->tempatlahir=$data['tempatlahir'];
				$this->tanggallahir=$data['tanggallahir'];				
				$this->jeniskelamin=$data['jeniskelamin'];
				return true;		
			}							
		}
 	}	 
?>
