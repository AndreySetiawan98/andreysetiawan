<?php
include 'koneksi.php';
$siswa = mysqli_query($kon, "SELECT id, foto, nama, nis, nisn  FROM tbl_siswa");
$tahun = mysqli_query($kon, "SELECT * FROM tbl_tahun");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Master Santri</title>
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

        .star{
            color: red;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <?php
            // Mengambil data untuk profil admin
            $row = mysqli_query($kon, "SELECT * FROM tbl_users WHERE level='admin'");
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
            </li>   -->
            
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Master Santri</h6>
                            <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i> Tambah Santri
                            </button> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>NIS</th>
                                            <th>NISN</th>
                                            <th>AKSI</th>   
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach( $siswa as $row ) : ?>
                                        <tr align="center">
                                            <td><?= $row['id'] ?></td>
                                            <td><?= "<img src='gambar/$row[foto]' width='100' height='100'"?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['nis'] ?></td>
                                            <td><?= $row['nisn'] ?></td>
                                            <td>
                                                <!-- <a class="edit" title="edit" href="editsiswa.php?id=<?= $row['id']; ?>"><i class="fas fa-pencil-alt"></i></a>| -->
                                                <a class="detail" title="detail" href="detailsiswa.php?id=<?= $row['id']; ?>"><i class="fas fa-info"></i></a>
                                                <!-- <a class="delete" title="Hapus" href="#modalDelete" onclick="$('#modalDelete #formDelete').attr('action','hapussiswa.php?id=<?= $row['id']; ?>')" 
                                                data-toggle="modal"><i class="fas fa-trash-alt"></i></a> -->
                                            </td>
                                        </tr>
                                    <?php $i++ ?>
                                    <?php endforeach; ?>
                                    </tbody>
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

<!-- Tambah Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Santri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
      <form action="tambahsiswa.php" method="post" enctype="multipart/form-data">
      <?php foreach($tahun as $row) : ?>
      <div class="modal-body">
        <span class="star">* Field Wajib Diisi</span><br><br>
      <div class="form-group">
            <label class="control-label" for="nama">Nama Santri</label>
            <span class="star">*</span>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="idtahun">Tahun Masuk</label>
            <input type="text" class="form-control" id="idtahun" name="id_tahun" value="<?= $row['id_tahun']; ?>" 
            readonly>
        </div>
        <div class="form-group">
            <label for="idkelas">Kelas</label>
            <span class="star">*</span>
            <select class="custom-select" id="idkelas" name="idkelas" autocomplete="off" required>
                <option value="">Pilih..</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nis">NIS</label>
            <span class="star">*</span>
            <input type="text" class="form-control" id="nis" name="nis" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="nisn">NISN</label>
            <span class="star">*</span>
            <input type="text" class="form-control" id="nisn" name="nisn" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <span class="star">*</span>
            <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis Kelamin</label>
            <span class="star">*</span>
            <select class="custom-select" id="jenis" name="jenis" autocomplete="off" required>
                <option value="">Pilih..</option>
                <option value="Laki-Laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tgllahir">Tanggal Lahir</label>
            <span class="star">*</span>
            <input type="date" class="form-control" id="tgllahir" name="tgllahir" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="agama">Agama</label>
            <span class="star">*</span>
            <select class="custom-select" id="agama" name="agama" autocomplete="off" required>
                <option value="">Pilih..</option>
                <option value="Islam">Islam</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status Santri</label>
            <span class="star">*</span>
            <select class="custom-select" id="status" name="status" autocomplete="off" required>
                <option value="">Pilih..</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
        <div class="form-group">
            <label for="namaayah">Nama Ayah</label>
            <span class="star">*</span>
            <input type="text" class="form-control" id="namaayah" name="namaayah" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="namaibu">Nama Ibu</label>
            <span class="star">*</span>
            <input type="text" class="form-control" id="namaibu" name="namaibu" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="notlp">No-Telp</label>
            <span class="star">*</span>
            <input type="text" class="form-control" id="notlp" name="notlp" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="krjayah">Pekerjaan Ayah</label>
            <span class="star">*</span>
            <input type="text" class="form-control" id="krjayah" name="krjayah" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="krjibu">Pekerjaan Ibu</label>
            <span class="star">*</span>
            <input type="text" class="form-control" id="krjibu" name="krjibu" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="namawali">Nama Wali</label><br>
            <span class="star">Jika tidak ada maka isi dengan '-'</span>
            <input type="text" class="form-control" id="namawali" name="namawali" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="krjwali">Pekerjaan Wali</label><br>
            <span class="star">Jika tidak ada maka isi dengan '-'</span>
            <input type="text" class="form-control" id="krjwali" name="krjwali" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="nowali">No-Telp Wali</label><br>
            <span class="star">Jika tidak ada maka isi dengan '-'</span>
            <input type="" class="form-control" id="nowali" name="nowali" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="alamatwali">Alamat Wali</label><br>
            <span class="star">Jika tidak ada maka isi dengan '-'</span>
            <input type="text" class="form-control" id="alamatwali" name="alamatwali" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <span class="star">*</span>
            <input type="file" class="form-control" id="foto" name="gambar" autocomplete="off" required>
        </div>
        <div class="modal-footer">
        <button type="reset" class="btn btn-danger" name="reset">Reset</button>
        <button type="submit" class="btn btn-success" name="tambah">Simpan Data</button>
      </div>
        </div>
        <?php endforeach; ?>
      </form>
    </div>
  </div>
</div>

<!-- Modal hapus data -->

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <form action="" id="formDelete" method="post">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
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
        $(document).ready(function() {
           var table = $('#example').DataTable( {
                order: [[ 0, 'asc' ]],
                lengthMenu: [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
                columnDefs: [
                    { orderable: false, targets: 1 },
                    { orderable: false, targets: 2 },
                    { orderable: false, targets: 3 },
                    { orderable: false, targets: 4 },
                    { orderable: false, targets: 5 },
                    { targets: -1, visible: true}
                    ],
                // buttons: [
                // {
                //     extend: 'print',
                //     title: 'Master Santri',
                //     exportOptions: {
                //     columns: ':visible',
                //     stripHtml : false,
                //     columns: [0, 1, 2, 3, 4]  
                //     },
                //     customize: function ( win ) {
                //     $(win.document.body)
                //         .css( 'font-size', '18pt' )
                //         .prepend(
                //             '<img src="../gambar/logo.png" style="position:absolute; top:0; left:0;" />'
                //         );
 
                //     $(win.document.body).find( 'table' )
                //         .addClass( 'compact' )
                //         .css( 'font-size', 'inherit' );
                //     }
                // },
                //     'colvis'],
                    
             } );

             table.buttons().container()
                .appendTo( '#example_wrapper .col-md-6:eq(0)' );       
        });
    </script>

    <script>
        $(document).ready(function(){
            $('.menu').css({
                'font-size': '11pt'
            });
        })
    </script>
    
</body>
</html>