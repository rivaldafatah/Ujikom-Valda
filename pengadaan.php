<?php
require "koneksi.php";
$nama_buku       = "";
$kategori     = "";
$harga   = "";
$stok    = "";
$nama_penerbit = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengadaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark sticky-sm-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">UNIBOOKSTORE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pengadaan.php">Pengadaan</a>
        </li>
        </ul>
    </div>
  </div>
</nav>
        <h2 text align="center">Pengadaan</h2>
     <!-- Output Tabel Pengadaan -->
     <div class="mx-auto">
     <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Buku (Buku yang segera dibeli, stok kurang dari 10)
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Stok</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT buku.id, buku.nama_buku, buku.stok, penerbit.nama_penerbit 
        FROM buku 
        INNER JOIN penerbit ON buku.id_penerbit = penerbit.id 
        WHERE buku.stok < 10 
        ORDER BY buku.id DESC";

        $result = mysqli_query($koneksi, $sql);
        $urut = 1;

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $nama_buku = $row['nama_buku'];
            $stok = $row['stok'];
            $nama_penerbit = $row['nama_penerbit'];

        ?>
            <tr>
                <th scope="row"><?php echo $urut++ ?></th>
                <td scope="row"><?php echo $nama_buku ?></td>
                <td scope="row"><?php echo $nama_penerbit ?></td>
                <td scope="row"><?php echo $stok ?></td>
            </tr>
        <?php
        }
        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
    </div>
</body>
</html>