<?php session_start();
    require 'DbConfig.php';
    require ('./phpqrcode/qrlib.php');
    $db = new DbConfig();

    if(!$_SESSION['user']){
      header('location: index.php');
    }
?>
<?php    
  $cek = isset($_SESSION['user']);
?> 
<?php 
    if (isset($_POST['submitcetak'])) {
     $sqll = $db->koneksi->query("SELECT MAX(id_konsumen) FROM sessionpesanan_1");
        while ($data = $sqll->fetch_array()){
          $id_kon1 = $data[0] + 1;
           // var_dump($id_kon1);
        }
        $sqlll = $db->koneksi->query("SELECT MAX(id_konsumen) FROM sessionpesanan_2");
        while ($data = $sqlll->fetch_array()){
          $id_kon2 = $data[0] + 1;
           // var_dump($id_kon2);
        }
        
          $no_invoice      = $_POST['noinvoice'];
          $nama_konsumen   = $_POST['nama_konsumen'];
          $notelp          = $_POST['notelp'];
          $tanggal         = $_POST['tanggal'];
          $kode_hash       = $_POST['tandatangan'];
          //layanan 1
          $quantity1       = $_POST['quantity1'];
          $layanan1        = $_POST['layanan1'];
          $harga1          = $_POST['harga1'];
          $subto1          = $_POST['subto1'];
          //layanan 2
          $quantity2       = $_POST['quantity2'];
          $layanan2        = $_POST['layanan2'];
          $harga2          = $_POST['harga2'];
          $subto2          = $_POST['subto2'];

          $subtotal        = $_POST['subtotal'];
          $diskon          = $_POST['diskon'];
          $total           = $_POST['total'];
       
            //tb invoice
         $sql = "INSERT INTO invoice(no_invoice,nama_konsumen,no_telepon,subTotal,diskon,total,tanggal,kode_hash) VALUES ('$no_invoice','$nama_konsumen','$notelp','$subtotal','$diskon','$total','$tanggal','$kode_hash');";
         // //tb datakonsumen
         $sql .= "INSERT INTO data_konsumen(id_konsumen,no_invoice,nama_konsumen,no_telepon) VALUES('$id_kon1','$no_invoice','$nama_konsumen','$notelp');";
         //ini tb session1
         $sql .= "INSERT INTO sessionpesanan_1(id_konsumen,no_invoice,layanan1,harga_perUnit1,quantity1,subTotal1) VALUES ('$id_kon1','$no_invoice','$layanan1','$harga1','$quantity1','$subto1');";
         //tb session2
         $sql .= "INSERT INTO sessionpesanan_2(id_konsumen,no_invoice,layanan2,harga_perUnit2,quantity2,subTotal2) VALUES ('$id_kon2','$no_invoice','$layanan2','$harga2','$quantity2','$subto2');";
         


         if ($db->koneksi->multi_query($sql) === TRUE) { 
            // $sql = $db->koneksi->query("SELECT * FROM invoice JOIN sessionpesanan_1 ON invoice.no_invoice  = sessionpesanan_1.no_invoice JOIN sessionpesanan_2 ON invoice.no_invoice = sessionpesanan_2.no_invoice  WHERE invoice.no_invoice='$no_invoice'");
            // while ($data = $sql->fetch_array(MYSQLI_ASSOC));
               // $sqli = $db->koneksi->query("SELECT * FROM invoice JOIN sessionpesanan_1 USING(no_invoice) JOIN sessionpesanan_2 Using(no_invoice) WHERE invoice.no_invoice = '$no_invoice'");
               //  while ($data = $sqli->fetch_array(MYSQLI_ASSOC)){
                      // header('location: setelahkliksimpan.php?no_invoice=$no_invoice');
                // }

           header('location: tambahinvoice.php');
         }else{
          // echo "Error:".$sql."<br>".mysqli_error($db);
          echo confirm('Data Gagal Disimpan');
         }          
}           
?>