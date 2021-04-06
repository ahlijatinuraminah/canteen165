<?php 
	include "inc.koneksi.php";		
	class Pesanan
	{
		public $id =0;
		public $iduser = '';
		public $idmenu = '';
		public $quantity='';
		public $harga='';			
		public $totalharga='';
		public $namauser='';
		public $namamenu='';
		public $tanggaltransaksi='';
		public $status ='';
		public $hasil = false;
		public $message ='';
				
		public function AddPesanan(){
			$sql = "INSERT INTO tblpesanan(IDUser, IDMenu, Harga, Quantity, TotalHarga, Status, TanggalTransaksi) 
		            values ('$this->iduser', '$this->idmenu' , $this->harga , $this->quantity , $this->totalharga, '$this->status', '$this->tanggaltransaksi'  )";
			$this->hasil = mysql_query($sql);
			$this->message ='Data berhasil ditambahkan!';								
		}
		
		public function UpdatePesanan(){
			$sql = "UPDATE tblpesanan SET 
					IDMenu = $this->idmenu,
					Quantity = $this->quantity,
					TotalHarga = $this->totalharga,
					Status = '$this->status'
					WHERE IDPesanan = $this->id";					
			$this->hasil = mysql_query($sql);			
			$this->message ='Data berhasil diubah!';								
		}
		
		public function DeletePesanan(){
			$sql = "DELETE FROM tblpesanan WHERE IDPesanan=$this->id";
			$this->hasil = mysql_query($sql);
			$this->message ='Data berhasil dihapus!';					
		}
		
		public function SelectAllPesanan(){
			$sql = "SELECT a.*, b.Nama as NamaUser, c.Nama as NamaMenu FROM tblpesanan a, tbluser b, tblmenu c where a.IDUser = b.IDUser and a.IDMenu = c.IDMenu ORDER BY IDPesanan ASC";
			$result = mysql_query($sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysql_num_rows($result) > 0){				
				while ($data = mysql_fetch_array($result))
				{
					$objPesanan = new Pesanan(); 
					$objPesanan->id=$data['IDPesanan'];
					$objPesanan->iduser=$data['IDUser'];
					$objPesanan->idmenu=$data['IDMenu'];
					$objPesanan->quantity=$data['Quantity'];
					$objPesanan->harga=$data['Harga'];			
					$objPesanan->totalharga=$data['TotalHarga'];
					$objPesanan->namauser=$data['NamaUser'];
					$objPesanan->namamenu=$data['NamaMenu'];
					$objPesanan->tanggaltransaksi=$data['TanggalTransaksi'];
					$objPesanan->status=$data['Status'];
					$arrResult[$cnt] = $objPesanan;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectHistoryPesanan(){
			$sql = "SELECT a.*, b.Nama as NamaUser, c.Nama as NamaMenu FROM tblpesanan a, tbluser b, tblmenu c where a.IDUser = b.IDUser and a.IDMenu = c.IDMenu and a.IDUser='$this->iduser' ORDER BY IDPesanan ASC";
			$result = mysql_query($sql);				
			$arrResult = Array();
			$cnt=0;
			if(mysql_num_rows($result) > 0){				
				while ($data = mysql_fetch_array($result))
				{
					$objPesanan = new Pesanan(); 
					$objPesanan->id=$data['IDPesanan'];
					$objPesanan->iduser=$data['IDUser'];
					$objPesanan->idmenu=$data['IDMenu'];
					$objPesanan->quantity=$data['Quantity'];
					$objPesanan->harga=$data['Harga'];			
					$objPesanan->totalharga=$data['TotalHarga'];
					$objPesanan->namauser=$data['NamaUser'];
					$objPesanan->namamenu=$data['NamaMenu'];
					$objPesanan->tanggaltransaksi=$data['TanggalTransaksi'];
					$objPesanan->status=$data['Status'];
					$arrResult[$cnt] = $objPesanan;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectOnePesanan(){
			$sql = "SELECT a.*, b.Nama as NamaUser, c.Nama as NamaMenu FROM tblpesanan a, tbluser b, tblmenu c where a.IDUser = b.IDUser and a.IDMenu = c.IDMenu and IDPesanan='$this->id'";
			$resultOne = mysql_query($sql) or die(mysql_error());	
			if(mysql_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysql_fetch_assoc($resultOne);
				$this->id=$data['IDPesanan'];
				$this->iduser = $data['IDUser'];				
				$this->idmenu = $data['IDMenu'];		
				$this->quantity=$data['Quantity'];
				$this->harga=$data['Harga'];			
				$this->totalharga=$data['TotalHarga'];
				$this->namauser=$data['NamaUser'];
				$this->namamenu=$data['NamaMenu'];
				$this->tanggaltransaksi=$data['TanggalTransaksi'];
				$this->status=$data['Status'];					
					
			}							
		}
 	}	 
?>
