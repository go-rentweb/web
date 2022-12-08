<?php 
	require ('koneksi.php');
	if (isset($_POST['submit'])) {
		$username = $_POST['txt_username'];
		$password = $_POST['txt_password'];
		$no_hp = $_POST['txt_nohp'];
        $email = $_POST['txt_email'];
        $alamat = $_POST['txt_alamat'];

		$query = "INSERT INTO user (`id_user`, `username`, `password`, `no_hp`, `email`, `alamat`, `role`) VALUES ('', '$username', '$password', '$no_hp', '$email', '$alamat', 'admin')";
		$result = mysqli_query($koneksi, $query);
		header('location:login.php');
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

    <title>Daftar</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-dark">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"><img src="img/mobillogin.jpg" alt="Mobil Login" width="100%" height="100%"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                            </div>
                            <form action="" method="POST" class="register">
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="txt_username" name="txt_username"
                                            placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="txt_email" name="txt_email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="alamat" class="form-control form-control-user" id="txt_alamat" name="txt_alamat"
                                        placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <input type="no_hp" class="form-control form-control-user" id="txt_nohp" name="txt_nohp"
                                        placeholder="Nomor Handphone">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="txt_password" name="txt_password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="input-group">
                                <button name="submit" class="btn">Register</button>
                            </div>
                            </form>
                            
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
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