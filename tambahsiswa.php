<?php
include 'koneksi.php';?>
<script src="js/sweetalert.min.js"></script>;

<?php
if(isset($_POST['tambah'] )){
    
   $nama = htmlspecialchars($_POST["nama"]); //1
   $idtahun = htmlspecialchars($_POST["id_tahun"]); //2
   $idkelas = htmlspecialchars($_POST["idkelas"]); //3
   $nis = htmlspecialchars($_POST["nis"]); //4
   $nisn = htmlspecialchars($_POST["nisn"]); //5
   $alamat = htmlspecialchars($_POST["alamat"]); //6
   $jenis = htmlspecialchars($_POST["jenis"]); //7
   $tgllahir = htmlspecialchars($_POST["tgllahir"]); //8
   $agama = htmlspecialchars($_POST["agama"]); //9

   $status = htmlspecialchars($_POST["status"]); //10
   $namaayah = htmlspecialchars($_POST["namaayah"]); //11
   $namaibu = htmlspecialchars($_POST["namaibu"]); //12
   $telp = htmlspecialchars($_POST["notlp"]); //13
   $krjayah = htmlspecialchars($_POST["krjayah"]); //14
   $krjibu = htmlspecialchars($_POST["krjibu"]); //15

   $namawali = htmlspecialchars($_POST["namawali"]); //16
   $krjwali = htmlspecialchars($_POST["krjwali"]); //17
   $tlpwali = htmlspecialchars($_POST["nowali"]); //18
   $alamatwali = htmlspecialchars($_POST["alamatwali"]); //19
   
   $foto = $_FILES['gambar']['name']; //20
   $source = $_FILES['gambar']['tmp_name'];
   $folder = 'gambar/';

   move_uploaded_file($source,$folder.$foto);

   // query insert data
   $query = "INSERT INTO tbl_siswa
   VALUES
   ('','$idtahun','$idkelas','$nama','$nis','$nisn','$alamat','$jenis',
   '$tgllahir','$agama','$status','$namaayah','$namaibu','$telp','$krjayah'
   ,'$krjibu','$foto','$namawali','$krjwali','$tlpwali','$alamatwali')";

   $cek = mysqli_query($kon, $query);

   if($cek > 0){
    echo "<script language='javascript'>
    swal({
        title: 'Good Job!',
        text: 'Data Berhasil Ditambah',
        icon: 'success'
    }).then(function() {
        window.location = 'mastersiswa.php';
    });
    </script>";
} else {
    echo "<script language='javascript'>
    swal({
        title: 'Bad!',
        text: 'Data Gagal Ditambah',
        icon: 'error'
    }).then(function() {
        window.location = 'mastersiswa.php';
    });
    </script>";
}
   }

if(isset($_POST['reset'] )){
    $nama = '';
    $idtahun = '';
    $idkelas= '';
    $nis='';
    $nisn='';
    $alamat='';
    $jenis = '';
    $tgllahir = '';
    $agama= '';
    $status='';
    $namaayah='';
    $namaibu='';
    $telp = '';
    $krjayah = '';
    $krjibu= '';
    $namawali='';
    $krjwali='';
    $tlpwali='';
    $alamatwali='';
}

?>