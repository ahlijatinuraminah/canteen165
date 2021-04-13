<?php 
	
	class Pembeli extends Connection
	{
		private $id =0;
		private $idaccount =0;
		private $nama = '';
		private $email = '';
		private $alamat = '';
		private $tempatlahir='';
		private $tanggallahir='';
		private $handphone='';
		private $jeniskelamin='';
		private $foto='';
		private $currentfoto='';
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
				
		public function AddPembeli(){
			
			$sql = "INSERT INTO tblpembeli(idaccount) 
		            values ('$this->idaccount')";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';
		}
		
		public function UpdatePembeli(){
			$sql = "UPDATE tblpembeli 
					SET 
					alamat = '$this->alamat',
					tempatlahir = '$this->tempatlahir',
					tanggallahir = '$this->tanggallahir',
					handphone = '$this->handphone',
					jeniskelamin = '$this->jeniskelamin',
					foto = '$this->foto'
					WHERE id = $this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';
		}
		
		public function DeletePembeli(){
			$sql = "DELETE FROM tblpembeli WHERE id=$this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';				
		}
		
		public function SelectAllPembeli(){
			$sql = "SELECT a.*, b.nama, b.email FROM tblpembeli a, tblaccount b  WHERE a.idaccount = b.id ORDER BY id ASC";
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objPembeli = new Pembeli(); 
					$objPembeli->id=$data['id'];
					$objPembeli->idaccount=$data['idaccount'];
					$objPembeli->alamat=$data['alamat'];
					$objPembeli->nama=$data['nama'];
					$objPembeli->email=$data['email'];
					$objPembeli->tempatlahir=$data['tempatlahir'];
					$objPembeli->tanggallahir=$data['tanggallahir'];
					$objPembeli->handphone=$data['handphone'];
					$objPembeli->jeniskelamin=$data['jeniskelamin'];
					$objPembeli->foto=$data['foto'];
					$arrResult[$cnt] = $objPembeli;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectOnePembeli(){
			$sql = "SELECT a.*, b.nama, b.email FROM tblpembeli a, tblaccount b  WHERE a.idaccount = b.id and a.id='$this->id'";
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->id=$data['id'];
				$this->idaccount=$data['idaccount'];
				$this->nama=$data['nama'];
				$this->email=$data['email'];
				$this->alamat = $data['alamat'];			
				$this->handphone=$data['handphone'];		
				$this->tempatlahir=$data['tempatlahir'];
				$this->tanggallahir=$data['tanggallahir'];				
				$this->jeniskelamin=$data['jeniskelamin'];		
				$this->foto=$data['foto'];
			}							
		}

		
		
 	}	 
?>
