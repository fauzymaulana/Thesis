<?php
session_start();
require 'DbConfig.php';
require ('./phpqrcode/qrlib.php');
$db = new DbConfig();
$tempdir = "./temp/";?>
<?php
if(!$_SESSION['user']){
  header('location: index.php');
}
?>

<?php
  if (isset($_GET['no_invoice'])) {
      $no_invoice = $_GET['no_invoice'];
      // $sql =$db->koneksi->query("SELECT *  FROM invoice INNER JOIN sessionpesanan_1 ON invoice.no_invoice  = sessionpesanan_1.no_invoice INNER JOIN sessionpesanan_2  ON invoice.no_invoice = sessionpesanan_2.no_invoice  WHERE invoice.no_invoice='$no_invoice'");
      // $sql = $db->koneksi->query("SELECT * FROM invoice INNER JOIN sessionpesanan_1 ON invoice.no_invoice=sessionpesanan_1.no_invoice INNER JOIN sessionpesanan_2 ON sessionpesanan_1.no_invoice=sessionpesanan_2.no_invoice WHERE invoice.no_invoice='$no_invoice'");
    
         // $sql = $db->koneksi->query("SELECT invoice, sessionpesanan_1, sessionpesanan_2 FROM invoice INNER JOIN sessionpesanan_1 ON invoice.no_invoice  = sessionpesanan_1.no_invoice INNER JOIN sessionpesanan_2  ON invoice.no_invoice = sessionpesanan_2.no_invoice  WHERE invoice.no_invoice='$no_invoice'");
        //ini yang bisa
      $sql = $db->koneksi->query("SELECT * FROM invoice JOIN sessionpesanan_1 ON invoice.no_invoice  = sessionpesanan_1.no_invoice JOIN sessionpesanan_2 ON invoice.no_invoice = sessionpesanan_2.no_invoice  WHERE invoice.no_invoice='$no_invoice'");
    // $sql = $db->koneksi->query("SELECT * FROM invoice AS invoice INNER JOIN sessionpesanan_1 AS sessionpesanan_1 ON invoice.no_invoice  = sessionpesanan_1.no_invoice INNER JOIN sessionpesanan_2 AS sessionpesanan_2 ON invoice.no_invoice = sessionpesanan_2.no_invoice  WHERE invoice.no_invoice='$no_invoice'");
   
      while ($data = $sql->fetch_array(MYSQLI_ASSOC)):

      $tgl = $data['tanggal'];
      $qr = $data['kode_hash'];
       $nafile = $qr.".png";

         //kualitas qrcode
         $quality = 'H';
         //ukuran qrcode
         $ukuran = 2;
         $padding = 1;
         qrcode::png($qr,$tempdir.$nafile,$quality,$ukuran,$padding);
// if (isset($_POST)) {

//    $noinvoice     = $_POST['noinvoice'];
//          $nama_konsumen   = $_POST['nama_konsumen'];
//          $notelp        = $_POST['notelp'];
//          $tanggal       = $_POST['tanggal'];
//          $kode_hash     = $_POST['tandatangan'];
//          //layanan 1
//          $quantity1     = $_POST['quantity1'];
//          $layanan1      = $_POST['layanan1'];
//          $harga1        = $_POST['harga1'];
//          $subto1        = $_POST['subto1'];
//          //layanan 2
//          $quantity2     = $_POST['quantity2'];
//          $layanan2      = $_POST['layanan2'];
//          $harga2        = $_POST['harga2'];
//          $subto2        = $_POST['subto2'];

//          $subtotal      = $_POST['subtotal'];
//          $diskon        = $_POST['diskon'];
//          $total         = $_POST['total'];
// }

    //query ke db seect tabe;
    
    // $post = $_POST; 
?>

<?php
// ob_start();
  $cek = isset($_SESSION['user']);
  // memanggil library fpdf
  require('fpdf.php');
  $post = $_POST;
  //intance object dan membrikan pengatiran halaman
  $pdf = new FPDF('P','mm','A4');

  //membuat halaman baru
  $pdf->AddPage();
  $pdf->Image('assets/img/brand/im.png',0,0,210);
  $pdf->Ln();
  $pdf->Image('assets/img/brand/im.png',0,0,210);



  $tal = "Jl.Pales 7C, Medan";
  $pdf->SetFont('courier','',14);
  $pdf->Cell(1);
  $pdf->Cell(30,50,$tal);
  $pdf->SetFont('courier','',14);
  $pdf->Cell(-30);
  $pdf->Cell(30,60,'Medan Tuntungan, 20135');
   // $pdf->Ln(1);
  $pdf->SetFont('Arial','B',14);
  $pdf->Cell(-30);
  $pdf->Ln();
  $theader = "INVOICE";
  $pdf->SetFont('courier','',40);
  //mencetak string
  $pdf->Cell(110);
  $pdf->Cell(40,20,$theader);
  $pdf->Ln(60);

 $top = array(
    array("label" => "TO :","length"=>100,"align"=>"L" ),
    array("label" => "INVOICE DETAIL","length"=>100,"align"=>"L") 
  );
  $pdf->SetFont('courier','B','14');
  $pdf->SetFillColor(254,254,254);

  $pdf->SetTextColor(0);
  $pdf->Cell(10,10);
  foreach ($top as $col) {
    $pdf->Cell($col['length'],5,$col['label'],0,'0',$col['align'],true);
  }
  $pdf->Ln(10);
  $noinv = $data['no_invoice'];
  sprintf("%06s",$berurut);
  $to1 = array(
    array("label" => "Address","length"=>25,"align"=>"L" ),
    array("label" => ":","length"=>5,"align"=>"L" ),
    array("label" =>   $data['nama_konsumen'],"length"=>70,"align"=>"L"),
    array("label" => "No.Invoice","length"=>33,"align"=>"L" ), 
    array("label" => ":","length"=>5,"align"=>"L" ),
    array("label" => "#".sprintf("%06s",$noinv),"length"=>50,"align"=>"L" )
  );
  $pdf->SetFont('courier','','14');
  $pdf->SetFillColor(254,254,254);
  

  $pdf->SetTextColor(0);
  $pdf->Cell(10,10);
  foreach ($to1 as $col) {
    $pdf->Cell($col['length'],5,$col['label'],0,'0',$col['align'],true);
  }
  $pdf->Ln(7);

  $to2 = array(
    array("label" => "No.Telp","length"=>25,"align"=>"L" ),
    array("label" => ":","length"=>5,"align"=>"L" ),
    array("label" =>  $data['no_telepon'],"length"=>70,"align"=>"L"),
    array("label" => "Due Date","length"=>33,"align"=>"L" ), 
    array("label" => ":","length"=>5,"align"=>"L" ),
    array("label" =>  date('d F Y',strtotime($tgl)),"length"=>50,"align"=>"L" )
  );
  $pdf->SetFont('courier','','14');
  $pdf->SetFillColor(254,254,254);


  $pdf->SetTextColor(0);
  $pdf->Cell(10,10); 
      foreach ($to2 as $col) {
        $pdf->Cell($col['length'],7,$col['label'],0,'0',$col['align'],true);
      }
  $pdf->Ln(15);

  $tb = array(
    array("label" => "Description","length"=>80,"align"=>"L" ),
    array("label" => "Unit Price","length"=>45,"align"=>"C" ),
    array("label" => "Qty","length"=>13,"align"=>"C"),
    array("label" => "Amount","length"=>32,"align"=>"R" )
  );

  $pdf->SetFont('courier','B','16');
  $pdf->SetFillColor(254,254,254);

  $pdf->SetTextColor(0);
  $pdf->Cell(10,10);
  foreach ($tb as $col) {
    $pdf->Cell($col['length'],7,$col['label'],'TB','0',$col['align'],true);
  }
  // data tabel
  // for ($i=1; $i <21; $i++) { 
  //   $pdf->
  //nnti diakhirnya dikasih garis bawah
  // }
  $pdf->Ln(9);

  $pesanan1 = array(
    array("label" => $data['layanan1'],"length"=>80,"align"=>"L" ),
    array("label" => $data['harga_perUnit1'],"length"=>45,"align"=>"C" ),
    array("label" => $data['quantity1'],"length"=>13,"align"=>"C"),
    array("label" => $data['subTotal1'],"length"=>32,"align"=>"R" )
  );
  $pdf->SetFont('courier','','14');
  $pdf->SetFillColor(254,254,254);
  // $pdf->SetAlpha(0.7);
  $pdf->SetTextColor(0);
  $pdf->Cell(10,10);
  foreach ($pesanan1 as $col) {
    $pdf->Cell($col['length'],7,$col['label'],0,'0',$col['align'],true);
  }

   $pdf->Ln(7);
// $data['layanan'].'',,,,$data['quantity'].'',,$data['subTotal'].''
  $pesanan2 = array(
    array("label" => $data['layanan2'],"length"=>80,"align"=>"L" ),
    array("label" => $data['harga_perUnit2'],"length"=>45,"align"=>"C" ),
    array("label" => $data['quantity2'],"length"=>13,"align"=>"C"),
    array("label" => $data['subTotal2'],"length"=>32,"align"=>"R" )
  );
  $pdf->SetFont('courier','','14');
  $pdf->SetFillColor(254,254,254);

  $pdf->SetTextColor(0);
  $pdf->Cell(10,10);
  foreach ($pesanan2 as $col) {
    $pdf->Cell($col['length'],7,$col['label'],0,'0',$col['align'],true);
  }


  $pdf->Ln(7);  
  $pdf->Ln(30);
  $kosong = array(
    array("label" => "","length"=>170,"align"=>"L" )
  );
  $pdf->SetFont('courier','','14');
  $pdf->SetFillColor(254,254,254);

  $pdf->SetTextColor(0);
  $pdf->Cell(10,10);
  foreach ($kosong as $col) {
    $pdf->Cell($col['length'],7,$col['label'],'B','0',$col['align'],true);
  }

  $pdf->Ln(15);
  $fsubto = $data['subTotal'];
  $sT = array(
    array("label" => "Sub Total","length"=>40,"align"=>"L" ),
    array("label" => ":","length"=>5,"align"=>"L"),
    array("label" =>  "Rp ".number_format($fsubto,0,".","."),"length"=>50,"align"=>"L" )
  );
  $pdf->SetFont('courier','','14');
  $pdf->SetFillColor(254,254,254);
  $pdf->SetTextColor(0);
  $pdf->Cell(95,10);
  foreach ($sT as $col) {
    $pdf->Cell($col['length'],7,$col['label'],0,'0',$col['align'],true);
  }

  $pdf->Ln(10);
  $Dis = array(
    array("label" => "Diskon (%)","length"=>40,"align"=>"L" ),
    array("label" => ":","length"=>5,"align"=>"L"),
    array("label" =>  $data['diskon'],"length"=>50,"align"=>"L" )
  );
  $pdf->SetFont('courier','','14');
  $pdf->SetFillColor(254,254,254);

  $pdf->SetTextColor(0);
  $pdf->Cell(95,10);
  foreach ($Dis as $col) {
    $pdf->Cell($col['length'],7,$col['label'],0,'0',$col['align'],true);
  }

   // Awal Note
  $pdf->Ln(1);
  $note = "Note: Pekerjaan dimulai setelah melakukan DP (sebesar 70%) dari harga total kami terima";
  $cellWidth = 75;
  // $no=1;
    if ($pdf->GetStringWidth($note)< 85) {
      $line=1;
    }else{
      //jika iya, maka hitung ketingginan yang dibutuhkan untuk sel akan dirapikan 
      // dengan memisahkan teks agar sesuai dengan lebar sel.. lalu hitung 
      // berapa banyak baris yang dibuthkan agar teks pas dengan sel

      $textLength=strlen($note);//totalpanjang teks
      $errMargin=5;//margin kesalahan lebar sel untuk jagajaga
      $startChar=0;//posisi awal karakter untuk setiap baris
      $maxChar=0;//karakter maksimum dalam satu baris
      $textArray = array();//untuk menampung data setiap baris
      $tmpString="";//untu menampung teks setiap baris,(sementara)

      while ($startChar < $textLength) {//perulangan sam[ai akhir pesan]
        while ($pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) && ($startChar+$maxChar) < $textLength) {
          $maxChar++;
          $tmpString=substr($note,$startChar,$maxChar);
        }
        //pindahkan ke baris beriktnya
        $startChar=$startChar+$maxChar;
        //tambahkan ke dalam array biar tau berapa baris
        array_push($textArray, $tmpString);
        //reset variabel penampung
        $maxChar=0;
        $tmpString='';
      }
      //dapatkan jumlah baris nya
      $line = count($textArray);
    }
    // tulis selnya
    
    $pdf->SetFont('courier','I','10');
    $pdf->SetTextColor(0);
    $pdf->SetFillColor(254,254,254);
    $pdf->Cell(10,($line*5),'',0,'L',true);
    $pdf->MultiCell($cellWidth,5,$note,0);
    // Akhir Note


  // Garis bawah diskon
   $pdf->Ln(-10);
   $pdf->Cell(95,7);
  $pdf->Cell(85,7,"",'B','0',"L",true);
  // akhir

  $pdf->Ln(15);
  $ftot = $data['total'];
  $T = array(
    array("label" => "TOTAL","length"=>40,"align"=>"L" ),
    array("label" => ":","length"=>5,"align"=>"L"),
    array("label" =>  "Rp ".number_format($ftot,0,".","."),"length"=>50,"align"=>"L" )
  );
  $pdf->SetFont('courier','B','16');
  $pdf->SetFillColor(254,254,254);
  $pdf->SetTextColor(49,132,155);
  $pdf->Cell(95,10);
  foreach ($T as $col) {
    $pdf->Cell($col['length'],7,$col['label'],0,'0',$col['align'],true);
  }

    // Kode Verifikasi
  $pdf->Ln(15);
  $pdf->SetFont('courier','',10);
  $pdf->SetTextColor(0);
  $pdf->Cell(10);
  $pdf->Cell(40,20,"https://validasiuniqa.com");
  $pdf->Ln(5);
  $pdf->SetFont('courier','B',14);
  $pdf->SetTextColor(0);
  $pdf->Cell(10);
  $pdf->Cell(40,20,"Kode Verifikasi :");

 $pdf->Ln(25);
  $fo = array(
    array("label" => "Medan, ".date('d F Y',strtotime($tgl)),"length"=>40,"align"=>"L" ),
  );
  $pdf->SetFont('courier','','14');
  $pdf->SetFillColor(254,254,254);
  $pdf->SetTextColor(0);
  $pdf->Cell(110,10);
  foreach ($fo as $col) {
    $pdf->Cell($col['length'],5,$col['label'],0,'0',$col['align'],true);
  }
  $pdf->Ln(5);
  $fot = array(
    array("label" => "Team Uniqa","length"=>40,"align"=>"L" ),

  );
  $pdf->SetFont('courier','B','14');
  $pdf->SetFillColor(254,254,254);
  $pdf->SetTextColor(0);
  $pdf->Cell(110,10);
  foreach ($fot as $col) {
    $pdf->Cell($col['length'],5,$col['label'],0,'0',$col['align'],true);

  }
  $pdf->Ln(-7);
  $pdf->Image('./temp/'.$nafile,32,240,25);
  $cellWidth = 85;

  $pdf->Cell(10,10);
  
  // INI UNTUK STRING KODE HASH JIKA DI JABARKAN DI INVOICE
    // if ($pdf->GetStringWidth($digitalsig)< 85) {
    //   $line=1;
    // }else{
    //   //jika iya, maka hitung ketingginan yang dibutuhkan untuk sel akan dirapikan 
    //   // dengan memisahkan teks agar sesuai dengan lebar sel.. lalu hitung 
    //   // berapa banyak baris yang dibuthkan agar teks pas dengan sel

    //   $textLength=strlen($digitalsig);//totalpanjang teks
    //   $errMargin=5;//margin kesalahan lebar sel untuk jagajaga
    //   $startChar=0;//posisi awal karakter untuk setiap baris
    //   $maxChar=0;//karakter maksimum dalam satu baris
    //   $textArray = array();//untuk menampung data setiap baris
    //   $tmpString="";//untu menampung teks setiap baris,(sementara)

    //       while ($startChar < $textLength) {//perulangan sam[ai akhir pesan]
    //             while ($pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) && ($startChar+$maxChar) < $textLength) {
    //               $maxChar++;
    //               $tmpString=substr($digitalsig,$startChar,$maxChar);
    //             }
    //         //pindahkan ke baris beriktnya
    //         $startChar=$startChar+$maxChar;
    //         //tambahkan ke dalam array biar tau berapa baris
    //         array_push($textArray, $tmpString);
    //         //reset variabel penampung
    //         $maxChar=0;
    //         $tmpString='';
    //       }
    //       //dapatkan jumlah baris nya
    //       $line = count($textArray);
    // }
    // tulis selnya
    // $pdf->Cell(10,($line*5),'',0,'L',true);
    // $pdf->MultiCell($cellWidth,5,$tr,0);
    // Akhir Note
  ob_end_clean();
  $pdf->Output();
  endWhile;
  }
  // ob_end_flush();
?>
