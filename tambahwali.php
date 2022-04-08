<?php
include 'koneksi.php';?>
<script src="js/sweetalert.min.js"></script>;

<?php
if(isset($_POST['tambah'] )){
    
   $nama = htmlspecialchars($_POST["nama"]);
   $nip = htmlspecialchars($_POST["nip"]);
   $alamat = htmlspecialchars($_POST["alamat"]);
   $jenis = htmlspecialchars($_POST["jenis"]);
   $agama = htmlspecialchars($_POST["agama"]);
   $wakel = htmlspecialchars($_POST["wakel"]);
   $status = htmlspecialchars($_POST["status"]);
   
   $foto = $_FILES['gambar']['name'];
   $source = $_FILES['gambar']['tmp_name'];
   $folder = 'gambar/';

   move_uploaded_file($source,$folder.$foto);

   // query insert data
   $query = "INSERT INTO tbl_wali
   VALUES
   ('','$nama','$nip','$alamat','$jenis',
   '$agama','$wakel','$status','$foto')                
   ";
   $cek = mysqli_query($kon, $query);

   if($cek > 0){
    echo "<script language='javascript'>
    swal({
        title: 'Good Job!',
        text: 'Data Berhasil Ditambah',
        icon: 'success'
    }).then(function() {
        window.location = 'masterwalikelas.php';
    });
    </script>";
} else {
    echo "<script language='javascript'>
    swal({
        title: 'Bad!',
        text: 'Data Gagal Ditambah',
        icon: 'error'
    }).then(function() {
        window.location = 'masterwalikelas.php';
    });
    </script>";
}
   }

if(isset($_POST['reset'] )){
    $nama = '';
    $nip = '';
    $alamat= '';
    $jenis='';
    $agama='';
    $foto='';
}

?>