<?php 
	include "inc.koneksi.php";		
	class Menu
	{
		public $id =0;
		public $nama = '';
		public $deskripsi = '';
		public $harga ='';
		public $foto ='';
		public $nama_kategori = '';
		public $hasil = false;
		public $message ='';
		
				
		public function AddMenu(){
			$sql = "INSERT INTO tblmenu(Nama, Deskripsi) 
		            values ('$this->nama', '$this->deskripsi')";
			$this->hasil = mysql_query($sql);
			$this->message ='Data berhasil ditambahkan!';								
		}
		
		public function UpdateMenu(){
			$sql = "UPDATE tblmenu SET Nama ='$this->nama',
					Deskripsi = '$this->deskripsi'
					WHERE IDMenu = $this->id";
			$this->hasil = mysql_query($sql);			
			$this->message ='Data berhasil diubah!';								
		}
		
		public function DeleteMenu(){
			$sql = "DELETE FROM tblmenu WHERE IDMenu=$this->id";
			$this->hasil = mysql_query($sql);
			$this->message ='Data berhasil dihapus!';					
		}
		
		public function SelectAllMenu($cari_idcategory, $cari_deskripsi){
			$sql = "SELECT a.*, b.nama as nama_kategori FROM tblmenu a, tblCategory b where a.IDCategory= b.IDCategory";
			if($cari_idcategory != '')
			{
				$sql .= " AND a.IDCategory = $cari_idcategory";
			}
			if($cari_deskripsi != '')
			{
				$sql .= " AND a.Deskripsi like '%$cari_deskripsi%'";
			}
			
			$sql .= " ORDER BY IDMenu ASC";
						
			$result = mysql_query($sql);	
			$arrResult = Array();
			$cnt=0;
			while ($data = mysql_fetch_array($result))
			{
				$objMenu = new Menu(); 
				$objMenu->id=$data['IDMenu'];
				$objMenu->nama=$data['Nama'];
				$objMenu->nama_kategori=$data['nama_kategori'];
				$objMenu->deskripsi=$data['Deskripsi'];
				$objMenu->harga=$data['Harga'];
				$objMenu->foto=$data['Foto'];
				$arrResult[$cnt] = $objMenu;
				$cnt++;
			}
			return $arrResult;			
		}
		
		public function SelectLatestMenu(){
			$sql = "SELECT * FROM tblmenu ORDER BY IDMenu DESC limit 8";
			$result = mysql_query($sql);	
			$arrResult = Array();
			$cnt=0;
			while ($data = mysql_fetch_array($result))
			{
				$objMenu = new Menu(); 
				$objMenu->id=$data['IDMenu'];
				$objMenu->nama=$data['Nama'];
				$objMenu->deskripsi=$data['Deskripsi'];
				$objMenu->harga=$data['Harga'];
				$arrResult[$cnt] = $objMenu;
				$cnt++;
			}
			return $arrResult;			
		}
		
		public function SelectOneMenu(){
			$sql = "SELECT * FROM tblmenu WHERE IDMenu='$this->id'";
			$resultOne = mysql_query($sql) or die(mysql_error());	
			if(mysql_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysql_fetch_assoc($resultOne);
				$this->nama = $data['Nama'];				
				$this->deskripsi = $data['Deskripsi'];				
				$this->harga = $data['Harga'];	
			}							
		}
 	}	 
?>
