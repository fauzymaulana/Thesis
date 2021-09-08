<!DOCTYPE html>
<html>
<?php session_start();
require 'DbConfig.php';
require ('./phpqrcode/qrlib.php');
$db = new DbConfig();

$tempdir = "./temp/";
if (!file_exists($tempdir)) mkdir($tempdir);

if(!$_SESSION['user']){
  header('location: index.php');
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Uniqa Digital Invitation</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/logo-uniqa-3.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <!-- Font Awesome (fa) -->
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Css -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="stylebuatinvoice.css" type="text/css">
  <!-- JQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  <script src="sweetalert/dist/sweetalert.min.js"></script>
  <script src="alert/js/qunit-1.18.0.js"></script>
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">

        <script>
         
          function tampil1(){
            var har = document.getElementById("form1").layanan1.value;
            if (har == "Desain Poster") {
              var harga = 250000;
              var qu = document.getElementById("form1").quantity1.value;
              document.getElementById("harga1").value = harga;
              // var x = (qu*harga);
              document.getElementById("subto1").value = (qu*harga);
              var subtotal1 = (qu*harga);
            }else if (har = "Desain Logo") {
              var harga = 150000;
              var qu = document.getElementById("form1").quantity1.value;
              document.getElementById("harga1").value = harga;
              // var x = (qu*harga);
              document.getElementById("subto1").value = (qu*harga);
              var subtotal1 = (qu*harga);
            }else if (har == "Desain Stiker") {
              var harga = 50000;
              var qu = document.getElementById("form1").quantity1.value;
              document.getElementById("harga1").value = harga;
              // var x = (qu*harga);
              document.getElementById("subto1").value = (qu*harga);
              var subtotal1 = (qu*harga);
            }else if (har == "Video Invitation") {
              var harga = 300000;
              var qu = document.getElementById("form1").quantity1.value;
              document.getElementById("harga1").value = harga;
              // var x = (qu*harga);
              document.getElementById("subto1").value = (qu*harga);
              var subtotal1 = (qu*harga);
            }
            else if (har == "Website Invitation") {
              var harga = 450000;
              var qu = document.getElementById("form1").quantity1.value;
              document.getElementById("harga1").value = harga;
              // var x = (qu*harga);
              document.getElementById("subto1").value = (qu*harga);
              var subtotal1 = (qu*harga);
            }
            else if (har == "Undangan Cetak type TRIFOLD") {
              var harga = 5000;
              var qu = document.getElementById("form1").quantity1.value;
              document.getElementById("harga1").value = harga;
              // var x = (qu*harga);
              document.getElementById("subto1").value = (qu*harga);
              var subtotal1 = (qu*harga);
            }
            else if (har == "Undangan Cetak type 103") {
              var harga = 2000;
              var qu = document.getElementById("form1").quantity1.value;
              document.getElementById("harga1").value = harga;
              // var x = (qu*harga);
              document.getElementById("subto1").value = (qu*harga);
              var subtotal1 = (qu*harga);
            }
            else if (har == "Undangan Cetak type 104") {
              var harga = 2000;
              var qu = document.getElementById("form1").quantity1.value;
              document.getElementById("harga1").value = harga;
              // var x = (qu*harga);
              document.getElementById("subto1").value = (qu*harga);
              var subtotal1 = (qu*harga);
            }
            else if (har == "Undangan Cetak type 109") {
              var harga = 4000;
              var qu = document.getElementById("form1").quantity1.value;
              document.getElementById("harga1").value = harga;
              // var x = (qu*harga);
              document.getElementById("subto1").value = (qu*harga);
              var subtotal1 = (qu*harga);
            }
            else if (har == "Undangan Cetak type C09") {
              var harga = 6000;
              var qu = document.getElementById("form1").quantity1.value;
              document.getElementById("harga1").value = harga;
              // var x = (qu*harga);
              document.getElementById("subto1").value = (qu*harga);
              var subtotal1 = (qu*harga);
            }
            else if (har == "Undangan Cetak type K77") {
              var harga = 5000;
              var qu = document.getElementById("form1").quantity1.value;
              document.getElementById("harga1").value = harga;
              // var x = (qu*harga);
              document.getElementById("subto1").value = (qu*harga);
              var subtotal1 = (qu*harga);
            }
            else if (har == "Undangan Cetak type T01") {
              var harga = 3000;
              var qu = document.getElementById("form1").quantity1.value;
              document.getElementById("harga1").value = harga;
              // var x = (qu*harga);
              document.getElementById("subto1").value = (qu*harga);
              var subtotal1 = (qu*harga);
            }
            else if (har == ""){
              var harga = "";
              document.getElementById("subto1").value = "";
              document.getElementById("harga1").value = harga;
            }
          }

        function tampil2(){
          var har2 = document.getElementById("form1").layanan2.value;
          if (har2 == "Desain Poster") {
            var harga2 = 250000;
            var qu2 = document.getElementById("form1").quantity2.value;
            document.getElementById("harga2").value = harga2;
            // var x = (qu*harga);
            document.getElementById("subto2").value = (qu2*harga2);
            var subtotal2 = (qu2*harga2);
          }else if (har2 = "Desain Logo") {
            var harga2 = 150000;
            var qu2 = document.getElementById("form1").quantity2.value;
            document.getElementById("harga2").value = harga2;
            // var x = (qu*harga);
            document.getElementById("subto2").value = (qu2*harga2);
            var subtotal2 = (qu2*harga2);
          }else if (har2 == "Desain Stiker") {
            var harga2 = 50000;
            var qu2 = document.getElementById("form1").quantity2.value;
            document.getElementById("harga2").value = harga2;
            // var x = (qu*harga);
            document.getElementById("subto2").value = (qu2*harga2);
            var subtotal2 = (qu2*harga2);
          }else if (har2 == "Video Invitation") {
            var harga2 = 300000;
            var qu2 = document.getElementById("form1").quantity2.value;
            document.getElementById("harga2").value = harga2;
            // var x = (qu*harga);
            document.getElementById("subto2").value = (qu2*harga2);
            var subtotal2 = (qu2*harga2);
          }
          else if (har2 == "Website Invitation") {
            var harga2 = 450000;
            var qu2 = document.getElementById("form1").quantity2.value;
            document.getElementById("harga2").value = harga2;
            // var x = (qu*harga);
            document.getElementById("subto2").value = (qu2*harga2);
            var subtotal2 = (qu2*harga2);
          }
          else if (har2 == "Undangan Cetak type TRIFOLD") {
            var harga2 = 5000;
            var qu2 = document.getElementById("form1").quantity2.value;
            document.getElementById("harga2").value = harga2;
            // var x = (qu*harga);
            document.getElementById("subto2").value = (qu2*harga2);
            var subtotal2 = (qu2*harga2);
          }
          else if (har2 == "Undangan Cetak type 103") {
            var harga2 = 2000;
            var qu2 = document.getElementById("form1").quantity2.value;
            document.getElementById("harga2").value = harga2;
            // var x = (qu*harga);
            document.getElementById("subto2").value = (qu2*harga2);
            var subtotal2 = (qu2*harga2);
          }
          else if (har2 == "Undangan Cetak type 104") {
            var harga2 = 2000;
            var qu2 = document.getElementById("form1").quantity2.value;
            document.getElementById("harga2").value = harga2;
            // var x = (qu*harga);
            document.getElementById("subto2").value = (qu2*harga2);
            var subtotal2 = (qu2*harga2);
          }
          else if (har2 == "Undangan Cetak type 109") {
            var harga2 = 4000;
            var qu2 = document.getElementById("form1").quantity2.value;
            document.getElementById("harga2").value = harga2;
            // var x = (qu*harga);
            document.getElementById("subto2").value = (qu2*harga2);
            var subtotal2 = (qu2*harga2);
          }
          else if (har2 == "Undangan Cetak type C09") {
            var harga2 = 6000;
            var qu2 = document.getElementById("form1").quantity2.value;
            document.getElementById("harga2").value = harga2;
            // var x = (qu*harga);
            document.getElementById("subto2").value = (qu2*harga2);
            var subtotal2 = (qu2*harga2);
          }
          else if (har2 == "Undangan Cetak type K77") {
            var harga2 = 5000;
            var qu2 = document.getElementById("form1").quantity2.value;
            document.getElementById("harga2").value = harga2;
            // var x = (qu*harga);
            document.getElementById("subto2").value = (qu2*harga2);
            var subtotal2 = (qu2*harga2);
          }
          else if (har2 == "Undangan Cetak type T01") {
            var harga2 = 3000;
            var qu2 = document.getElementById("form1").quantity2.value;
            document.getElementById("harga2").value = harga2;
            // var x = (qu*harga);
            document.getElementById("subto2").value = (qu2*harga2);
            var subtotal2 = (qu2*harga2);
          }
          else if (har2 == ""){
            var harga2 = "";
            document.getElementById("subto2").value = "";
            document.getElementById("harga2").value = harga2;
          }
        }
        function startCalc(){
          interval = setInterval("calc()",0);
        }
        function calc(){
          var st1 = document.getElementById("form1").subto1.value;
          var st2 = document.getElementById("form1").subto2.value;
          if (st1 == 0 ) {
            document.getElementById("subtotal").value = 0 +parseInt(st2);  
          }else if(st2 == 0){
            document.getElementById("subtotal").value = parseInt(st1) + 0;  
          }else if(st1 == 0 || st2 == 0){
            alert("Pilih Layanan dan Quantity!");
          }else{
           document.getElementById("subtotal").value = parseInt(st1)+parseInt(st2);
         }

         var tampungsub = document.getElementById("form1").subtotal.value;
         var dis = document.form1.diskon.value;
         document.getElementById("total").value = parseInt(tampungsub)-(parseInt(tampungsub*(parseInt(dis)/100)));
       }
       function stopCalc(){
        clearInterval(interval);
      }


      $(document).ready(function(){
        $('#submittandatangan').click(function(e){
          e.preventDefault();
          $('#submitcetak').attr('disabled',false);
        });
      });



      </script>

</head>

<body>
<?php  
      $cek = isset($_SESSION['user']);
      $sql = $db->koneksi->query("SELECT MAX(no_invoice) FROM invoice");
      while ($data = $sql->fetch_array()){
         // var_dump($data);  
        $berurut = $data[0] + 1;
        $untuknomor = sprintf("%06s",$berurut);

      }

     // if (isset($_POST['submittandatangan'])) {
     //    $noinvo = $_POST['noinvoice'];
     
            //proses hashing dengan SHA256
            $en = hash("sha256", $untuknomor);
            // $plt = (string) $en;
              // $en = "01949ad79c88b74c8799592029b613ab94055f9e7b938f68a021ea0c2262f1e6";
            //proses enkripsi hash dengan RSA
            $p = 137;
            $q = 131; 
            $n = ($p*$q); 
            $totien = (($p-1)*($q-1));
            $e = 3;
            //konvert $en ke desimal
            $p_dec = array();
            $p_arr = str_split($en);
            for ($i=0; $i < count($p_arr); $i++) { 
             $p_dec[]=hexdec($p_arr[$i]);
           }
            //enkripsi
           $enk = array();
           $enk_hex = array();
           for ($i=0; $i < count($p_dec); $i++) { 
             $enc[] = bcpowmod($p_dec[$i], $e, $n);
             $enc_hex[] = dechex($enc[$i]);
           }
           $ciphertext = implode('', $enc_hex);
            //generate to qrcode
            //nama file setelah generate
            // intval($noin).
           $nafile = intval($berurut).".png";
            //kualitas qrcode
           $quality = 'H';
           //ukuran qrcode
           $ukuran = 2;
           $padding = 1;
           qrcode::png($ciphertext,$tempdir.$nafile,$quality,$ukuran,$padding);
      
?>

 
 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="assets/img/brand/logo-uniqa-3.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <!-- Divider -->
              <a class="nav-link">
                <i class="ni text-primary"></i>
                <h3 class="nav-link-text">Menu</h3>
              </a> <hr class="my-3">
              <a class="nav-link" href="dashboard.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="tambahinvoice.php">
                <i class="ni ni-fat-add"></i>
                <span class="nav-link-text"><b>Tambah Invoice</b></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="datainvoice.php">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Data Invoice</span>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="datakonsumen.php">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Data Konsumen</span>
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="validasiuniqa.php">
                <i class="ni ni-check-bold text-primary"></i>
                <span class="nav-link-text">Verifikasi</span>
              </a>
            </li>
             <!-- <li class="nav-item">
              <a class="nav-link" href="SHARSA.php">
                <i class="ni ni-check-bold text-primary"></i>
                <span class="nav-link-text">Pengujian</span>
              </a>
            </li> -->
          </ul>
        </div>
      </div>
    </div> 
  </nav> 
<!-- Main content -->
<div class="main-content" id="panel">
  <!-- Topnav -->
  <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Search form -->
        <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative input-group-merge">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
          <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </form>
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">
          <li class="nav-item d-xl-none">
            <!-- Sidenav toggler -->
            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link"href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                <img src="assets/img/brand/girl.png">
                  </span> 
                </span> 
                
                <div class="media-body  ml-2  d-none d-lg-block">
                 
                  <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['user']['nama_lengkap'];?></span>
                  
                </div>
              </div>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </a>
          </li>
          
        </ul>
        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             
            </a>
            <div class="dropdown-menu  dropdown-menu-right ">
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Header -->
  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Tambah Invoice</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card border-0">
          <div class="container">

            <form method="post" id="form1" name="form1" action="tambahdatainvoice2.php">
              <div class="container-left">
                <div class="row input">
                  <div class="col-sm-4 geser" style="margin-top: 30px">
                    <h2><b>No. Invoice</b></h2>
                    
                  </div>
                  <div class="col-sm-5" style="margin-top: 20px">
                    <div class="row">
                      <div class="col-sm-3 utk">
                        <input type="number" class="form-control" value="<?php echo sprintf("%06s",$berurut); ?>" name="noinvoice"  style="width: 150px;margin-left: -100px; margin-top: 35px; margin-right:110px; font-size: 18px; text-align: center;" id="noinvoice" readonly>
                        
                      </div>
                        </div>                     
                      </div>
                    </div>
                    <hr />
                  </div>


                  <div class="content">
                    <div class="row">
                      <div class="col-md-6">
                        
                        <div class="form-group  input">
                          <label>Nama Lengkap Konsumen</label>
                          
                          <input type="text" class="form-control" name="nama_konsumen" onfocus="startCalc()" onblur="stopCalc()" id="nama_konsumen" autocomplete="off">
                          
                        </div>

                        <div class="input form-group">
                          <label> No.Telp Konsumen</label>
                          <input type="text" class="form-control" name="notelp" id="notelp" autocomplete="off">
                        </div>

                        <div class= "input form-group">
                          <label>Tanggal</label>
                          <input type="date"  name="tanggal" id="tanggal" class="form-control"  >
                        </div>
                      </div>
                      <div class="col-md-5 after-add-more" style="background-color: #f6f6f6"> 
                        <div class="panel-group" style="margin-right: 50px">
                          <div class="panel-primary">                           
                            <div class="panel-heading" style="margin-top: -10px; margin-left: 20px"><b>Layanan - 1</b></div>
                            <div class="panel-body" style="margin-top: 30px">
                              <div class="form-group input">
                                <div class="row">
                                  <div class="col-sm-3" style="padding-top: 10px">
                                    <label>Quantity</label>
                                  </div>
                                  <div class="col-sm-3">
                                    <input type="number" id="quantity1" value="0" style="width: 150px" class="form-control" name="quantity1">
                                  </div>
                                  <div class="col-sm-2" style="margin-left: 60px"  hidden>
                                    <input type="number" name="subto1" id="subto1" onfocus="startCalc()" value="0" onblur="stopCalc()" style="width: 50px" readonly hidden> 
                                  </div>
                                  <div class="col-sm-2" hidden>
                                    <input type="number" id="subto2" name="subto2" onfocus="startCalc()" style="width: 50px" onblur="stopCalc()" readonly hidden>
                                  </div>
                                </div>

                                <div class="input form-group" style="margin-top: 10px">
                                  <Label>Layanan - 1</Label>
                                  <select class="custom-select form-control" onchange="tampil1()" id="layanan1"  name="layanan1">
                                    
                                    <option></option>
                                    <option value="Desain Poster">Desain Poster</option>
                                    <option value="Desain Logo">Desain Logo</option>
                                    <option value="Desain Stiker">Desain Stiker</option>
                                    <option value="Desain & Cetak Undangan">Website Invitation</option>
                                    <option value="Video Invitation">Video Invitation</option>
                                    <option value="Undangan Cetak type TRIFOLD">Undangan Cetak type TRIFOLD</option>
                                    <option value="Undangan Cetak type 103">Undangan Cetak type 103</option>
                                    <option value="Undangan Cetak type 104">Undangan Cetak type 104</option>
                                    <option value="Undangan Cetak type 109">Undangan Cetak type 109</option>
                                    <option value="Undangan Cetak type C09">Undangan Cetak type C09</option>
                                    <option value="Undangan Cetak type K77">Undangan Cetak type K77</option>
                                    <option value="Undangan Cetak type T01">Undangan Cetak type T01</option>
                                  </select>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>

                        <div class="panel-group input" style="margin-top: 50px">
                          <div class="panel-primary">
                            
                            <div class="panel-heading" style="margin-top: -10px; margin-left: 20px"><b>Layanan - 2</b></div>
                            <div class="panel-body" style="margin-top: 30px">
                              <div class="form-group input">
                                <div class="row">
                                  <div class="col-sm-3" style="padding-top: 10px">
                                    <label>Quantity</label>
                                  </div>
                                  <div class="col-sm-3">
                                    <input type="number" id="quantity2"  style="width: 150px" class="form-control" name="quantity2">
                                  </div>
                                  <div class="col-sm-2" style="margin-left: 60px" hidden>
                                    <input type="number" name="harga1"  id="harga1" readonly hidden style="width: 50px"> 
                                  </div>
                                  <div class="col-sm-2" hidden>
                                    <input type="number" readonly hidden id="harga2"  name="harga2"style="width: 50px">
                                  </div>
                                </div>

                                <div class="form-group input" style="margin-top: 10px">
                                  <Label>Layanan - 2</Label>
                                  <select class="custom-select form-control" onchange="tampil2()" id="layanan2"  name="layanan2">
                                    <option></option>
                                    <option value="Desain Poster">Desain Poster</option>
                                    <option value="Desain Logo">Desain Logo</option>
                                    <option value="Desain Stiker">Desain Stiker</option>
                                    <option value="Desain & Cetak Undangan">Website Invitation</option>
                                    <option value="Video Invitation">Video Invitation</option>
                                    <option value="Undangan Cetak type TRIFOLD">Undangan Cetak type TRIFOLD</option>
                                    <option value="Undangan Cetak type 103">Undangan Cetak type 103</option>
                                    <option value="Undangan Cetak type 104">Undangan Cetak type 104</option>
                                    <option value="Undangan Cetak type 109">Undangan Cetak type 109</option>
                                    <option value="Undangan Cetak type C09">Undangan Cetak type C09</option>
                                    <option value="Undangan Cetak type K77">Undangan Cetak type K77</option>
                                    <option value="Undangan Cetak type T01">Undangan Cetak type T01</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>     
                  
                  <div class="row">
                    <div class="col-md-6">
                      
                      <div class="form-group input">
                        <label>Tanda Tangan</label>
                        <input type="text" class="form-control" id="tandatangan" value="<?php echo($ciphertext); ?>"  name="tandatangan" readonly>
                      </div>

                      
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group input">
                        <label>Sub Total</label>
                        <input type="number" id="subtotal" style="width: 150px; margin-left: " class="form-control" onfocus="startCalc()" onblur="stopCalc()"  name="subtotal" readonly>
                      </div>

                      <div class="form-group input">
                       <label>Diskon</label>
                       <input type="number" id="diskon" style="width: 150px; margin-left: " class="form-control" onfocus="startCalc()" onblur="stopCalc()"  name="diskon">
                      </div>

                     <div class="form-group input">
                       <label>Total</label>
                       <input type="number" id="total" class="form-control" style="width: 350px"onfocus="startCalc()" name="total" readonly="">
                     </div>

                     
                   </div>
                 </div>

                 <div class="form-group qr"  style="margin-top: -200px">
                  <img src="./temp/<?php echo $nafile; ?>">  
                </div>
                
                <div class="row ">
                 <div class="col-sm-6" style="padding-left: 30px; margin-bottom: 30px">
                   <button class="btn btn-primary" name="submittandatangan" id="submittandatangan"><i class="fa fa-plus-circle"> Tambahkan Tanda Tangan</i></button>
                   <input type="submit"  class="btn btn-primary" name="submitcetak" onclick="return confirm('Tambahkan Data Ini?')" id="submitcetak" disabled value="Cetak Invoice">
                 </div>
               </div>    
             </div>
           </form>
         </div>
       </div>
     </div>

    


              <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Apakah Data Sudah Terisi Dengan Benar Dan Ingin Menyimpan ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit"  class="btn btn-primary" name="submitcetak" id="submitcetak" value=" Cetak Invoice">
              </div>
            </div>
          </div>
        </div>


     <footer class="footer pt-0">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
          <div class="copyright text-center  text-lg-left  text-muted">
            &copy; 2021 <a href="https://www.uniqa.id" class="font-weight-bold ml-1" target="_blank">Uniqa Indonesia</a>
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
              <a href="https://uniqa.id/contacts/" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.uniqa.id/contacts/" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="https://uniqa.id/blog/" class="nav-link" target="_blank">Blog</a>
            </li>
            
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</div>

<!-- Footer -->
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

</body>
</html>
