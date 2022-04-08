<?php
include "koneksi.php";

$id = $_GET['id'];
$wali = mysqli_query($kon, "SELECT * FROM tbl_wali WHERE id='$id'") or die(mysql_error());

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Data Wali</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style type="text/css">
        .nama{
            font-family: times new roman;
            color: yellow ;
            margin-top: 12px;
            text-align: center;
        }
        .table td a{
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
		    min-width: 24px;
        }

        .table td a.detail{
            text-align:center;
        }

        .table td a.edit{
            color: #FFC107;
        }

        .table td a.delete{
            color: #E34724;
        }
        
    </style>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="vendor/datatables/buttons.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <?php
            // Mengambil data untuk profil admin
            $row = mysqli_query($kon, "SELECT * FROM tbl_users WHERE level ='admin'");
            while($p = mysqli_fetch_array($row)){

             ?>
            <!-- Sidebar - Brand -->
            <div class="d-flex align-items-center justify-content-center">
                <img class="img-profile rounded-circle" width="100" height="100" style="margin-top:10px;"
                src="gambar/<?= $p['foto']; ?>">
            </div>
                <h5 class="nama"><?= $p['nama']; ?></h5>

                <?php
            }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="header.php?role=admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="menu">Dashboard</span></a>
            </li>      

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="header.php?role=guru" data-toggle="#" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users"></i>
                    <span class="menu">Master Guru</span>
                </a>

            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="header.php?role=walikelas" data-toggle="#" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-users"></i>
                    <span class="menu">Master Wali Kelas</span>
                </a>
            </li>

           

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="header.php?role=siswa" data-toggle="#" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-users"></i>
                    <span class="menu">Master Siswa</span>
                </a>
            </li>

           <!-- Nav Item - Charts
           <li class="nav-item">
                <a class="nav-link" href="header.php?role=matpel">
                <i class="fas fa-fw fa-users"></i>
                    <span class="menu">Master Mata Pelajaran</span></a>
            </li> -->
            
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="header.php?role=tahun">
                <i class="far fa-fw fa-calendar-alt"></i>
                    <span class="menu">Tahun Pelajaran</span></a>
            </li>   

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    <?php
                            // Mengambil data untuk profil admin
                            $row = mysqli_query($kon, "SELECT * FROM tbl_users WHERE level='admin'");
                            while($p = mysqli_fetch_array($row)){

                            ?>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $p['nama']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="gambar/<?= $p['foto']; ?>">
                            </a>
                                <?php
                            }
                            ?>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <?php 
                         $row = mysqli_query($kon, "SELECT * FROM tbl_wali WHERE id='$id'");
                         while($p = mysqli_fetch_assoc($row)){
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Data wali</h6>
                            <a class="btn btn-success float-right" href="cetakwali.php?id=<?= $p['id']; ?>" role="button"><i class="far fa-file-pdf"></i> Cetak</a>
                        </div>
                        <?php
                         }
                    ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table border="0" id="example" width="50%" cellpadding="8">
                                    <form action="ubahguru.php" method="POST" enctype="multipart/form-data">
                                    <?php foreach( $wali as $row ) : ?>
                                    <tbody>
                                        <input type="hidden" name="id" value="<?= $row['id']; ?>" required>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><?= $row['nama_wali']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>NIP</td>
                                            <td>:</td>
                                            <td><?= $row['nip']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?= $row['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td><?= $row['jkl']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:</td>
                                            <td><?= $row['agama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Wali Kelas</td>
                                            <td>:</td>
                                            <td><?= $row['walikelas']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Kerja</td>
                                            <td>:</td>
                                            <td><button type="button" id="button" class="btn btn-xl btn-success" disabled><?= $row['status']; ?></button></td>
                                        </tr>
                                        <tr>
                                            <td>Foto</td>
                                            <td>:</td>
                                            <td><img src="gambar/<?= $row['foto'] ?>" width="100"></td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-primary" formaction="header.php?role=walikelas" type="submit" name="kembali">KEMBALI</button></td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; ?>
                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Pondok Pesantren Dar El Amir 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">Apakah Anda Yakin Ingin Logout ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="jquery/jquery-3.5.1.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/datatables/dataTables.buttons.min.js"></script>
    <script src="vendor/datatables/buttons.bootstrap4.min.js"></script>
    <script src="vendor/datatables/jszip.min.js"></script>
    <script src="vendor/datatables/pdfmake.min.js"></script>
    <script src="vendor/datatables/vfs_fonts.js"></script>
    <script src="vendor/datatables/buttons.html5.min.js"></script>
    <script src="vendor/datatables/buttons.print.min.js"></script>
    <script src="vendor/datatables/buttons.colVis.min.js"></script>
    <script src="vendor/datatables/dataTables.editor.min.js"></script>
    

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    
    <script>
        $(document).ready(function(){
            $('.menu').css({
                'font-size': '11pt'
            });
        })
    </script> 
</body>
</html>

