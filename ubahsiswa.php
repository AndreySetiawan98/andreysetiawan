<?php
include 'koneksi.php';?>
<script src="js/sweetalert.min.js"></script>;

<?php
if(isset($_POST['simpan'] )){

    $id = $_POST["id"]; 
    $nama = htmlspecialchars($_POST["nama"]); //1
    $idtahun = htmlspecialchars($_POST["idtahun"]); //2
    $idkelas = htmlspecialchars($_POST["idkelas"]); //3
    $nis = htmlspecialchars($_POST["nis"]); //4
    $nisn = htmlspecialchars($_POST["nisn"]); //5
    $alamat = htmlspecialchars($_POST["alamat"]); //6
    $jenis = htmlspecialchars($_POST["jkl"]); //7
    $tgllahir = htmlspecialchars($_POST["tgl_lahir"]); //8
    $agama = htmlspecialchars($_POST["agama"]); //9
 
    $status = htmlspecialchars($_POST["status"]); //10
    $status_lama = $_POST["status_lama"];
    $namaayah = htmlspecialchars($_POST["nama_ayah"]); //11
    $namaibu = htmlspecialchars($_POST["nama_ibu"]); //12
    $telp = htmlspecialchars($_POST["no_telp"]); //13
    $krjayah = htmlspecialchars($_POST["krj_ayah"]); //14
    $krjibu = htmlspecialchars($_POST["krj_ibu"]); //15
 
    $namawali = htmlspecialchars($_POST["nama_wali"]); //16
    $krjwali = htmlspecialchars($_POST["krj_wali"]); //17
    $tlpwali = htmlspecialchars($_POST["nowali"]); //18
    $alamatwali = htmlspecialchars($_POST["alamat_wali"]); //19
    
    $foto = $_POST["foto_lama"];
    $gambar = $_FILES['gambar']['name']; //20
    $source = $_FILES['gambar']['tmp_name'];
    $folder = 'gambar/';
 
    move_uploaded_file($source,$folder.$foto);

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
    $query = "UPDATE tbl_siswa SET
               nama = '$nama',
               id_tahun = '$idtahun',
               id_kelas = '$idkelas',
               nis = '$nis',
               nisn = '$nisn',
               alamat = '$alamat',
               jkl = '$jenis',
               agama = '$agama',
               tgl_lahir = '$tgllahir',
               status = '$status',
               nama_ayah = '$namaayah',
               nama_ibu = '$namaibu',
               no_telp = '$telp',
               pkrj_ayah = '$krjayah',
               pkrj_ibu = '$krjibu',
               nama_wali = '$namawali',
               pkrj_wali = '$krjwali',
               no_telp_wali = '$tlpwali',
               alamat_wali = '$alamatwali',
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
            window.location = 'mastersiswa.php';
        });
        </script>";
    } else {
        echo "<script language='javascript'>
        swal({
            title: 'Bad!',
            text: 'Data Gagal Diubah',
            icon: 'success'
        }).then(function() {
            window.location = 'mastersiswa.php';
        });
        </script>";
    }
}

?>
