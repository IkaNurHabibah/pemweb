<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $namaSD = $_POST['namaSD'];
      $namaSMP = $_POST['namaSMP'];
      $namaSMA = $_POST['namaSMA'];
      $namaUNIV = $_POST['namaUNIV'];
      //query SQL
      $query = "INSERT INTO education (namaSD, namaSMP, namaSMA, namaUNIV) VALUES('$namaSD','$namaSMP','$namaSMA','$namaUNIV')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'Sukses';
      }
      else{
        $status = 'Error Dong';
      }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Form</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Curriculum Vitae</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "view.php"; ?>">View</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "form.php"; ?>">Form Education</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Stok Barang berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Stok Barang gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Education</h2>
          <form action="form.php" method="POST">
            
            <div class="form-group">
              <label>Nama SD</label>
              <input type="text" class="form-control" placeholder="Nama SD" name="namaSD" required="required">
            </div>
            <div class="form-group">
              <label>Nama SMP</label>
              <input type="text" class="form-control" placeholder="Nama SMP" name="namaSMP" required="required">
            </div>
            <div class="form-group">
              <label>Nama SMA</label>
              <input type="text" class="form-control" placeholder="Nama SMA" name="namaSMA" required="required">
            </div>
            <div class="form-group">
              <label>Nama Kampus</label>
              <input type="text" class="form-control" placeholder="Nama Univ" name="namaUNIV" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>