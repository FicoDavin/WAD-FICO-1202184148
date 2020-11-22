<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION['berhasil-login'])){
        header('location: login.php');
    }
    require 'functions.php';
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE 
      id = '$id'");
      $row = mysqli_fetch_assoc($result);

    if(isset($_POST['btn-edit'])){
        $password = $_POST['password'];
    // cek apakah konfirmasi password benar
    if($_POST['password'] != $_POST['password2']) {
        echo "<script>alert('Password tidak sesuai!')</script>";
    } else {
        if (mysqli_num_rows($result) === 1) {
            // password_verify digunakan untuk mengembalikan hasil password_hash
            if (password_verify($password, $row["password"])) {
                update($_POST,$id);
                $result = mysqli_query($conn, "SELECT * FROM users WHERE 
                id = '$id'");
                $row = mysqli_fetch_assoc($result);
                $_SESSION['navv'] = $_POST['navv'];
            }
        }
        else {
            $_SESSION['failed-update'] = true;
        }
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
    <title>Profile</title>

    <style>

    </style>
</head>

<body>
    <?php if(isset($_SESSION['navv'])): ?>
    <nav class="navbar navbar-expand-lg <?= "navbar-".$_SESSION['navv'] .  " bg-".$_SESSION['navv'] ?>">
        <?php else : ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <?php endif ?>
            <a class="navbar-brand" href="#">WAD Beauty</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto mr-5">
                    <li class="nav-item active">
                        <a class="nav-link" href="cart.php">
                            <img src="gambar/cart-solid-240.png" alt="" height="20" width="20">
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Selamat Datang,
                            <span style="color: lightblue;">
                                <?= $row['nama'] ?>
                            </span>
                        </a>
                        <div class="dropdown-menu ml-3" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <?php if(isset($_SESSION['success-update'])) : ?>
        <div class="alert alert-warning" role="alert">
            Berhasil Diupdate!
        </div>
        <?php unset($_SESSION['success-update']); ?>
        <?php elseif(isset($_SESSION['failed-update'])) : ?>
        <div class="alert alert-warning" role="alert">
            Update Gagal!
        </div>
        <?php unset($_SESSION['failed-update']); ?>
        <?php endif ?>

        <div class="container ">
            <div class="row">
                <div class="col-md-8 mx-auto mt-5">
                    <form method="post" action="">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <div class="pt-2 pl-1">
                                    <input type="hidden" name="email" value="<?= $row['email'] ?>">
                                    <?= $row['email'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="nama" name="nama"
                                    value="<?=$row['nama'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="no_hp" name="no_hp"
                                    value="<?=$row['no_hp'] ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password2" class="col-sm-2 col-form-label">Password Confirm</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password2" name="password2" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password2" class="col-sm-2 col-form-label">Warna Navbar</label>
                            <div class="col-sm-10">
                                <select name="navv" id="navv" class="mt-3">
                                    <option value="light">Light</option>
                                    <option value="dark">Dark</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" id="btn-edit"
                            name="btn-edit">Submit</button>
                        <a class="btn btn-block mt-2" href="index.php" role="button">Cancel</a>
                    </form>
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