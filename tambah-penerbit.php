<?php
session_start();
require "koneksi.php";
$nama_penerbit = "";
$alamat        = "";
$kota          = "";
$no_telepon    = "";
$sukses        = "";
$error         = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql3       = "delete from penerbit where id = '$id'";
    $q3         = mysqli_query($koneksi,$sql3);
    if($q3){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id             = $_GET['id'];
    $sql3           = "select * from penerbit where id = '$id'";
    $q3             = mysqli_query($koneksi, $sql3);
    $r3             = mysqli_fetch_array($q3);
    $nama_penerbit  = $r3['nama_penerbit'];
    $alamat         = $r3['alamat'];
    $kota           = $r3['kota'];
    $no_telepon     = $r3['no_telepon'];

    if ($nama_penerbit == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $nama_penerbit  = $_POST['nama_penerbit'];
    $alamat         = $_POST['alamat'];
    $kota           = $_POST['kota'];
    $no_telepon     = $_POST['no_telepon'];

    if ($nama_penerbit && $alamat && $kota && $no_telepon) {
        if ($op == 'edit') { //untuk update
            $sql3       = "update penerbit set nama_penerbit = '$nama_penerbit',alamat='$alamat',kota = '$kota',no_telepon='$no_telepon' where id = '$id'";
            $q3         = mysqli_query($koneksi, $sql3);
            if ($q3) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql3   = "insert into penerbit(nama_penerbit,alamat,kota,no_telepon) values ('$nama_penerbit','$alamat','$kota','$no_telepon')";
            $q3     = mysqli_query($koneksi, $sql3);
            if ($q3) {
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
    <title>Create / Update Penerbit</title>
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
<div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Create / Update Data Penerbit
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
                        <label for="nama_penerbit" class="col-sm-2 col-form-label">Nama Penerbit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" value="<?php echo $nama_penerbit ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $kota ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_telepon" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?php echo $no_telepon ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
</body>
</html>