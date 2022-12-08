<?php 
require('koneksi.php');
session_start();

if(isset($_POST['submit'])){
    $username = $_POST['txt_username'];
    $password = $_POST['txt_pass'];

    if(!empty(trim($username)) && !empty(trim($password))){
        $query = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($koneksi,$query);
        $num = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array($result)){
            $id_user = $row['id_user'];
            $email = $row['user_email'];
            $password =$row['user_password'];
            $username = $row['user_username'];
            $role = $row['role'];
        }

        if($num != 0){
            if($userVal==$email && $passVal==$pass){
                // header('Location: dashboard.php?user_fullname='.urlencode($username));
                $_SESSION['id_user'] = $id;
                $_SESSION['name'] = $username;
                $_SESSION['level'] = $lvl;
                header('Location:admin/dashboard.php');
            }else{
                $error = 'user atau password salah!!';
                header('Location:login.php');
            }
        }else{
            $error = 'user tidak ditemukan!!';
            header('Location:login.php');
        }
    }else{
        $error = 'Data tidak boleh kosong!!';
        echo $error;
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

    <title>Masuk</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block "><img src="img/mobillogin.jpg" alt="Gambar Login" width="100%" height="100%"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="user_email" name="user_email" aria-describedby="emailHelp"
                                                placeholder="Masukkan email anda">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="user_password" name="user_password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <a  type="submit" id="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Buat akun</a>
                                    </div>
                                </div>
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