<?php
ob_start();
include 'koneksi.php';

$id = $_GET['id'];
$siswa = mysqli_query($kon, "SELECT * FROM tbl_siswa WHERE id='$id'") or die(mysql_error());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <style>
        .judul{
            font-size: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <div class="row">
        <h1 class="judul">Data Santri</h1>
        <table border="0" cellpadding="15" cellspacing="3" width="120%">
            <tbody>
                <?php foreach( $siswa as $row ) : ?>    
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $row['nama']; ?></td>

                        <td>Nama Ayah</td>
                        <td>:</td>
                        <td><?= $row['nama_ayah']; ?></td>
                    </tr>
                    <tr>
                        <td>NIS</td>
                        <td>:</td>
                        <td><?= $row['nis']; ?></td>

                        <td>Nama Ibu</td>
                        <td>:</td>
                        <td><?= $row['nama_ibu']; ?></td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td><?= $row['nisn']; ?></td>

                        <td>No-Telp</td>
                        <td>:</td>
                        <td><?= $row['no_telp']; ?></td>
                    </tr>
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td><?= $row['id_tahun']; ?></td>

                        <td>Pekerjaan Ayah</td>
                        <td>:</td>
                        <td><?= $row['pkrj_ayah']; ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?= $row['id_kelas']; ?></td>

                        <td>Pekerjaan Ibu</td>
                        <td>:</td>
                        <td><?= $row['pkrj_ibu']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $row['alamat']; ?></td>

                        <td>Nama Wali</td>
                        <td>:</td>
                        <td><?= $row['nama_wali']; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?= $row['jkl']; ?></td>

                        <td>Pekerjaan Wali</td>
                        <td>:</td>
                        <td><?= $row['pkrj_wali']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><?= $row['tgl_lahir']; ?></td>

                        <td>No-Telp Wali</td>
                        <td>:</td>
                        <td><?= $row['no_telp_wali']; ?></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td><?= $row['agama']; ?></td>

                        <td>Alamat Wali</td>
                        <td>:</td>
                        <td><?= $row['alamat_wali']; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><button type="button" id="button" class="btn btn-xl btn-success" disabled><?= $row['status']; ?></td>

                        <td>Foto</td>
                        <td>:</td>
                        <td><img src="gambar/<?= $row['foto'] ?>" width="100" height="100"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>  
        </table>
    </div>
    </body>
</html>

<?php 

	//Meload library mPDF
	require 'vendor/autoload.php';

	//Membuat inisialisasi objek mPDF
	$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4','margin_top' => 12, 'margin_bottom' => 25, 'margin_left' => 25, 'margin_right' => 25]);
    $mpdf->SetWatermarkImage('gambar/logo.png','0.1','F',array(30,45));
    $mpdf->showWatermarkImage = true;

	//Memasukkan output yang diambil dari output buffering ke variabel html
	$html = ob_get_contents();

	//Menghapus isi output buffering
	ob_end_clean();

	$mpdf->WriteHTML(utf8_encode($html));

	//Membuat output file
	$content = $mpdf->Output("Data Santri.pdf", "I");

?>







