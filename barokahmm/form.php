<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $SKU = $_POST['SKU'];
      $Nama_Barang = $_POST['Nama_Barang'];
      $Kategori = $_POST['Kategori'];
      $Jml_Stok = $_POST['Jml_Stok'];
      $Harga_Satuan = $_POST['Harga_Satuan'];
      //query SQL
      $query = "INSERT INTO rak_barang (SKU, Nama_Barang, Kategori, Jml_Stok, Harga_Satuan) VALUES('$SKU','$Nama_Barang','$Kategori','$Jml_Stok','$Harga_Satuan')"; 

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
    <title>Tambah Stok</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Barokah Minimarket</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "index.php"; ?>">Stok Minimarket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "form.php"; ?>">Tambah Stok</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "kategori.php"; ?>">Manajemen Kategori</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "cari.php"; ?>">Pencarian</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "filter.php"; ?>">Filter Range Harga</a>
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

          <h2 style="margin: 30px 0 30px 0;">Tambahkan Stok</h2>
          <form action="form.php" method="POST">
            
            <div class="form-group">
              <label>SKU</label>
              <input type="text" class="form-control" placeholder="SKU Barang" name="SKU" required="required">
            </div>
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" class="form-control" placeholder="Nama Barang" name="Nama_Barang" required="required">
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="custom-select" name="Kategori" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="ATK">ATK</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jml Stok</label>
              <textarea class="form-control" name="Jml_Stok" required="required"></textarea>
            </div>
            <div class="form-group">
              <label>Harga Satuan</label>
              <textarea class="form-control" name="Harga_Satuan" required="required"></textarea>
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