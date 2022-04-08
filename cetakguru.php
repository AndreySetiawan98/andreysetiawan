<?php
ob_start();
include 'koneksi.php';

$id = $_GET['id'];
$a = mysqli_query($kon, "SELECT * FROM tbl_guru WHERE id='$id'") or die(mysql_error());

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
        <h1 class="judul">Data Guru</h1>
        <table border="0" cellpadding="15" cellspacing="3" width="120%">
            <tbody>
                <?php foreach( $a as $row ) : ?>    
                <tr>
                    <td>Nama Guru</td>
                    <td>:</td>
                    <td><?= $row['nama']; ?></td>

                    <td>NIP</td>
                    <td>:</td>
                    <td><?= $row['nip']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $row['alamat']?></td>

                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $row['jkl']; ?></td>
                </tr>
                <tr>    
                    <td>Agama</td>
                    <td>:</td>
                    <td><?= $row['agama']; ?></td>

                    <td>Mata Pelajaran</td>
                    <td>:</td>
                    <td><?= $row['matpel']; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?= $row['status']; ?></td>

                    <td>Foto</td>
                    <td>:</td>
                    <td><img src="gambar/<?= $row['foto']; ?>"></td>
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
	$content = $mpdf->Output("Data Guru.pdf", "I");

?>







