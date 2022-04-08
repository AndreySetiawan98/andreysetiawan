<?php
include 'koneksi.php';?>
<script src="js/sweetalert.min.js"></script>;

<?php
if(isset($_POST['simpan'] )){

   $id = $_POST["id"]; 
   $tahun = $_POST["tahun"];

    // query insert data
    $query = "UPDATE tbl_tahun SET
               id_tahun = $tahun
               WHERE id = '$id'
            ";

    $ubah = mysqli_query($kon, $query);

    if($ubah > 0){
        echo "<script language='javascript'>
        swal({
            title: 'Good Job!',
            text: 'Data Berhasil Diubah',
            icon: 'success'
        }).then(function() {
            window.location = 'mastertahun.php';
        });
        </script>";
    } else {
        echo "<script language='javascript'>
        swal({
            title: 'Bad!',
            text: 'Data Gagal Diubah',
            icon: 'alert'
        }).then(function() {
            window.location = 'mastertahun.php';
        });
        </script>";
    }
}

?>
