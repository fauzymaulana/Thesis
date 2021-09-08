<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/logo-uniqa-3.png" type="image/png">
  
  <?php session_start(); ?>
  <?php
  if (isset($_POST['submit'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];

    require 'DbConfig.php';
    $db = new DbConfig();

    $q_user = "SELECT * FROM users WHERE username='$u'";
    $baca = $db->koneksi->query($q_user);
    while ($ada = $baca->fetch_assoc()) {
      if (md5($p) === $ada['password']) {

        session_start();
        $dataUser = array(
          'id_adm' => $ada['id_adm'],
          'nama_lengkap' => $ada['nama_lengkap'],
          'username' => $ada['username']
        );
        $_SESSION['user'] = $dataUser;
        header('location: dashboard.php');
      }
    }
  }

  ?>   
  
  <title>Uniqa Share Your Moment</title>

  <link href="css.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- <link rel="stylesheet" type="text/css" href="stylelogin.css"> -->

  <!-- CSS -->
    <style type="text/css">

      body { 
       padding: 0;
       margin: auto;
       overflow-x: hidden;
       display: flex;
       justify-content: center;
       align-items: center;
       height: 100vh;
       background: #FBFBFB;
       font-family: 'Poppins', sans-serif;
     }
     .container {
      width: 100%;
      display: grid;
      grid-template-columns: repeat(8,1fr);
      margin: 0px;
      box-shadow: 2px 10px 20px rgba(0,0,0,.1);
      border-radius: 20px;
      background-color: white;
      overflow: hidden;
    }

    .container-left {
      grid-column: 1/9;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      margin-bottom: 10px;
      padding:0px;
      background-color: #C6CCF8;
    }

    .container-left img {
      width: 100%;
    }


    .container-left h1 {
      text-align: center;
      font-size: 1.5em;
      padding: 10px 0;
    }

    .container-left p {
      text-align: center;
    }

    .container-right {
      grid-column: 1/9;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding: 25px;
      
    }

    .container-right h2 {
      display: none;
    }

    .container-right form {
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .container-right .input {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      margin: 10px 0;
      width: 90%;

    }
    .input label {
      font-size: 1em;
      font-weight: 550;
    }

    .input input {
      width: 90%;
      padding: 10px;
      margin-top: 10px;
      outline: none;
      border: 2px solid rgba(0,0,0,0.5);
      border-radius: 5px;
      transition: .5s;
    }

    .input input:focus {
      border: 2px solid #3B5FF9;
      transition: .5s;
    }

    .container-right button {
      width: 90%;
      height: 40px;
      border: none;
      margin-top: 20px;
      background-color: #5876F8;
      color: white;
      cursor: pointer;
      border-radius: 10px;
      font-weight: bold;
      font-family: 'Poppins', sans-serif;
      transition: .5s;
    }

    .container-right button:hover {
      transition: .5s;
      background-color: #3B5FF9;
    }

    @media screen and (min-width: 450px) {
      .container {
        width: 400px;
      }
      .container-left img{
        width: 100%;
      }
      .container-right h2 {
      display: flex;
        font-family: 'Poppins', sans-serif;
       
    }

    }

    @media screen and (min-width: 760px) {

      .container {
        width: 100%;
      }

      body {
        height: 100vh;
      }
      .container-left {
        grid-column: 1/6;
        margin-bottom: 0;
        padding: 0px;

      }
      .container-left img {
        width: 80%;
      }

      .container-left .text {
        padding: 10px 0 0;
        width: 350px;
      }

      .container-left h1 {
        font-size: 1.5em;
      }

      .container-right h2 {
        display: block;
      }


      .container-left p {
        font-size: .9em;
      }

      .container-right {
        grid-column: 6/9;
      }
      .container-right img{
        width: 50%;

      }

    }


    @media screen and (min-width: 960px) {
      .container {
        width: 900px;
        height: 550px;
      }

      .container-left {
        padding: 0;
      }

      .container-left .text {
        padding: 10px 0 0;
        width: 480px;
      }
    }
  </style>
</head>
<body>
  <div class="container">

    <div class="container-left">
      <img src="/backupudahbisalogindanlogout/argon-dashboard-master/assets/img/brand/login.png" style="margin-top: 90px"; height="450px">
    </div>

    <div class="container-right"> 
      <h2>Silahkan Login</h2>
      <form method="post" action="" class="">
        <div class="input">
          <input type="text" name="username" placeholder="enter your username" required>
        </div>
        <div class="input">
          <input type="password" name="password" placeholder="enter your password" required>
        </div>
        <button type="submit" name="submit" class="btn-primary">Login</button>
      </form>
    </div>
  </div>

  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
 
</body>
</html>