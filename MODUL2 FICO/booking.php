<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <link href="style.css" rel="stylesheet" type="text/css" />


    <nav class=" navbar-expand-lg navbar-light " style="background-color:#3461eb">

        <div class="container">


            <div class="row">
                <div class="col-sm-5">

                    <a class="nav-link" href="home.php"> <button style="background : #fff; border-radius : 10px; border : 1px solid #009291">back</button> </a>

                </div>
                <div class="col-sm">

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link">Home</a>
                            </li>
                            <li class="nav-item active">
                                <a class="test nav-link">Booking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">My Booking</a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="col-sm">
                </div>

            </div>
        </div>
    </nav>

</head>

<body>



    <div class="container mt-5 ">
        <div class="row">
            <div class="col-sm bg-white">

                <form action="">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Check-in</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="tanggal">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Duration</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="durasi">
                    </div>

                    <div>
                        <p>Room Type</p>
                        <select class="custom-select" name="pilihan">
                            <option value="Standard" <?php if ($_GET['judul'] === "Standard") { echo "selected"; } ?>>Standard</option>
                            <option value="Superior" <?php if ($_GET['judul'] === "Superior") { echo "selected"; } ?>>Superior</option>
                            <option value="Luxury" <?php if ($_GET['judul'] === "Luxury") { echo "selected"; } ?>>Luxury</option>
                        </select>
                    </div>
                    <br>
                    <p>Add Service</p>
                    <p id="ukuran">$ 10/Service</p>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1"name="service" value="20">
                        <label class="form-check-label" for="exampleCheck1" value ="Room Servide">Room Service</label>
                        <br>
                        <input type="checkbox" class="form-check-input" id="exampleCheck1"name="makan" value="20">
                        <label class="form-check-label" for="exampleCheck1">Breakfast</label>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone Number</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="hp">
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <a class="nav-link" href="mybooking.php"> <input type="submit" class="btn btn-primary btn-lg btn-block" value = "booking"> </a>
                        </div>
                    </div>


                </form>
            </div>

            <!-- gambar -->

            <div class=" col-sm pt-5 pb-5 ">

                <style>
                    .embed-container {
                        position: relative;
                        padding-bottom: 56.25%;
                        height: 0;
                        overflow: hidden;
                        max-width: 100%;
                    }

                    .embed-container iframe,
                    .embed-container object,
                    .embed-container embed {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                    }
                </style>

                <div class='embed-container'>

                    <?php if ($_GET["judul"] == "Standard") : ?>
                        <img id="coba" src="data:image/jpeg;base64,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" width="500" height="400" />

                    <?php elseif ($_GET["judul"] == "Superior") : ?>
                        <img id="coba" src="kamar 2.jpg" width="500" height="400" />

                    <?php elseif ($_GET["judul"] == "Luxury") : ?>
                        <img id="coba" src="data:image/jpeg;base64,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" width="500" height="400" />

                    <?php endif; ?>


                </div>
            </div>
        </div>

    </div>
    </div>


</body>





</html>