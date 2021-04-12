<?php 
	
	class Category extends Connection
	{
		private $id =0;
		private $nama = '';
		private $deskripsi = '';
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
				
		public function AddCategory(){
			$sql = "INSERT INTO tblcategory(nama, deskripsi) 
		            values ('$this->nama', '$this->deskripsi')";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function UpdateCategory(){
			$sql = "UPDATE tblcategory SET nama ='$this->nama',
					deskripsi = '$this->deskripsi'
					WHERE id = $this->id";

			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';	
		}
		
		public function DeleteCategory(){
			$sql = "DELETE FROM tblcategory WHERE id=$this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';	
		}
		
		public function SelectAllCategory(){
			$sql = "SELECT * FROM tblcategory";
				
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objCategory = new Category(); 
					$objCategory->id=$data['id'];
					$objCategory->nama=$data['nama'];
					$objCategory->deskripsi=$data['deskripsi'];
					$arrResult[$cnt] = $objCategory;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectOneCategory(){
			$sql = "SELECT * FROM tblcategory WHERE id='$this->id'";
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->nama = $data['nama'];				
				$this->deskripsi = $data['deskripsi'];				
			}							
		}
 	}	 
?>
