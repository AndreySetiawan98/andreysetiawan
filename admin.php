<?php
// session_start();

// if( !isset($_SESSION["username"]) ) {
//     header("Location: login.php");
//     exit;
// }
include 'koneksi.php';

// Menghitung Jumlah Guru di database
$row = mysqli_query($kon, "SELECT * FROM tbl_guru");
$jumlah_guru = mysqli_num_rows($row);

// Menghitung jumlah santri di database
$a = mysqli_query($kon, "SELECT * FROM tbl_siswa");
$jumlah_santri = mysqli_num_rows($a);

// Menghitung jumlah wali kelas di database
$b = mysqli_query($kon, "SELECT * FROM tbl_wali");
$jumlah_wali = mysqli_num_rows($b);

// Menghitung jumlah mata pelajaran
$c = mysqli_query($kon, "SELECT * FROM tbl_users WHERE level='stafftu'");
$jumlah_staff = mysqli_num_rows($c);


?>


<!DOCTYPE html>
<html lang="en">

<head>

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

        .fa-star-of-life{
            color: red;
        }

        .fa-info{
            color: blue;
        }

        .fa-trash-alt{
            color: red;
        }

        .fa-pencil-alt{
            color: orange;
        }
        
    </style>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <?php
            // Mengambil data untuk profil admin
            $row = mysqli_query($kon, "SELECT * FROM tbl_users WHERE level ='admin'");
            $p = mysqli_fetch_assoc($row);
                {
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
                <a class="nav-link" href="header.php?role=guru">
                    <i class="fas fa-users"></i>
                    <span class="menu">Master Guru</span>
                </a>

            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="header.php?role=walikelas">
                    <i class="fas fa-fw fa-users"></i>
                    <span class="menu">Master Wali Kelas</span>
                </a>
            </li>

           

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="header.php?role=siswa">
                    <i class="fas fa-fw fa-users"></i>
                    <span class="menu">Master Santri</span>
                </a>
            </li>

            <!-- Nav Item - Charts
            <li class="nav-item">
                <a class="nav-link" href="header.php?role=matpel">
                <i class="fas fa-fw fa-users"></i>
                    <span class="menu">Master Mata Pelajaran</span></a>
            </li> -->
            
            <!-- Nav Item - Tahun Ajaran -->
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
                            $p = mysqli_fetch_assoc($row);
                                {
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Guru</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_guru; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Santri</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_santri; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Wali Kelas
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlah_wali; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Jumlah Staff TU</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_staff; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">SELAMAT DATANG DI HALAMAN DASHBOARD ADMIN</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;"
                                            src="gambar/logo.png" alt="#">
                                    </div>
                                    <p> </p>
                                </div>
                            </div>

                        </div> 

                        <div class="col-lg-6 mb-4">
                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">PETUNJUK DAN TAHAPAN PENGISIAN DATA DI SISTEM INFORMASI AKADEMIK </h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-justify">
                                       1. Pada tab master guru admin dapat menambah, menghapus, dan mengedit data guru sesuai dengan keperluan <br>
                                       2. Jika ada field tertentu yang tidak diisi oleh admin maka diisi dengan "-" <br>
                                       3. Pada tab tahun pelajaran admin hanya bisa mengedit tahun pelajaran sesuai dengan keperluan <br>
                                       4. Pada saat admin mengisi field di setiap field terdapat tanda arterisk (<i class="fas fa-star-of-life fa-xs"></i>) tanda tersebut artinya field tidak boleh
                                          kosong dan wajib diisi <br>
                                       5. Pada saat field sudah terisi semua pastikan semua terisi jika field tersebut wajib diisi jika data sudah benar
                                          maka klik <button type="button" class="btn btn-success btn-sm">Simpan Data</button> lalu akan muncul konfirmasi data sukses ditambah <br>
                                       6. Pada saat menghapus admin akan diberi konfirmasi apakah ingin menghapus data tersebut jika sudah yakin maka 
                                          klik icon "<i class="fas fa-trash-alt"></i>" <br>
                                       7. Jika admin ingin melihat detail setiap data maka klik icon "<i class="fas fa-info"></i>" dan jika ingin mengedit maka
                                          klik icon "<i class="fas fa-pencil-alt"></i>"
                                    </div>
                                    <p> </p>
                                </div>
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
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('.menu').css({
                'font-size': '11pt'
            });
        })
    </script>    
</body>

</html>