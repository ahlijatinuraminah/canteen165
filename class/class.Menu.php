<?php 
		
	class Menu extends Connection
	{
		private $id =0;
		private $nama = '';
		private $deskripsi = '';
		private $harga ='';
		private $foto ='';
		private $idcategory =0;
		private $namacategory = '';
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
					
		public function AddMenu(){
			$sql = "INSERT INTO tblmenu(nama, deskripsi, idcategory, harga) 
		            values ('$this->nama', '$this->deskripsi', '$this->idcategory', '$this->harga')";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function UpdateMenu(){
			$sql = "UPDATE tblmenu SET nama ='$this->nama',
					deskripsi = '$this->deskripsi',
					harga = '$this->harga',
					idcategory = '$this->idcategory'
					WHERE id = $this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';	
		}

		public function UpdateFotoMenu(){
			$sql = "UPDATE tblmenu SET foto ='$this->foto'
					WHERE id = $this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Foto berhasil diubah!';					
		    else
			   $this->message ='Foto gagal diubah!';	
		}
		
		public function DeleteMenu(){
			$sql = "DELETE FROM tblmenu WHERE id=$this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';	
		}
		
		public function SelectAllMenu($cari_idcategory, $cari_deskripsi){
			$sql = "SELECT a.*, b.nama as namacategory FROM tblmenu a, tblcategory b where a.idcategory= b.id";
			if($cari_idcategory != '')
			{
				$sql .= " AND a.idcategory = $cari_idcategory";
			}
			if($cari_deskripsi != '')
			{
				$sql .= " AND a.deskripsi like '%$cari_deskripsi%'";
			}
			
			$sql .= " ORDER BY id ASC";
						
			$result = mysqli_query($this->connection, $sql);
			$arrResult = Array();
			$cnt=0;
			while ($data = mysqli_fetch_array($result))
			{
				$objMenu = new Menu(); 
				$objMenu->id=$data['id'];
				$objMenu->nama=$data['nama'];
				$objMenu->namacategory=$data['namacategory'];
				$objMenu->deskripsi=$data['deskripsi'];
				$objMenu->harga=$data['harga'];
				$objMenu->foto=$data['foto'];
				$arrResult[$cnt] = $objMenu;
				$cnt++;
			}
			return $arrResult;			
		}
		
		public function SelectLatestMenu(){
			$sql = "SELECT * FROM tblmenu ORDER BY id DESC limit 8";
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			while ($data = mysqli_fetch_array($result))
			{
				$objMenu = new Menu(); 
				$objMenu->id=$data['id'];
				$objMenu->nama=$data['nama'];
				$objMenu->deskripsi=$data['deskripsi'];
				$objMenu->harga=$data['harga'];
				$arrResult[$cnt] = $objMenu;
				$cnt++;
			}
			return $arrResult;			
		}
		
		public function SelectOneMenu(){
			$sql = "SELECT a.*, b.nama as namacategory FROM tblmenu a, tblcategory b where a.idcategory= b.id AND a.id='$this->id'";
			$resultOne = mysqli_query($this->connection, $sql);
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->nama = $data['nama'];				
				$this->deskripsi = $data['deskripsi'];	
				$this->namacategory=$data['namacategory'];			
				$this->harga = $data['harga'];	
				$this->foto = $data['foto'];	
				$this->idcategory = $data['idcategory'];	
			}							
		}
 	}	 
?>
