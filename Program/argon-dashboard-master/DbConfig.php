<?php
/**
 * 
 */
class DbConfig
{
	private $host = 'localhost';
	private $user = 'root';
	private $password = '';
	private $dbse = 'skripsi';
	public $koneksi;

	public $no_invoice;
	
	function __construct()
	{
		$this->koneksi = new mysqli($this->host, $this->user,$this->password, $this->dbse);
	}

	public function deleteDataKonsumen($id_konsumen){
		 $sql ="DELETE FROM data_konsumen WHERE id_konsumen='$id_konsumen'";
		$mysql = $this->koneksi->query($sql);
	}

	// public function tambahdatainvoice($no_invoice){
	// 	$sql = ""
	// }
}
?>
<!-- 
	// public function insertData($no_invoice,$nama_konsumen,$no_telepon,$subTotal,$diskon,$total,$tanggal,$kode_hash){
	// 	try {
	// 		 $sql = 
 //         "INSERT INTO invoice(no_invoice,nama_konsumen,no_telepon,subTotal,diskon,total,tanggal,kode_hash) VALUES (?,?,?,?,?,?,?,?)";
 //          $fa = $this->koneksi->prepare($sql);
 //          	if ($fa = $this->koneksi->prepare($sql)) {
 //          		$fa->bind_param($noinvoice, $nama_konsumen, $notelp,$subtotal,$diskon,$total,$tanggal,$kode_hash);
 //          // 	
 //          // $fa->bind_param('no_invoice', $noinvoice);
 //          // $fa->bind_param('nama_konsumen',$nama_konsumen);
 //          // $fa->bind_param('no_telepon',$notelp);
 //          // $fa->bind_param('subTotal',$subtotal);
 //          // $fa->bind_param('diskon',$diskon);
 //          // $fa->bind_param('total',$total);
 //          // $fa->bind_param('tanggal',$tanggal);
 //          // $fa->bind_param('kode_hash',$kode_hash);
 //          $fa->execute();
 //          }
 //          return true;


	// 	} catch (Exception $e) {
			
	// 		echo $e->getMessage();
	// 		return false;
	// 	}
	// }
 -->