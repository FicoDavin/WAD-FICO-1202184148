 <?php 
    
    require 'functions.php';

    if(isset($_POST['btn-login'])) {    
    login($_POST);
        // cek cookie
    
    
    
      
      $email = $_POST['email'];
      $result = mysqli_query($conn, "SELECT * FROM users WHERE 
      email = '$email'");
      $row = mysqli_fetch_assoc($result);
      $_SESSION['id'] = $row['id'];
      $_SESSION['berhasil-login'] = true;
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
     <title>Login</title>

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
                     <a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item active">
                     <a class="nav-link" href="register.php">Register <span class="sr-only">(current)</span></a>
                 </li>
             </ul>
         </div>
     </nav>
     <?php if(isset($_SESSION['success-login'])) : ?>
     <div class="alert alert-warning" role="alert">
         Berhasil Login!
     </div>
     <?php unset($_SESSION['success-login']); 
     ?>
     <?php elseif(isset($_SESSION['failed-login'])) : ?>
     <div class="alert alert-warning" role="alert">
         Gagal Login!
     </div>
     <?php session_destroy(); ?>
     <?php endif ?>
     <div class="container ">
         <div class="row">
             <div class="col-md-5 mx-auto mt-5">
                 <div class="card">
                     <div class="card-header bg-white">
                         <h3 class="card-title text-center mt-3">Login</h3>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-12">
                                 <form action="" method="POST">
                                     <?php if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) : ?>
                                     <div class="form-group">
                                         <label for="email">Email
                                         </label>
                                         <input type="email" class="form-control" id="email" name="email" required
                                             value="<?= $row['email']; ?>">
                                     </div>

                                     <div class="form-group">
                                         <label for="password">Kata Sandi</label>
                                         <input type="password" class="form-control" id="password" name="password"
                                             required value="<?= $row['password']; ?>">
                                     </div>

                                     <?php else : ?>
                                     <div class="form-group">
                                         <label for="email">Email
                                         </label>
                                         <input type="email" class="form-control" id="email" name="email" required
                                             placeholder="Masukkan alamat e-mail">
                                     </div>

                                     <div class="form-group">
                                         <label for="password">Kata Sandi</label>
                                         <input type="password" class="form-control" id="password" name="password"
                                             required placeholder="Buat Kata Sandi">
                                     </div>
                                     <?php endif ?>

                                     <div class="form-group form-check">
                                         <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                         <label class="form-check-label" for="remember">Remember me</label>
                                     </div>
                                     <div class="pt-2 text-center">
                                         <button type="submit" class="btn btn-primary " name="btn-login">Login</button>
                                     </div>
                                     <div class="pt-3 text-center">
                                         <p class="d-inline">Belum punya akun?
                                             <a href="register.php">Registrasi!</a>
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