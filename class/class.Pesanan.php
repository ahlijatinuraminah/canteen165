<?php 
	
	class Pesanan extends Connection
	{
		private $id =0;
		private $iduser = '';
		private $idmenu = '';
		private $quantity='';
		private $harga='';			
		private $totalharga='';
		private $namauser='';
		private $namamenu='';
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
			$sql = "INSERT INTO tblpesanan(iduser, idmenu, harga, quantity, totalharga, status, tanggaltransaksi) 
		            values ('$this->iduser', '$this->idmenu' , $this->harga , $this->quantity , $this->totalharga, '$this->status', '$this->tanggaltransaksi'  )";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function UpdatePesanan(){
			$sql = "UPDATE tblpesanan SET 
					idmenu = $this->idmenu,
					quantity = $this->quantity,
					totalharga = $this->totalharga,
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
			$sql = "SELECT a.*, b.nama as namauser, c.nama as namamenu FROM tblpesanan a, tbluser b, tblmenu c where a.iduser = b.id and a.idmenu = c.id ORDER BY id ASC";
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objPesanan = new Pesanan(); 
					$objPesanan->id=$data['id'];
					$objPesanan->iduser=$data['iduser'];
					$objPesanan->idmenu=$data['idmenu'];
					$objPesanan->quantity=$data['quantity'];
					$objPesanan->harga=$data['harga'];			
					$objPesanan->totalharga=$data['totalharga'];
					$objPesanan->namauser=$data['namauser'];
					$objPesanan->namamenu=$data['namamenu'];
					$objPesanan->tanggaltransaksi=$data['tanggaltransaksi'];
					$objPesanan->status=$data['status'];
					$arrResult[$cnt] = $objPesanan;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectHistoryPesanan(){
			$sql = "SELECT a.*, b.nama as namauser, c.nama as namamenu FROM tblpesanan a, tbluser b, tblmenu c where a.iduser = b.id and a.idmenu = c.idm and a.iduser='$this->iduser' ORDER BY id ASC";
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objPesanan = new Pesanan(); 
					$objPesanan->id=$data['id'];
					$objPesanan->iduser=$data['iduser'];
					$objPesanan->idmenu=$data['idmenu'];
					$objPesanan->quantity=$data['quantity'];
					$objPesanan->harga=$data['harga'];			
					$objPesanan->totalharga=$data['totalharga'];
					$objPesanan->namauser=$data['namauser'];
					$objPesanan->namamenu=$data['namamenu'];
					$objPesanan->tanggaltransaksi=$data['tanggaltransaksi'];
					$objPesanan->status=$data['status'];
					$arrResult[$cnt] = $objPesanan;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectOnePesanan(){
			$sql = "SELECT a.*, b.nama as namauser, c.nama as namamenu FROM tblpesanan a, tbluser b, tblmenu c where a.iduser = b.id and a.idmenu = c.id and a.id='$this->id'";
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->id=$data['id'];
				$this->iduser = $data['iduser'];				
				$this->idmenu = $data['idmenu'];		
				$this->quantity=$data['quantity'];
				$this->harga=$data['harga'];			
				$this->totalharga=$data['totalharga'];
				$this->namauser=$data['namauser'];
				$this->namamenu=$data['namamenu'];
				$this->tanggaltransaksi=$data['tanggaltransaksi'];
				$this->status=$data['status'];					
					
			}							
		}
 	}	 
?>
