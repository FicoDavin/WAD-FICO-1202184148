<?php 
    
    if(isset($_POST['btn-buat-event'])) {
        // Menggabungkan benefit
        $benefit = implode(",", $_POST['checkbox']);
        // Ngurusin gambar
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = $_FILES['gambar']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
 
        if(!in_array($ext,$ekstensi) ) {
            header("location:buat-event.php?alert=Ekstensi File Salah!");
        }else{
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/'.$filename);
        }

        // Masukkan data ke dalam variable
        $name = $_POST['name'];
        $deskripsi = $_POST['deskripsi'];
        $kategori = $_POST['kategori'];
        $tanggal = $_POST['tanggal'];
        $mulai = $_POST['mulai'];
        $berakhir = $_POST['berakhir'];
        $tempat = $_POST['tempat'];
        $harga = $_POST['harga'];

        // Masukkan ke database
        mysqli_query($conn, "INSERT INTO events VALUES (NULL, '$name', '$deskripsi', '$filename', '$kategori', '$tanggal', '$mulai', '$berakhir', '$tempat', '$harga', '$benefit')");

        if(mysqli_affected_rows($conn) > 0) {
            header("Location: home.php");
            echo "<script>
            alert('Event Berhasil ditambahkan!');
            </script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Home</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">EAD Events</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="home.php" id="homee">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#" id="buat-event">Buat Event</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col">
                <h2 class="judul">
                    Buat Event
                </h2>
            </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row mt-2">
                <div class="col">
                    <div class="card" id="card">
                        <div class="card-header bg-danger">
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Choose file</label>
                            </div>
                            <label for="kategori1">Kategori</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="kategori1"
                                    value="Online">
                                <label class="form-check-label" for="kategori1">Online</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="kategori2"
                                    value="Offline">
                                <label class="form-check-label" for="kategori2">Offline</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" id="card2">
                        <div class="card-header bg-primary">
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="date">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="tanggal">
                            </div>
                            <div class="form-row form-group">
                                <div class="col">
                                    <label for="mulai">Jam Mulai</label>
                                    <input type="time" class="form-control" id="mulai" name="mulai">
                                </div>
                                <div class="col">
                                    <label for="berakhir">Jam Berakhir</label>
                                    <input type="time" class="form-control" id="berakhir" name="berakhir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tempat">Tempat</label>
                                <input type="text" class="form-control" id="tempat" name="tempat">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga">
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox1"
                                    value="Snacks">
                                <label class="form-check-label" for="checkbox1">Snacks</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="checkbox2" value="Sertifikat"
                                    name="checkbox[]">
                                <label class="form-check-label" for="checkbox2">Sertifikat</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="checkbox3" value="Souvenir"
                                    name="checkbox[]">
                                <label class="form-check-label" for="checkbox3">Souvenir</label>
                            </div>
                            <div class="mt-2 text-right">
                                <button type="submit" name="btn-buat-event" class="btn btn-primary">Submit</button>
                                <a class="btn btn-danger" href="home.php" role="button">Cancel</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>




    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script>
        $('.custom-file-input').on('change', function () {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
</body>

</html>