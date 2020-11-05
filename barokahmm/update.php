<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['SKU'])) {
          //query SQL
          $sku_upd = $_GET['SKU'];
          $query = "SELECT * FROM rak_barang WHERE SKU = '$sku_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $SKU = $_POST['SKU'];
      $Nama_Barang = $_POST['Nama_Barang'];
      $Kategori = $_POST['Kategori'];
      $Jml_Stok = $_POST['Jml_Stok'];
      $Harga_Satuan = $_POST['Harga_Satuan'];
      //query SQL
      $sql = "UPDATE rak_barang SET Nama_Barang='$Nama_Barang', Kategori='$Kategori', Jml_Stok='$Jml_Stok', Harga_Satuan='$Harga_Satuan' WHERE SKU='$SKU'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: index.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>Update Stok</title>
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
                <a class="nav-link active " href="<?php echo "index.php"; ?>">Stok Minimarket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "form.php"; ?>">Tambah Stok</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "kategori.php"; ?>">Manajemen Kategori</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="<?php echo "cari.php"; ?>">Pencarian</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "filter.php"; ?>">Filter Range Harga</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


          <h2 style="margin: 30px 0 30px 0;">Update Stok Barang</h2>
          <form action="update.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>SKU</label>
              <input type="text" class="form-control" placeholder="SKU Barang" name="SKU" value="<?php echo $data['SKU'];  ?>" required="required" readonly>
            </div>
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" class="form-control" placeholder="Nama Barang" name="Nama_Barang" value="<?php echo $data['Nama_Barang'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="custom-select" name="Kategori" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="Makanan" <?php echo $data['Kategori']=='Makanan' ? "selected" : "" ?>>Makanan</option>
                <option value="Minuman" <?php echo $data['Kategori']=='Minuman' ? "selected" : "" ?>>Minuman</option>
                <option value="ATK" <?php echo $data['Kategori']=='ATK' ? "selected" : "" ?>>ATK</option>
              </select>
            </div>

            <div class="form-group">
              <label>Jml Stok</label>
              <textarea class="form-control" name="Jml_Stok" required="required"><?php echo $data['Jml_Stok'];  ?></textarea>
            </div>
            <div class="form-group">
              <label>Harga Satuan</label>
              <textarea class="form-control" name="Harga_Satuan" required="required"><?php echo $data['Harga_Satuan'];  ?></textarea>
            </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>