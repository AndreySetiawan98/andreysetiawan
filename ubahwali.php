<?php
include 'koneksi.php';?>
<script src="js/sweetalert.min.js"></script>;

<?php
if(isset($_POST['simpan'] )){

   $id = $_POST["id"]; 
   $nama = htmlspecialchars($_POST["nama"]);
   $nip = htmlspecialchars($_POST["nip"]);
   $alamat = htmlspecialchars($_POST["alamat"]);
   $jenis = htmlspecialchars($_POST["jenis"]);
   $agama = htmlspecialchars($_POST["agama"]);
   $wakel = htmlspecialchars($_POST["wakel"]);
   $status = htmlspecialchars($_POST["status"]);
   $status_lama = $_POST["status_lama"];
   
   $foto = $_POST["foto_lama"];
   $gambar = $_FILES["gambar"]['name'];
   $source = $_FILES['gambar']['tmp_name'];
   $folder = 'gambar/';
   move_uploaded_file($source,$folder.$gambar);

   if($gambar !== "") {
        $folder = 'gambar/'.$foto;
        unlink("$folder");
        $foto = $gambar;
        move_uploaded_file($source,$folder.$gambar);
   }else{
        $foto = $foto;
   }
   
   if($status !== ""){
        $status = $status;
   }else{
       $status = $status_lama;
   }

    // query insert data
    $query = "UPDATE tbl_wali SET
               nama_wali = '$nama',
               nip = '$nip',
               alamat = '$alamat',
               jkl = '$jenis',
               agama = '$agama',
               walikelas = '$wakel',
               status = '$status',
               foto = '$foto'
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
            window.location = 'masterwalikelas.php';
        });
        </script>";
    } else {
        echo "<script language='javascript'>
        swal({
            title: 'Bad!',
            text: 'Data Gagal Diubah',
            icon: 'success'
        }).then(function() {
            window.location = 'masterwalikelas.php';
        });
        </script>";
    }
}

?>
