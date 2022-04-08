<?php
include 'koneksi.php';?>
<script src="js/sweetalert.min.js"></script>;

<?php
if(isset($_POST['tambah'] )){
    
   $matpel = htmlspecialchars($_POST["matpel"]);

   // query insert data
   $query = "INSERT INTO tbl_pelajaran
   VALUES
   ('','$matpel')                
   ";
   $cek = mysqli_query($kon, $query);

   if($cek > 0){
    echo "<script language='javascript'>
    swal({
        title: 'Good Job!',
        text: 'Data Berhasil Ditambah',
        icon: 'success'
    }).then(function() {
        window.location = 'masterpelajaran.php';
    });
    </script>";
} else {
    echo "<script language='javascript'>
    swal({
        title: 'Bad!',
        text: 'Data Gagal Ditambah',
        icon: 'error'
    }).then(function() {
        window.location = 'masterpelajaran.php';
    });
    </script>";
}
   }

if(isset($_POST['reset'] )){
    $nama = '';
}

?>