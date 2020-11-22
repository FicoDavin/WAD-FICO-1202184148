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
   
    $result2 = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$id'");  
    $no = 1;
    $total = 0;

    if(isset($_POST['btn-delete'])){
        $id_barang = $_POST['id_barang'];
        mysqli_query($conn, "DELETE  FROM cart WHERE id = '$id_barang'");
        $_SESSION['deleted'] = true;
        $result2 = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$id'");  
        $no = 1;
        $total = 0;
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
    <title>Cart</title>

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
                        <a class="nav-link" href="#">
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
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <?php if(isset($_SESSION['deleted'])) : ?>
        <div class="alert alert-warning" role="alert">
            Berhasil Dihapus!
        </div>
        <?php unset($_SESSION['deleted']); ?>
        <?php endif ?>

        <div class="container ">
            <div class="row">
                <div class="col-md-8 mx-auto mt-5">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row2 = mysqli_fetch_assoc($result2)) : ?>
                            <tr>
                                <td>
                                    <?php 
                                echo $no;
                                $no = $no + 1; 
                                ?>
                                </td>
                                <td><?= $row2['nama_barang']; ?></td>
                                <td>Rp.<?= $row2['harga']; ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="id_barang" value="<?= $row2['id']; ?>">
                                        <button type="submit" name="btn-delete" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                                <?php $total = $total + $row2['harga']; ?>
                            </tr>
                            <?php endwhile ?>
                            <tr>
                                <th colspan="2">Total</th>
                                <th>Rp.<?= $total; ?></th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
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