<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/all.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:200,400,600&display=swap"
    rel="stylesheet">

  <!-- My CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

  <title><?php echo $judul; ?></title>
</head>

<body>
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?php echo base_url();?>assets/img/1.png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav  mx-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>Auth">Home</a>
          </li>
          <li class="nav-item ">
        <a class="nav-link " href="<?php echo base_url();?>Auth/login">
          Login
        </a>
        <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Admin</a>
          <a class="dropdown-item" href="#">Mahasiswa</a>
        
         
        </div> -->
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Judul Skripsi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Auth/fti">Fakultas Teknologi Informasi</a>
          <a class="dropdown-item" href="">Fakultas Ilmu Pendidikan</a>
          <a class="dropdown-item" href="#">Fakultas Agama Islam</a>
          <a class="dropdown-item" href="#">Fakultas Pertanian</a>
          <a class="dropdown-item" href="#">Fakultas Ekonomi</a>
          <!--<div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>-->
        </div>
      </li>
         
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>Auth/fbimbing">Dosen Pembimbing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Panduan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profil</a>
          </li>
        </ul>
     
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->