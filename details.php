<?php
    $conn = mysqli_connect("localhost", "root", "", "modul3_crud");
    if(isset($_POST['hapus'])){
        echo "Armia ganteng!";die;
        mysqli_query($conn, "DELETE from events where id = '$id'");
        echo "<script>
            alert('Event Berhasil didelete!');
            </script>";
        header ("Location : home.php");
    }
    $id = $_POST['id'];
    // Ngecek apakah ada event atau tidak
    $result = mysqli_query($conn, "SELECT * FROM events WHERE id = '$id'");
    $events = mysqli_fetch_assoc($result);

    

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
    <title>Detail</title>

    <style>
        label {
            font-weight: bold;
        }
    </style>
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
                    <a class="nav-link active" href="buat-event.php" id="buat-event">Buat Event</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3 text-center">
            <div class="col">
                <h2 class="judul">
                    Detail Event!
                </h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <img src="gambar/<?= $events['gambar'] ?>" alt="Gambar" class="img-card-top" height="300px">
                    <div class="card-body">
                        <p class="card-text">
                            <h2 class="text-center"><?= $events['name'] ?></h2>
                            <label for="deskripsi-detail">Deskripsi</label>
                            <p id="deskripsi-detail"><?= $events['deskripsi'] ?></p>
                            <div class="row">
                                <div class="col">
                                    <label>Informasi Event</label>
                                    <table>
                                        <tr>
                                            <td>
                                                <box-icon name='calendar' color='#ff9900'></box-icon>
                                            </td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td><?= $events['tanggal'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <box-icon name='map' type="solid" color='#ff9900'></box-icon>
                                            </td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td><?= $events['mulai'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <box-icon name='time' color='#ff9900'></box-icon>
                                            </td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td><?= $events['berakhir'] ?></td>
                                        </tr>
                                    </table>

                                </div>
                                <div class="col">
                                    <label for="benefit-detail">Benefit : </label>
                                    <ul>

                                        <li><?= $events['benefit'] ?></li>

                                    </ul>
                                </div>
                            </div>
                            <br>
                            <label for="kategori-detail">Kategori : </label>
                            <p style="display: inline-block;"><?= $events['kategori'] ?></p>
                            <br>
                            <label for="kategori-detail">HTM : </label>
                            <p style="display: inline-block;"><?= $events['harga'] ?></p>

                        </p>
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal">Edit</button>
                        <button type="submit" class="btn btn-danger" name="hapus">Delete</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade modal-edit" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="width: 100%;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Modal Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="<?= $events['name'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"
                                                    placeholder="<?= $events['deskripsi'] ?>"></textarea>
                                            </div>
                                            <label for="deskripsi">Upload Gambar </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar" name="gambar"
                                                    placeholder="<?= $events['gambar'] ?>">
                                                <label class="custom-file-label" for="gambar">Choose file</label>
                                            </div>
                                            <label for="kategori1">Kategori</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kategori"
                                                    id="kategori1" value="Online">
                                                <label class="form-check-label" for="kategori1">Online</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kategori"
                                                    id="kategori2" value="Offline">
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
                                                <input type="date" class="form-control" id="date" name="tanggal"
                                                    value="<?= $events['tanggal'] ?>">
                                            </div>
                                            <div class="form-row form-group">
                                                <div class="col">
                                                    <label for="mulai">Jam Mulai</label>
                                                    <input type="time" class="form-control" id="mulai" name="mulai"
                                                        value="<?= $events['mulai'] ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="berakhir">Jam Berakhir</label>
                                                    <input type="time" class="form-control" id="berakhir"
                                                        name="berakhir" value="<?= $events['berakhir'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tempat">Tempat</label>
                                                <input type="text" class="form-control" id="tempat" name="tempat"
                                                    placeholder="
                                                    <?= $events['tempat'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <input placeholder="
                                                    <?= $events['harga'] ?>" type="text" class="form-control"
                                                    id="harga" name="harga">
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="checkbox[]"
                                                    id="checkbox1" value="Snacks">
                                                <label class="form-check-label" for="checkbox1">Snacks</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="checkbox2"
                                                    value="Sertifikat" name="checkbox[]">
                                                <label class="form-check-label" for="checkbox2">Sertifikat</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="checkbox3"
                                                    value="Souvenir" name="checkbox[]">
                                                <label class="form-check-label" for="checkbox3">Souvenir</label>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="mt-2 text-right">
                        <input type="hidden" value="
                        <?= $events['id'] ?>" name="id_update">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="btn-update-event" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
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