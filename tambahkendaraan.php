<?php 


	include "koneksi.php";

    function upload_file()
        {
            $namaFile   = $_FILES['gambar']['name'];
            $ukuranFile = $_FILES['gambar']['size'];
            $error      = $_FILES['gambar']['error'];
            $tmpName    = $_FILES['gambar']['tmp_name'];

            // check file yang diupload
            $extensifileValid = ['jpg', 'jpeg', 'png','jfif'];
            $extensifile      = explode('.', $namaFile);
            $extensifile      = strtolower(end($extensifile));

            // check format/extensi file
            if (!in_array($extensifile, $extensifileValid)) {
                // pesan gagal
                echo "<script>
                        alert('Format File Tidak Valid');
                        document.location.href = 'tambahkendaraan.php';
                    </script>";
                die();
            }

            // check ukuran file 2 MB
            if ($ukuranFile > 2048000) {
                // pesan gagal
                echo "<script>
                        alert('Ukuran File Max 2 MB');
                        document.location.href = 'tambah.php';
                    </script>";
                die();
            }

            // generate nama file baru
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $extensifile;

            // pindahkan ke folder local
            move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
            return $namaFileBaru;
        }
        if (isset($_POST['submit'])) {
        function tambah_produk($post)
        {

            $nama_kendaraan = $post['nama'];
            $plat_nomor = $post['platnomor'];
            $jenis_kendaraan = $post['jeniskendaraan'];
            $jumlah_roda = $post['jumlahroda'];
            $gambar = upload_file();
            

            $query = "INSERT INTO `data_unit` (`id_unit`, `nama`, `gambar`, `platnomor`, `jeniskendaraan`, `jumlahroda`) VALUES ('', '$nama_kendaraan', '$plat_nomor', '$jenis_kendaraan', '$jumlah_roda', '$gambar')";

            mysqli_query($koneksi ,$query);

            return mysqli_affected_rows($koneksi);
        }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Go-Rent</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php" >
                <div class="sidebar-brand-icon rotate-n-15">
                <img src="img/image.png" width="50%" heigth="50%">
                </div>
                <div class="sidebar-brand-text mx-3">Go-Rent</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            
            
            <!-- Nav Item - Tables -->
            
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
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
                    
                    <p class="h1" style="text-align: Center;">Tambahkan Kendaraan</p>

                  <!-- Begin Page Content -->
                  <div class="mb-3 row" >
                    <form action="tambahkendaraan.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="namaUnit">Nama Unit</label>
                          <input type="namaUnit" class="form-control" id="namakendaraan" name="namakendaraan"  placeholder="Masukkan nama unit kendaraan">
                        </div>
                        <div class="form-group">
                            <label for="Gambar">Gambar</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar">
                        </div>
                        <div class="form-group">
                          <label for="platNomor">Plat Nomor</label>
                          <input type="platNomor" class="form-control" id="platnomor" name="platnomor" placeholder="Masukkan plat nomor kendaraan">
                        </div>
                        <div class="form-group">
                            <label for="jenisKendaraan">Jenis Kendaraan</label>
                            <input type="jenisKendaraa" class="form-control" id="jeniskendaraan" name="jeniskendaraan" placeholder="Masukkan jenis kendaraan">
                        </div>
                        <div class="form-group">
                          <label for="jumlahRoda">Jumlah Roda</label>
                          <input type="jumlahRoda" class="form-control" id="umlahroda" name="jumlahroda" placeholder="Masukkan jumlah roda kendaraan">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <a href="datakendaraan.php"><button type="button" class="btn btn-secondary">Kembali</button></a>
                      </form>
                  </div>
                    
                </div>
                <!-- /.container-fluid -->
               
            </div>
            <!-- End of Main Content -->

          
      

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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
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

</body>

</html>