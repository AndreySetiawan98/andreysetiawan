<?php
include 'koneksi.php';?>
<script src="js/sweetalert.min.js"></script>;

<?php
if(isset($_POST['simpan'] )){

   $id = $_POST["id"]; 
   $nama = htmlspecialchars($_POST["matpel"]);
   $status_lama = $_POST["status_lama"];

   if($nama !== ""){
    $nama = $nama;
    }else{
    $nama = $status_lama;
    }

    // query insert data
    $query = "UPDATE tbl_pelajaran SET
               mata_pelajaran = '$nama'
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
            window.location = 'masterpelajaran.php';
        });
        </script>";
    } else {
        echo "<script language='javascript'>
        swal({
            title: 'Bad!',
            text: 'Data Gagal Diubah',
            icon: 'success'
        }).then(function() {
            window.location = 'masterpelajaran.php';
        });
        </script>";
    }
}

?>
