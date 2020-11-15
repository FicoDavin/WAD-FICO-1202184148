<?php 
   $conn = mysqli_connect("localhost", "root", "", );
    $result = mysqli_query($conn, "SELECT * FROM events ");
    $events = mysqli_fetch_all($result=NULL);
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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buat-event.php" id="buat-event">Buat Event</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3 text-center">
            <div class="col">
                <h2 class="judul">
                    WELCOME TO EAD EVENTS!
                </h2>
            </div>
        </div>

        <div class="row mt-3 align-content-center justify-content-center">
            <?php if($events == NULL) : ?>
            <p>No events Found</p>
            <?php else : ?>
            <?php foreach($events as $event) : ?>
            <div class="col mb-2">
                <div class="card" style="width: 18rem; height:30rem;">
                    <img src=" gambar/<?= $event['3'] ?>" class="card-img-top" alt="..." height="200">
                    <div class="card-body" style="height: 250px;">
                        <h5 class="card-title"><?= $event['1'] ?></h5>
                        <p class="card-text">
                            <table>
                                <tr>
                                    <td>
                                        <box-icon name='calendar' color='#ff9900'></box-icon>
                                    </td>
                                    <td>
                                        <span class=" ml-3 "><?= $event['5'] ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <box-icon name='map' type='solid' color='#ff9900'></box-icon>
                                    </td>
                                    <td>
                                        <span class=" ml-3 "><?= $event['8'] ?></span>
                                    </td>
                                </tr>
                            </table>
                            <p>Kategori : Event <?= $event['4'] ?></p>
                        </p>
                    </div>
                    <div class="card-footer text-right">
                        <form action="details.php" method="POST">
                            <input type="hidden" value="<?= $event['0'] ?>" name="id">
                            <button type="submit" name="btn-submit-details" class="btn btn-primary">Details</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <?php endif ?>
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

</body>

</html>