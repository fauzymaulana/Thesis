<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<?php
session_start();
require 'DbConfig.php';
$db = new DbConfig();

?>
<head>
  <title></title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Uniqa Digital Invitation</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/logo-uniqa-3.png" type="image/png">

  <!-- Css Validator -->
  <link rel="stylesheet" type="text/css" href="hh.css">
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">

  <!-- Css Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">

  <!-- CSS Loading -->
  <link rel="stylesheet" type="text/css" href="cssloading.css">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lexend&display=swap" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <!-- Font Awesome (fa) -->
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- JQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script type="text/javascript" src="js/jquery-2.2.1.min.js"></script>

  <!-- loader -->
  <style type="text/css">

    .loader,
    .loader:before,
    .loader:after {
      background: #000000;
      -webkit-animation: load1 1s infinite ease-in-out;
      animation: load1 1s infinite ease-in-out;
      width: 1em;
      height: 4em;
    }
    .loader:before,
    .loader:after {
      position: absolute;
      top: 0;
      content: '';
    }
    .loader:before {
      left: -1.5em;
      -webkit-animation-delay: -0.32s;
      animation-delay: -0.32s;
    }
    .loader {
      text-indent: -9999em;
      margin: 88px auto;
      position: relative;
      font-size: 11px;
      -webkit-transform: translateZ(0);
      -ms-transform: translateZ(0);
      transform: translateZ(0);
      -webkit-animation-delay: -0.16s;
      animation-delay: -0.16s;
    }
    .loader:after {
      left: 1.5em;
    }
    @-webkit-keyframes load1 {
      0%,
      80%,
      100% {
        box-shadow: 0 0 #000000;
        height: 4em;
      }
      40% {
        box-shadow: 0 -2em #000000;
        height: 5em;
      }
    }
    @keyframes load1 {
      0%,
      80%,
      100% {
        box-shadow: 0 0 #000000;
        height: 4em;
      }
      40% {
        box-shadow: 0 -2em #000000;
        height: 5em;
      }
    }
    /*Akhir loader*/
  </style>
  <script>
    $(document).ready(function(){
      $('.informasi').hide();
    });

      // $(document).ready(function(){
      //   $('.loader').fadeOut(5000);
      // })
      
    </script>
  </head>
  <body>
    <?php
    $title="";
    $konten = "";
    $namakom = "";
    ?>




    <!-- koding proses -->
    <?php 

    if (isset($_POST['kode']) && isset($_POST['no_invoice'])) {
      $kode = $_POST['kode'];
      $no_invoice = $_POST['no_invoice'];
    // $sql = $db->koneksi->query("SELECT * FROM invoice WHERE kode_hash LIKE '%".$kode."%'");//query yang dimasykkan tidak harus sama, 
    // $sql = $db->koneksi->query("SELECT * FROM invoice WHERE kode_hash = '$kode'"); //query yang diinputkan harus benar benar sama
    $sql = $db->koneksi->query("SELECT * FROM invoice WHERE kode_hash = '$kode' AND no_invoice = '$no_invoice'"); //query yang diinputkan harus benar benar sama
    

    if (mysqli_num_rows($sql) == 0) {
      ?>
      <script>
        $(document).ready(function(){
          $('.informasi').show();

          <?php
          $gambar = "assets/img/brand/red-incorrect.png";
          $tamGam = "<img src =".$gambar." style='height: 130px; width: 130px'>";
          $title = "Kode Invoice Tidak Benar";  
          $konten = "Masukkan kode verifikasi ulang";
          $namakom = "";
          ?>
        })
      </script>

      <?php
    }elseif ($dataa = $sql->fetch_assoc()) {  
      $nama = $dataa['nama_konsumen'];
      $kode_h = $dataa['kode_hash'];
      if ($kode == $dataa['kode_hash'] && $no_invoice == $dataa['no_invoice']) {
        ?>

        <script>
          $(document).ready(function(){
            $('.informasi').show();

            <?php
            $gambar = "assets/img/brand/bill-invoice.png";
            $tamGam = "<img src =".$gambar." style='height: 150px; width: 130px'>";
            $title = "Kode Invoice Benar";
            $konten = "Ini adalah e-invoice Uniqa.id yang asli";
            $namakom = "Nama konsumen : <b>" . $nama . "</b>";
            ?>

          })
        </script>

        <?php
      }else{
        ?>

        <script>
          $(document).ready(function(){
            $('.informasi').show();


            <?php
            $gambar = "assets/img/brand/red-incorrect.png";
            $tamGam = "<img src =".$gambar." style='height: 130px; width: 130px'>";
            $title = "Kode Invoice Tidak Benar";  
            $konten = "Masukkan kode verifikasi ulang";
            $namakom = "";
            ?>
          })
        </script>
        <?php

      }

    }

  }
  
  ?>

  <!-- Top Bar -->
  <div class="container navbar">
    <div class="row">
      <div class="col-2 navbar-brand">
        <img src="assets/img/brand/logo-uniqa-3.png" alt="assets/img/brand/logo-uniqa-3.png">
      </div>
      <div class="col-lg navbar-br">
        <h4>Sistem Verifikasi Keaslian Invoice</h4>    
      </div>       
    </div>
  </div>

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
   <!--  <h1 class="dis-4">Get work don <span>faster</span><br> and <span>better</span> with us</h1>
    <a href="#" class="btn btn-primary tombol">Our Work</a> -->
  </div>
</div>
<!-- akhir Jumbotron -->


<!-- Container -->
<div class="container">
  <!-- info panel -->
  <div class="row justify-content-center">
    <div class="col-10 info-panel" style="margin-top: -80px;">
      <h3>Selamat Datang</h3>
      <label>Terima kasih Anda telah menggunakan layanan <b>Uniqa</b> <i>Share Your Moment</i></label>
      <br>
      <label>Silahkan gunakan sistem verifikasi keaslian e-invoice kami untuk pengecekan</label>

      <br>
      <div class="row">
        <div class="col-lg inp">
          <br>
          <br>
          <form action="" method="POST">
            <label>Masukkan nomor invoice</label>
            <input type="text" class="form-control txt" name="no_invoice" id="no_invoice" autofocus required autocomplete="off"  />
            <br>
            <label>Masukkan digit kode verifikasi keaslian</label>
            <input type="text" class="form-control txt" id="kode"  value="<?= $_SESSION['kodehash'] ?? null ?>"  name="kode" required autocomplete="off"/>
            <br>
            <br>
            <input type="submit" class="btn btn-primary txt" name="submit" id="submit" value="Lanjutkan" />
          </form>
        </div>
        <div class="col-lg">
          <br>
          <br>
          <br>
          <div class="row informasi justify-content-center">
            <div class="col-4 ">
              <?= $tamGam ?>
            </div>
            <div class="col notif">
              <h4><b><?= $title; ?></b></h4>
              <p><b><?= $konten; ?></b></p>
              <p><b><?=$namakom; ?></b></p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- akhir container -->


<!-- testimonial -->
<section class="testimonial">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <h4>"Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya"</h4>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-6 justify-content-center d-flex ">
      <figure class="figure justify-content-center">
        <h5>-- Uniqa.id --</h5>            
      </figure>
    </div>
  </div>
</section>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/js-cookie/js.cookie.js"></script>
<script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="assets/js/argon.js?v=1.2.0"></script>

<script src="jquery/jquery-2.2.1.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>


<?php unset($_SESSION['kodehash']); ?>
</body>
</html>