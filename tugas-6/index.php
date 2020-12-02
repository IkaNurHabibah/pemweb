<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>index</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Curriculum Vitae</a>
    </nav>

  <div id="menu-utama">

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "view.php"; ?>">View CV</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="<?php echo "form.php"; ?>">Form Education</a>
              </li>
            </ul>
          </div>
        </nav>
    </div>

    <div id="konten">
			
      </div>
      <script>
        $(document).ready(function(){
          // halaman default
          $('#konten').load('form  .php');
  
          // fungsi yang mengatur konten mana yang akan ditampilkan
          $('#menu-utama a').click(function(){
            // mengambil data dari href
            var hal = $(this).attr('href');
            // konten akan diisi oleh menu yang dipilih sesuai dengan isi dari href yang dipilih
            $('#konten').load(hal+'.php');
            return false;
          });
        });
      </script>
       
		
 