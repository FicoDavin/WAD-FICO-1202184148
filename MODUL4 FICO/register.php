<?php 
    require 'functions.php';

    if(isset($_POST['btn-register'])) {
       
        if(registrasi($_POST) > 0) {
            $_SESSION['success-regist'] = true; 
        } else {
            echo mysqli_error($conn);
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Registration</title>

    <style>
        body,
        html {
            height: 100%;
        }

        body {
            background-color: lightblue;
        }

        .card {
            box-shadow: 10px 10px 25px grey !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">WAD Beauty</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Register <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <?php if(isset($_SESSION['success-regist'])) : ?>
    <div class="alert alert-warning" role="alert">
        Berhasil Registrasi!
    </div>
    <?php session_destroy(); ?>
    <?php endif ?>
    <div class="container ">
        <div class="row">
            <div class="col-md-4 mx-auto mt-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <h3 class="card-title text-center mt-3">Registrasi</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="POST">

                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required
                                            placeholder="Masukkan nama lengkap">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email
                                        </label>
                                        <input type="email" class="form-control" id="email" name="email" required
                                            placeholder="Masukkan alamat e-mail">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No. Handphone
                                        </label>
                                        <input type="number" class="form-control" id="no_hp" name="no_hp" required
                                            placeholder="Masukkan Nomor Handphone">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Kata Sandi</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required placeholder="Buat Kata Sandi">
                                    </div>
                                    <div class="form-group">
                                        <label for="password2">Konfirmasi Kata Sandi</label>
                                        <input type="password" class="form-control" id="password2" name="password2"
                                            required placeholder="Konfirmasi Kata Sandi">
                                    </div>
                                    <div class="pt-2 text-center">
                                        <button type="submit" class="btn btn-primary "
                                            name="btn-register">Daftar</button>
                                    </div>
                                    <div class="pt-3 text-center">
                                        <p class="d-inline">Sudah punya akun?
                                            <a href="login.php">Login!</a>
                                        </p>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery -->
    <script src="libraries/jQuery/jquery.js"></script>
    <!-- popper -->
    <script src="libraries/popper/popper.js"></script>
    <!-- bootstrap -->
    <script src="libraries/bootstrap/js/bootstrap.js"></script>

</body>

</html>