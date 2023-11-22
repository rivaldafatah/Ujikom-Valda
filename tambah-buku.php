<?php
session_start();
require "koneksi.php";
$nama_buku       = "";
$kategori     = "";
$harga   = "";
$stok    = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from buku where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from buku where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nama_buku  = $r1['nama_buku'];
    $kategori   = $r1['kategori'];
    $harga     = $r1['harga'];
    $stok       = $r1['stok'];

    if ($nama_buku == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $nama_buku  = $_POST['nama_buku'];
    $kategori   = $_POST['kategori'];
    $harga      = $_POST['harga'];
    $stok       = $_POST['stok'];
    $id_penerbit = $_POST['penerbit'];

    if ($nama_buku && $kategori && $harga && $stok && $id_penerbit) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update buku set nama_buku = '$nama_buku',kategori='$kategori',harga = '$harga',stok='$stok', id_penerbit='$id_penerbit' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into buku(nama_buku,kategori,harga,stok,id_penerbit) values ('$nama_buku','$kategori','$harga','$stok', '$id_penerbit')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create / Update Buku</title>
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
    <!-- untuk memasukkan data -->
    <div class="mx-auto">
    <div class="card">
            <div class="card-header">
                Create / Update Data Buku 
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=admin.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=admin.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama_buku" class="col-sm-2 col-form-label">Nama Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="<?php echo $nama_buku ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kategori" id="kategori">
                                <option value="">- Pilih Kategori -</option>
                                <option value="Novel" <?php if ($kategori == "novel") echo "selected" ?>>Novel</option>
                                <option value="Majalah" <?php if ($kategori == "majalah") echo "selected" ?>>Majalah</option>
                                <option value="Ensiklopedia" <?php if ($kategori == "ensiklopedia") echo "selected" ?>>Ensiklopedia</option>
                                <option value="Komik" <?php if ($kategori == "komik") echo "selected" ?>>Komik</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $stok ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="penerbit" id="penerbit">
                                <option value="">- Pilih Penerbit -</option>
                                <?php
                                $query_penerbit = "SELECT * FROM penerbit";
                                $result_penerbit = mysqli_query($koneksi, $query_penerbit);

                            if (mysqli_num_rows($result_penerbit) > 0) {
    while ($penerbit = mysqli_fetch_assoc($result_penerbit)) {
        $selected = ($penerbit['id'] == $buku['penerbit_id']) ? 'selected' : '';
        echo '<option value="' . $penerbit['id'] . '" ' . $selected . '>' . $penerbit['nama_penerbit'] . '</option>';
    }
}
?>

                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>