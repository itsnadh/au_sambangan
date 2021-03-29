<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Pengumuman siswa kelas X layanan SKS 2/3 tahun</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/logoMAI.png" type="image/x-icon">
    <!--<link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">-->

    <!-- Bootstrap core CSS -->
<link href="<?php echo base_url() ?>assets/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="<?php echo base_url(); ?>index1/proses_login">
  <img class="mb-4" src="<?php echo base_url(); ?>assets/logoMAI.png" alt="" width="45%" height="45%">
  <h1 class="h3 mb-3 font-weight-normal">Sambangan <br/> MAI Amanatul Ummah</h1>
  <input type="text" id="" class="form-control" placeholder="Masukkan Username" required  name="username">
  <input type="password" id="inputPassword" class="form-control" placeholder="Masukkan Password" required name="password">
  <div class="checkbox mb-3">
    <!--<label>-->
    <!--   <input type="checkbox" value="remember-me"> Remember me -->
    <!--</label>-->
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
  <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p> -->
</form>
</body>
</html>
