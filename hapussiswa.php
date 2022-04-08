<?php
include 'koneksi.php';?>
<script src="js/sweetalert.min.js"></script>;

<?php
$id = $_GET['id'];

$hapus = "DELETE FROM tbl_siswa WHERE id='$id'";
$query = mysqli_query($kon, $hapus);

if($query){
    echo "<script language='javascript'>
    swal({
        title: 'Good Job!',
        text: 'Data Berhasil Dihapus',
        icon: 'success'
    }).then(function() {
        window.location = 'mastersiswa.php';
    });
    </script>";
}else {
    echo "<script language='javascript'>
    swal({
        title: 'Bad!',
        text: 'Data Gagal Dihapus',
        icon: 'error'
    }).then(function() {
        window.location = 'mastersiswa.php';
    });
    </script>";
}

$hasil = "SELECT * FROM tbl_siswa ORDER BY id = '$id'";
$ubah = mysqli_query($kon,$hasil);

$no = 1;
while($row = mysqli_fetch_array($ubah)){
    // membaca id dari record yang tersisa dari tabel
    $id = $row['id'];

    // proses update data
    $update = "UPDATE tbl_siswa SET id = $no WHERE id = '$id'";
    mysqli_query($kon,$update);

    // auto-increment
    $no++;
}

// mengubah nilai auto increment menjadi $no terakhir ditambah 1
$query = "ALTER TABLE tbl_siswa AUTO_INCREMENT = $no";
mysqli_query($kon,$query); 





?>