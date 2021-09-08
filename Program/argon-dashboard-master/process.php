 <?php session_start();
require 'DbConfig.php';
$db = new DbConfig();

if(!$_SESSION['user']){
  header('location: index.php');
}
 ?>
 <?php			
	$cek = isset($_SESSION['user']);
	?> 
<?php
	if (isset($_GET['no_invoice'])) {
		$no_invoice = $_GET['no_invoice'];
		// $hps = "DELETE invoice, sessionpesanan_1, sessionpesanan_2 FROM invoice INNER JOIN sessionpesanan_1 ON invoice.no_invoice  = sessionpesanan_1.no_invoice INNER JOIN sessionpesanan_2  ON invoice.no_invoice = sessionpesanan_2.no_invoice  WHERE invoice.no_invoice='$no_invoice'";

		$hps = "DELETE invoice,data_konsumen, sessionpesanan_1, sessionpesanan_2 FROM invoice INNER JOIN sessionpesanan_1 ON invoice.no_invoice  = sessionpesanan_1.no_invoice INNER JOIN sessionpesanan_2  ON invoice.no_invoice = sessionpesanan_2.no_invoice INNER JOIN data_konsumen ON invoice.no_invoice = data_konsumen.no_invoice  WHERE invoice.no_invoice='$no_invoice'";

		// $hps = "DELETE invoice, sessionpesanan_1, sessionpesanan_2 FROM invoice INNER JOIN sessionpesanan_1 ON invoice.no_invoice  = sessionpesanan_1.no_invoice INNER JOIN sessionpesanan_2  ON invoice.no_invoice = sessionpesanan_2.no_invoice  WHERE invoice.no_invoice='$no_invoice';";
		// $hps .= "DELETE data_konsumen FROM data_konsumen WHERE nama_konsumen = '$nama_konsumen';";


		$mysql = $db->koneksi->query($hps);
		if ($mysql === TRUE) {
			header('location: datainvoice.php');?>

				<script type="text/javascript">
					setTimeout(function(){
						swal({
							title: 'Data Berhasil Dihapus',
							text: 'For $no_invoice',
							type: 'success',
							timer: '3000',
							showConfirmButton: true
						});
					},10);
					window.setTimeout(function(){
						window.location.replace('datainvoice.php');
					},3000);
				</script>
			<?php

			
		 }else{
			 echo "GAGAL MENGHAPUS";
			 header('location: datainvoice.php');
			
		 }
	}elseif (isset($_GET['id_konsumen'])) {
		$id_konsumen = $_GET['id_konsumen'];
		$hapusdatakonsumen = $db->deleteDataKonsumen($id_konsumen);
			if ($hapusdatakonsumen == TRUE) {
			header('location: datakonsumen.php');?>

				<script type="text/javascript">
					setTimeout(function(){
						swal({
							title: 'Data Berhasil Dihapus',
							text: 'For $id_konsumen',
							type: 'success',
							timer: '3000',
							showConfirmButton: true
						});
					},10);
					window.setTimeout(function(){
						window.location.replace('datakonsumen.php');
					},3000);
				</script>
			<?php

			
			 }else{
				echo "GAGAL MENGHAPUS";
				header('location: datakonsumen.php');?>
					<script type="text/javascript">
					setTimeout(function(){
						swal({
							title: 'Data Berhasil Dihapus',
							text: 'For $id_konsumen',
							type: 'success',
							timer: '3000',
							showConfirmButton: true
						});
					},10);
					window.setTimeout(function(){
						window.location.replace('datakonsumen.php');
					},3000);
				<?php
			 }
	}
 
?>

