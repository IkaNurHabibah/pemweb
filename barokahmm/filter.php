<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Index</title>
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
                <a class="nav-link" href="<?php echo "form.php"; ?>">Tambah Stok</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "kategori.php"; ?>">Manajemen Kategori</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "cari.php"; ?>">Pencarian</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "filter.php"; ?>">Filter Range Harga</a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h2 style="margin: 30px 0 30px 0;">Isi Rak Barang Saat Ini</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>SKU</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Jumlah Stok</th>
                  <th>Harga Satuan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM rak_barang";
                  $result = mysqli_query(connection(),$query);
                 ?>
                
                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['SKU'];  ?></td>
                    <td><?php echo $data['Nama_Barang'];  ?></td>
                    <td><?php echo $data['Kategori'];  ?></td>
                    <td><?php echo $data['Jml_Stok'];  ?></td>
                    <td><?php echo $data['Harga_Satuan'];  ?></td>      
                  </tr>
                 <?php endwhile ?>



                 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="table-responsive">
                    <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>SKU</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Jumlah Stok</th>
                  <th>Harga Satuan</th>
                </tr>
              </thead>
              <h2 style="margin: 30px 0 30px 0;">Inputkan Range Harga </h2>
              <form action="" method="post">
		      <input type="text" name="Harga_Satuan1">
		      <input type="text" name="Harga_Satuan2">
		      <input type="submit" name="tampilkan" value="TAMPILKAN">
	          </form>
	
	<h2>Hasil Filter Range Harga</h2>
	
	<?php
		if(isset($_POST["tampilkan"])){
			$hg1 = $_POST["Harga_Satuan1"];
			$hg2 = $_POST["Harga_Satuan2"];
 
			$no = 1;
 
			$sql = "SELECT * FROM rak_barang WHERE Harga_Satuan BETWEEN '$hg1' AND '$hg2'";
			$query = mysqli_query($connection(),$query) or die (mysqli_error($connection()));
 
			echo "<table border='1'>
					<thead>
						<tr>
							<th>No</th>
							<th>Products</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>";
 
                    while($data = mysqli_fetch_array($query))
                    {?>
						
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $data['SKU'];?></td>
							<td><?php echo $data['Nama_Barang'];?></td>
                            <td><?php echo $data['Kategori'];?></td>
                            <td><?php echo $data['Jml_Stok'];?></td>
                            <td><?php echo $data['Harga_Satuan'];?></td>
						</tr>
 
						<?php $no++; ?>
 
					<?php }
 
			echo "	</tbody>
				  </table>";
 
		}
			
	?>
 
</body>
</html>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
