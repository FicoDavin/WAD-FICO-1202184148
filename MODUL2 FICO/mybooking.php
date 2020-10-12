<!DOCTYPE html>
<html>




<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>mybooking</title>
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
                                <a class="test nav-link">booking</a>
                            </li>
                            <li class="nav-item active">
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

    <?php
    error_reporting(0);
    $name = $_GET['name'];
    $check = $_GET['check-in'];
    $duration = $_GET['duration'];
    $type = $_GET['type'];
    $phone = $_GET['phone'];
    $service_count = count($_GET['add']);

    $checkout =  date('m/d/y', strtotime($check . ' + ' . $_GET['duration'] . 'days'));

    $totalPrice = $service_count * 10;
    ?>





    <table class="table mt-5 mr-5 ml-3">
        <thead>
            <tr>
                <th scope="col">booking Number</th>
                <th scope="col">Name</th>
                <th scope="col">Check-in</th>
                <th scope="col">Check-out</th>
                <th scope="col">Room Type</th>
                <th scope="col">Phone Number</th>
                <th scope="col">service</th>
                <th scope="col">Total Price</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td scope="row">1</td>
                <td><?php echo $_POST("nama"); ?></td>
                <td><?php echo $date_input; ?> </td>
                <td><?php echo $check; ?></td>
                <td><?= $_POST('pilihan'); ?></td>
                <td><?php echo $_POST("hp"); ?></td>
                <td>
                    <ul>
                        <li><?php if ($_POST["service"]) {
                                echo "Room sevice";
                            }  ?> </li>
                        <li><?php if ($_POST["makan"]) {
                                echo "BreakFast";
                            }  ?> </li>
                    </ul>
                </td>

                <td> $<?php echo $total; ?> </td>
            </tr>
        </tbody>
    </table>


</body>

</html>