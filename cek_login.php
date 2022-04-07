<?php
session_start();
include 'koneksi.php'?>
<script src="../sekolah/admin/js/sweetalert.min.js"></script>;

<?php
if(isset($_POST['login'] )) {
        
    $username = $_POST['username'];
    $password = crypt($_POST['password'],'buku');

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($kon,"SELECT * FROM tbl_users WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		echo "<script language='javascript'>
		swal({
			title: 'Good Job!',
			text: 'Anda Berhasil Login',
			icon: 'success'
		}).then(function() {
			window.location = '../sekolah/admin/admin.php';
		});
		</script>";

	// cek jika user login sebagai guru
	}else if($data['level']=="guru"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "guru";
		// alihkan ke halaman dashboard guru
		echo "<script language='javascript'>
			swal({
				title: 'Good Job!',
				text: 'Anda Berhasil Login',
				icon: 'success'
			}).then(function() {
				window.location = '../sekolah/guru/guru.php';
			});
			</script>";
 
	// cek jika user login sebagai santri
	}else if($data['level']=="santri"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "santri";
		// alihkan ke halaman dashboard santri
		echo "<script language='javascript'>
			swal({
				title: 'Good Job!',
				text: 'Anda Berhasil Login',
				icon: 'success'
			}).then(function() {
				window.location = '../sekolah/santri/santri.php';
			});
			</script>";

	// cek jika user login sebagai wali kelas
	}else if($data['level']=="walikelas"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "walikelas";
		// alihkan ke halaman dashboard santri
		echo "<script language='javascript'>
			swal({
				title: 'Good Job!',
				text: 'Anda Berhasil Login',
				icon: 'success'
			}).then(function() {
				window.location = '../sekolah/walikelas/walikelas.php';
			});
			</script>";

  	}else if($data['level']=="stafftu"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "stafftu";
		// alihkan ke halaman dashboard stafftu
		echo "<script language='javascript'>
			swal({
				title: 'Good Job!',
				text: 'Anda Berhasil Login',
				icon: 'success'
			}).then(function() {
				window.location = '../sekolah/staff/staff.php';
			});
			</script>";
	
	}
	}else{
		echo "<script language='javascript'>
				swal({
					title: 'Bad!',
					text: 'Username dan Password Anda Salah',
					icon: 'error'
				}).then(function() {
					window.location = '../sekolah/login.php';
				});
				</script>";
	
			}
}
?>