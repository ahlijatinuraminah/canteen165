<?php 
	include "inc.koneksi.php";		
	class Category
	{
		public $id =0;
		public $nama = '';
		public $deskripsi = '';
		public $hasil = false;
		public $message ='';
				
		public function AddCategory(){
			$sql = "INSERT INTO tblcategory(Nama, Deskripsi) 
		            values ('$this->nama', '$this->deskripsi')";
			$this->hasil = mysql_query($sql);
			$this->message ='Data berhasil ditambahkan!';								
		}
		
		public function UpdateCategory(){
			$sql = "UPDATE tblcategory SET Nama ='$this->nama',
					Deskripsi = '$this->deskripsi'
					WHERE IDCategory = $this->id";
			$this->hasil = mysql_query($sql);			
			$this->message ='Data berhasil diubah!';								
		}
		
		public function DeleteCategory(){
			$sql = "DELETE FROM tblcategory WHERE IDCategory=$this->id";
			$this->hasil = mysql_query($sql);
			$this->message ='Data berhasil dihapus!';					
		}
		
		public function SelectAllCategory($cari_id, $cari_nama){
			$sql = "SELECT * FROM tblcategory";
			if($cari_id != '')
			{
				$sql .= " WHERE IDCategory = $cari_id";
			}
			if($cari_nama != '')
			{
				$sql .= " WHERE Nama like '%$cari_nama%'";
			}
			
			$sql .= " ORDER BY IDCategory ASC";
			$result = mysql_query($sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysql_num_rows($result) > 0){				
				while ($data = mysql_fetch_array($result))
				{
					$objCategory = new Category(); 
					$objCategory->id=$data['IDCategory'];
					$objCategory->nama=$data['Nama'];
					$objCategory->deskripsi=$data['Deskripsi'];
					$arrResult[$cnt] = $objCategory;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectOneCategory(){
			$sql = "SELECT * FROM tblcategory WHERE IDCategory='$this->id'";
			$resultOne = mysql_query($sql) or die(mysql_error());	
			if(mysql_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysql_fetch_assoc($resultOne);
				$this->nama = $data['Nama'];				
				$this->deskripsi = $data['Deskripsi'];				
			}							
		}
 	}	 
?>
