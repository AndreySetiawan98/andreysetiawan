<?php
include 'koneksi.php'?>
<script src="../sekolah/admin/js/sweetalert.min.js"></script>;

<?php
if(isset($_POST['proses'] )) {
        
    $nama = mysqli_real_escape_string($kon, $_POST['nama']);
    $username = mysqli_real_escape_string($kon, $_POST['username']);
    $password = crypt($_POST['password'],'buku');
    $level = mysqli_real_escape_string($kon, $_POST['level']);
    
    if($level == "admin"){
      $foto = $_FILES['foto']['name'];
      $source = $_FILES['foto']['tmp_name'];
      $folder = '../sekolah/admin/gambar/';
      
      move_uploaded_file($source,$folder.$foto);
    }else if($level == "guru"){
      $foto = $_FILES['foto']['name'];
      $source = $_FILES['foto']['tmp_name'];
      $folder = '../sekolah/guru/gambar/';
      
      move_uploaded_file($source,$folder.$foto);
    }else if($level == "stafftu"){
      $foto = $_FILES['foto']['name'];
      $source = $_FILES['foto']['tmp_name'];
      $folder = '../sekolah/staff/gambar/';
      
      move_uploaded_file($source,$folder.$foto);
    }else if($level == "walikelas"){
      $foto = $_FILES['foto']['name'];
      $source = $_FILES['foto']['tmp_name'];
      $folder = '../sekolah/walikelas/gambar/';
      
      move_uploaded_file($source,$folder.$foto);
    }else if($level == "santri"){
      $foto = $_FILES['foto']['name'];
      $source = $_FILES['foto']['tmp_name'];
      $folder = '../sekolah/santri/gambar/';
      
      move_uploaded_file($source,$folder.$foto);
    }

    $sql="INSERT INTO tbl_users (nama,username,password,level,foto) VALUES
		('$nama','$username','$password','$level','$foto')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($kon,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
	echo "<script language='javascript'>
    swal({
        title: 'Good Job!',
        text: 'Data Berhasil Ditambahkan',
        icon: 'success'
    }).then(function() {
        window.location = 'register.php';
    });
    </script>";
  }
else {
	echo "<script language='javascript'>
    swal({
        title: 'Failed!',
        text: 'Data Gagal Ditambahkan',
        icon: 'warning'
    }).then(function() {
        window.location = 'register.php';
    });
    </script>";
}  

    }

?>