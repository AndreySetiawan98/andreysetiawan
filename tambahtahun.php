<?php
include 'koneksi.php';?>
<script src="js/sweetalert.min.js"></script>;

<?php
if(isset($_POST['tambah'] )){

   $id = $_POST['angka'];
   $tahun = htmlspecialchars($_POST["tahun"]);

   // query insert data
   $query = "INSERT INTO tbl_tahun
   VALUES
   ('$id','$tahun')                
   ";
   $cek = mysqli_query($kon, $query);

   if($cek > 0){
    echo "<script language='javascript'>
    swal({
        title: 'Good Job!',
        text: 'Data Berhasil Ditambah',
        icon: 'success'
    }).then(function() {
        window.location = 'mastertahun.php';
    });
    </script>";
} else {
    echo "<script language='javascript'>
    swal({
        title: 'Bad!',
        text: 'Data Gagal Ditambah',
        icon: 'error'
    }).then(function() {
        window.location = 'mastertahun.php';
    });
    </script>";
}
   }

if(isset($_POST['reset'] )){
    $tahun = '';
}

?>