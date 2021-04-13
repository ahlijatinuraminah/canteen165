<?php 
	
	class DetailPesanan extends Connection
	{
		private $id =0;
		private $idpesanan =0;
		private $idmenu = '';
		private $quantity='';
		private $harga='';			
		private $subtotal='';
		private $namamenu='';
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
				
				
		public function SelectAllDetailPesanan(){
			$sql = "SELECT a.*, c.nama as namamenu,  c.harga FROM tbldetailpesanan a, tblmenu c where a.idmenu = c.id and a.idpesanan='$this->idpesanan'";
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objDetailPesanan = new DetailPesanan(); 
					$objDetailPesanan->idmenu=$data['idmenu'];
					$objDetailPesanan->quantity=$data['quantity'];
					$objDetailPesanan->harga=$data['harga'];								
					$objDetailPesanan->subtotal= $objDetailPesanan->harga * $objDetailPesanan->quantity;
					$objDetailPesanan->namamenu=$data['namamenu'];
					$arrResult[$cnt] = $objDetailPesanan;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
	}	 
?>
