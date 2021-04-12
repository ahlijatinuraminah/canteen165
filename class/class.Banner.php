<?php 
	
	class Banner extends Connection
	{
		private $id =0;
		private $nama = '';
		private $deskripsi1 = '';
        private $deskripsi2 = '';
        private $foto = '';
        private $currentfoto = '';
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
				
		public function AddBanner(){
			$sql = "INSERT INTO tblbanner(nama, deskripsi1, deskripsi2, foto) 
		            values ('$this->nama', '$this->deskripsi1', '$this->deskripsi2', '$this->foto')";
			$this->hasil = mysqli_query($this->connection, $sql);

            $this->id = $this->connection->insert_id;
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function UpdateBanner(){
			$sql = "UPDATE tblbanner SET nama ='$this->nama',
					deskripsi1 = '$this->deskripsi1',
                    deskripsi2 = '$this->deskripsi2',
                    foto = '$this->foto'
					WHERE id = $this->id";

			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';	
		}


        public function UpdateFotoBanner(){
			$sql = "UPDATE tblbanner SET 
                    foto = '$this->foto'
					WHERE id = $this->id";

			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';	
		}
		
		public function DeleteBanner(){
			$sql = "DELETE FROM tblBanner WHERE id=$this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';	
		}
		
		public function SelectAllBanner(){
			$sql = "SELECT * FROM tblBanner";
				
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objBanner = new Banner(); 
					$objBanner->id=$data['id'];
					$objBanner->nama=$data['nama'];
					$objBanner->deskripsi1=$data['deskripsi1'];
                    $objBanner->deskripsi2=$data['deskripsi2'];
                    $objBanner->foto=$data['foto'];
					$arrResult[$cnt] = $objBanner;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectOneBanner(){
			$sql = "SELECT * FROM tblBanner WHERE id='$this->id'";
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->nama = $data['nama'];				
				$this->deskripsi1 = $data['deskripsi1'];				
                $this->deskripsi2 = $data['deskripsi2'];	
                $this->foto = $data['foto'];	
			}							
		}
 	}	 
?>
