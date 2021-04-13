<?php 
	
	class Pesanan extends Connection
	{
		private $id =0;
		private $iduser = '';
		private $totalharga='';
		private $namauser='';
		private $tanggaltransaksi='';
		private $status ='';
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
				
		public function AddPesanan(){
			$sql = "INSERT INTO tblpesanan(iduser, totalharga, status, tanggaltransaksi) 
		            values ('$this->iduser', $this->totalharga, '$this->status', '$this->tanggaltransaksi'  )";
			$this->hasil = mysqli_query($this->connection, $sql);
			$this->id = $this->connection->insert_id;	
			
			$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

			
			if(count($products_in_cart) > 0){
				$sql = "INSERT INTO tbldetailpesanan(idpesanan, idmenu, quantity) values"; 
				
				foreach($products_in_cart as $idmenu => $qty) {
					$sql .= "($this->id, $idmenu, $qty),";
				}
				
				$sql = substr($sql, 0, -1);				
				$this->hasil = mysqli_query($this->connection, $sql);
			}
						
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}

		
		public function UpdatePesanan(){
			$sql = "UPDATE tblpesanan SET 
					status = '$this->status'
					WHERE id = $this->id";					
					
				$this->hasil = mysqli_query($this->connection, $sql);
			
				if($this->hasil)
				   $this->message ='Data berhasil diubah!';					
				else
				   $this->message ='Data gagal diubah!';	
		}
		
		public function DeletePesanan(){
			$sql = "DELETE FROM tblpesanan WHERE id=$this->id";
			$this->hasil = mysql_query($sql);
			$this->message ='Data berhasil dihapus!';					
		}
		
		public function SelectAllPesanan(){
			$sql = "SELECT a.*, b.nama as namauser FROM tblpesanan a, tbluser b where a.iduser = b.id ORDER BY id ASC";
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objPesanan = new Pesanan(); 
					$objPesanan->id=$data['id'];
					$objPesanan->iduser=$data['iduser'];
					$objPesanan->totalharga=$data['totalharga'];
					$objPesanan->namauser=$data['namauser'];
					$objPesanan->tanggaltransaksi=$data['tanggaltransaksi'];
					$objPesanan->status=$data['status'];
					$arrResult[$cnt] = $objPesanan;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectHistoryPesanan(){
			$sql = "SELECT a.* FROM tblpesanan a where a.iduser='$this->iduser' ORDER BY id ASC";
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objPesanan = new Pesanan(); 
					$objPesanan->id=$data['id'];
					$objPesanan->iduser=$data['iduser'];
					$objPesanan->totalharga=$data['totalharga'];
					$objPesanan->tanggaltransaksi=$data['tanggaltransaksi'];
					$objPesanan->status=$data['status'];
					$arrResult[$cnt] = $objPesanan;
					$cnt++;
				}
			}
			return $arrResult;			
		}

		
		
		public function SelectOnePesanan(){
			$sql = "SELECT a.*, b.nama as namauser FROM tblpesanan a, tbluser b where a.iduser = b.id and a.id='$this->id'";
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->id=$data['id'];
				$this->iduser = $data['iduser'];				
				$this->totalharga=$data['totalharga'];
				$this->namauser=$data['namauser'];
				$this->tanggaltransaksi=$data['tanggaltransaksi'];
				$this->status=$data['status'];					
					
			}							
		}
 	}	 
?>
