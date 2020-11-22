<?php 
     if(!isset($_SESSION)) 
     { 
         session_start(); 
     } 
    if(!isset($_SESSION['berhasil-login'])) {
        header('location:login.php');
    }
    require 'functions.php';
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE 
      id = '$id'");
      $row = mysqli_fetch_assoc($result);


    if(isset($_POST['btn-add-to-cart'])) {
        addToCart($_POST, $id);
    }
?>

<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <
    <link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

        <title>WAD Beauty</title>

    <link rel="stylesheet" href="style.css">

    

    <style>
        .bg-custom {
            background: rgb(0, 241, 255);
            background: linear-gradient(81deg, rgba(0, 241, 255, 1) -10%, rgba(243, 255, 143, 1) 71%);
        }
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
                            <span style="color: blue;">
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
        <?php if(isset($_SESSION['add-to-cart'])) : ?>
        <div class="alert alert-warning" role="alert">
            Berhasil Ditambahkan
        </div>
        <?php unset($_SESSION['add-to-cart']); ?>
        <?php endif ?>

        <div class="container ">
            <div class="row">
                <div class="col-md-8 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header bg-custom">
                            <h1 class="card-title text-center mt-3">WAD Beauty</h1>
                            <p class="text-center">Tersedia Skin Care dengan harga murah tapi bukan murahan dan
                                berkualitas
                            </p>
                        </div>
                        <div class="card-body" id="card-body-custom" style="margin: 0; padding:0;">
                            <div class="row" style="margin: 0; padding:0;">
                                <div class="col" style="margin: 0; padding:0;">
                                    <div class="card">
                                        <img src="data:image/jpeg;base64,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"
                                            class="card-img-top" alt="...">
                                        <form action="" method="post">
                                            <input type="hidden" class="form-control" name="nama_barang"
                                                value="Pomadae Clay">
                                            <input type="hidden" class="form-control" name="harga" value="120000">
                                            <div class="card-body">

                                                <h3 class="card-title">Pomade Clay </h3>

                                                <p class="card-text">Penjelasan : Sesuai dengan namanya, clay memang berbahan dasar tanah liat. Hanya saja, tanah liat yang dimaksud di sini bukan tanah liat yang biasa digunakan untuk membuat kerajinan tangan. Bahan tanah liat yang sering digunakan untuk clay rambut adalah Bentonite. Karena berbahan dasar tanah liat, clay ini terlihat seperti pasta dan lengket.</p>

                                                <p class="text-muted">Rp120.000</p>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-block"
                                                    name="btn-add-to-cart">Tambahkan Ke Keranjang</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col" style="margin: 0; padding:0;">
                                    <div class="card">
                                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAsLCxgZGCodHicpMC0uMDUyPy0wKjY2NTAyMzAxODA8MzIvKyYnPTUuOzI0LScmJi0mLS0nPScnJycmMCYnJicBCgcIFRUVGRYVFhoXFxcaHx8XGhgaGh0dGhglHR8dHR0dHR0dJR0dHSUdHR0lLR0lJSUoKCgaHS0zLSYyJSgoJv/AABEIAOEA4QMBEQACEQEDEQH/xAAbAAEAAgMBAQAAAAAAAAAAAAAAAgMBBAUHBv/EAEEQAAIBAgMEBgcECAYDAAAAAAABAgMRBCExBRJBUQZhcYGRoSIyQrHB0eETUnLwFTSCkqKy0vEUFiMzU2JDY8L/xAAaAQEAAwEBAQAAAAAAAAAAAAAAAQIDBAUG/8QAQBEBAAIBAQMGCgkDAwUBAAAAAAECAxEEEjEFITJBUZIGExQiQlJxcqLwFWFigqGxstHSgZHBU+HxFiNDwuIH/9oADAMBAAIRAxEAPwD1wAAAAAAAAAA0cVtCjR/3JxXU3n4a+CL48VrdGNVMmateM6OHW6WYaPq70uxW/mafkzppyZeeO7Vy35SpHDelzanTJ+zBeN/K0feb15K7bMZ5U7KuLiukFapLe3pRytaL3V4Pe8b8joxbDSI0mN5zZNsvM807vuq10jxa0qPvUX/8k+RY/U+KyPLcnrfp/irl0kxv/J/DH+kidix+r+pMbXk9b9P8X2XRbEYqtTlUrT3ot2jlFaav0UtdM75pnm7fSlZ0r956Ww5LWjWz6w5nUAAAAAAAAAAAAAAAAAAAAAAAAHG2rsiniY2eTWklqvo+Xeb7LtE0nWGG07PF45/7uXS6IYZes5y70vck/M2vynfq3YY05NpHHeluroxg17H8cv6jOdvydvw1W8gx9nxWa2L6NYVU5OMGnZvKUtbZZNtE49vyaxz/AKUZNhppPN8VnlqmrZtfnvPX347avK8XPZZCVSNtV4kTkjtTGOex7NsFWwdJf9I+48LaJ86fa9zZ482I+p2CjQAAAAAAAAAAAAAAAAAAAAAAAAAAABwOkkmsHPdvw05XV+6178LXOjYIibxq5tvmYpOjySdSkkrbvke1e1I4brxqVvPHeUyqwfFeRnOSrSMdo9Z6h0KqSlg872U2lrplpwsndZZXuuB5G26b3M9fYtd3nfYGDcAAAAAAAAAAAAAAAAAAAAAAAAAADQ2p+rVPwS/lZbD0o9rPL0Z9jyfZzd79R9FFYmOeHz8zOvFrV36Ra8acytJlQyi6cV6DJiI0lG/MTHO9Y6OfqVL8J4G1dOz3tl6FXcMmwAAAAAAAAAAAAAAAAAAAAAAAAAOftX9Wqfgl/Ky2HpR70KZejPseUbO17j6OvB87PFrV/WLZOKuPg12Zy0WL1GWjoyrPSh6x0b/UqX4fiz5/aenL39k6FXcMmwAAAAAAAAAAAAAAAAAAAAAAAAANDav6tU/BL+VlsPSj2s8vRn2PJtm69x9HXg+etxa9bUtkRj4NZma61eoy0dGVZ6UPWOjf6lS/CfP7V05e9snQq7hk3AAAAAAAAAAAAAAAAAAAAAAAAABz9qfq1T8Ev5WWw9KPazy8J9jyfZzz7j6OnB89Mc7WrvMnIY45mu2ZtNFkX6DLRPNKk154esdG/wBSpfhPA2npy97ZuhV3TJsAAAAAAAAAAAAAAAAAAAAAAAAACjE0lOnKL0aa7mhE9aJjWNHytHopQgrqdTxj/Qdv0nfhpVyTyfXtt8P7Nat0Vw9779Txj/QT9J37K/P3j6Pr22+fuqH0UoffqeMf6CPpG3ZVPkFe23z91KHRSg4236njH+gfSFuyp5DXtfXbLwypUIU43tFWz18kl5HJe+szMumldI0h0SqwAAAAAAAAAAAAAAAAAAAAAAAw2BjeQGN4DRlhpN3u/wB5gReCb4v95gVvZz5+bAq/R9RNWl/HIDrxaS0Ay6iAkpJgSAAAAAAAAAAAAAAAAAAAABGUrAQAykBlAZugM3AXAw2gIuwFUkBQ7pgbNOrfJgXgAAAAAAAAAAAAAAAAADDYFazAygM2AAAIgAFgFgItAQlEChppgb0JXVwJgAAAAAAAAAAAAAAAAEJvIDSxmIdOF1zsedyzt84ce9Eb072nnJiHNW1Z8o+fzPA/6qy+rj+L+S27A9stfd8/mTTwnzT/AOOvxfyJ0jrQe3rez52+DOinhNbrxV73+zObx1KZbdm9IpefyK5fCPLPRrWPbrKPGQoe16j9ryXyuceTlraJ9PT3a1T4yFLx037b8Tmvt+eeN79434UutJ8X4mM579d7d6xaVMp3G/btlWZVuZMTPapMo/4iS4vxNqZrxwtbvKzL6XYtdzptSbdnxfC3X3n0/g/mm1J3p1mtvSaYZ1h3qJ6zReAAAAAAAAAAAAAAAAAVzA4W2XJqMYrm/wA8OJ4nhFgtkilK1tbn1RaZjg+arSUfXkuy/wCfI5ti8E81+eeb3ef/AG/Fz5c9a9O1auPiNo2yge3s3gRWOe0/F/H93HflbH1b1nMWPqp3bv5Lyt7z08Xgns9eNfn72rOeV9eFVv6drpWjuL9n5tnbTkTBXhX9P8URylaeqrUqbbxT9v8Ahj8jaOT8UeimNvvPW1JbXxP334L5DyHH6rSu127Uo9IsbD1ar/dj8YspOwY59FrTa7K59JMW/Wmn+xFfypHPk5HwW5px1XjPMox6Q11ru+H1Zx5vBbZ7cK7vup8b9To4fpDB5VE11pX97T8Lnm7T4HRxx5O8aw+76M4ulOUlCpGV1eyupK3OMkpcdbNaZ5leT+SsmCbRbhPpNcFZiZfYUXmdzdtAAAAAAAAAAAAAAAAAFU9QPkttzqzrxo03ql458dcln4nqcm4qRjnJeOjZ4XLG0ZJy1xY501r887kVcPgqT3ZOpN8XGyV+q+fvOql81vOrFaR6O85MlNnpO7abXt6VquJjaVJS/wBJyat7SzT5ZZeXidOCb6T4yK191z7Ruax4ubTH2mjWw04etFrtTXvRat4nhKZravGLQ2K+yJxoQq5+k2t3deVu/j2IwptUTea+r6W87Z2WYpFu30XHVCUnaKb7Ff3Gt5iOMq44meENZ023YidNNWlNddFTw8mt5J2XG2XyKzaNdNW9Ynjo6mC2fSng8RVkvShubru8rys8k913607HLtGSYyViOjZ1YI82ZfP1aE45tNX5pq/Zf4G0WieEo0nrfTbB2dhK+IoU3vy3lPfi/RSaT3d1xal1vN8NLtHJtWS8Rafd3XRjrE6NnoliKUcfTjCNrwlF+le79a+enq6fK7rtlZmmsz2JxzGukPYaTzPMbtwAAAAAAAAAAAAAAAAAqlqB8vRqJ4+fY0u1JfU9TLXTZq+9rb8Xz+LJrtt/d0r/AGh8dOm1kz26zExrD5ydYmYni7eyKNqc6qcVJWSlJ2Ub6vPK70XXlxZ5fKl/PpSd7TjatfSe5yJTSl7xNYtwrNujVs0JTk3DEVqMoSTTX2iunwayWnblrwOfaKViInHjyRaPsu3Z72nWMuXHek/aq0sXtKusFSkpy3nKSb52bsa4dlpOW8TXmrWP8K59svGGlotz2mWvh/taVGCniPsk1vKKg27N6y3Unnwu3l2NEZN21rbuLf8AWtvfpaYbWrWu9l3PVjd/N03STr4WrvRnJuac4q28kna/WtH13Rz6zFctdNI5vNt6Lq4zjnXenn86r5vE9JsVTrytJbsZNbllu7qeml8+d738DppsFNyObn3ekxnbbb8x1avoMVTWDWLlSUf/ABSSayTbfDTJ+klonbgjjprfxcT9cOy3mxaY9rg7F2jWxn2tDES34ulKWaV4yjazVkud+p2tbO++14YppavmzvKbNmm2sS6myPW2f+Ct7kYbR/5fej829Op5/sWt9njqcv8A2Jd0nu/E7s8a45j7LDHPnPfY5PvPFdbdAAAAAAAAAAAAAAAAAKnqB5lXxDVeU1rvN+f5yPqMOKJxRWeG7D4TPmmM1r1nn35/N0J7Rw9R71Sn6XOLtfu/u+s5sex5ac1Mnm/aduTb8OTzsuHz/SmlukhHaMYye7BbjW643efXfW/X/ctfYLTWJnJ59ba1t/j2KY+VaVtMRj0x2rpanrfX7WpXqYXdahTld8XLTry17y+PFm1jeyV0+zVOTadn0mKY7b0+tboqcPjoKn9lVjvRvdZ2cX1dvLtIz7HM236Tuz+pfZNviKbmSu9X0fsoyxtCpGKrwk5RSipRlbeS0vdcOa+hn5LeszuWrpbn850V23HaI8ZW2tebzW/gdowq18PTjDcUJSyTvk0+/tb1d2c20bLNK5Jm29vaOzZdsra2OsV001aVbHYKNaU5UHvqTyU/QbT1a4X1as12l6bNlmkRGTmtX7y19pxxaZmvPFnLr7clUhXU16VXd0eUVB6Z+HnxLRsMRNN2eijy3WLax0mhsfaCw1SUnG+9CUNeds8+VtDTa8E3iIifS1TsmeKzOqxbelBYZwj6VBSWbylvWvp1Jrz4GNtj1m+s9N0V2vmjRr4mEK1SNTDUpQz3neV4717+i7XsuSXLJFJybkTF7b3z1ta+dMTEPb287nkupvAAAAAAAAAAAAAAAAAFDdsyuSdImR8TLCU2s4/nuPleTfDLacXNM79ey37ufauSsWTnmvP61fNaFXZa9mXj9Le4+l2L/wDQcU82XHavu87ys3g1HoZO81Fs6utLePzsj2cHhXsluGXd97zXLk8Hsn2ZYngcTFXlT71KL9zZ6GPlbDbhkq57cg5I4Q0nrZp96f8AbzNo2zHPpVZTyXmj0LfdUSS0yJnaaetXvVK7Jl/0r92zZwlCupqdJO60dvmreJjmz4piYtaunz6rs2XZc8TE1x2ifd/dbLo9jJvecNc23KK+PwMrcoYqxpvN68n5ZnWa/pUy6PzXr1Ka/au/BL4nLl5fw16/iq2rydMcbVqwtj4detOUvwxt77nnbR4V446P8v2htTZqRxtqLZ9Nv0IfHzd/Kx4+1+FN55o5ve/aP3b009GroRwsrcjwtr5WtfjbX7Mc1V5x3npS9AoO9OL/AOq9x9ZsmTepWfWrDqjg6pskAAAAAAAAAAAAAAAAas03FpcmY7VWZpaI4zWd0cKWzqq0XmvofGZfBzPHCtbe7b99Gm9DXlhKi9l+BhfkfPHHFb8/yNVLw9T7sv3X8in0fljjiyd2ytpVPD1Puy8H8i0bFk/07d2yqDwlR+xL91/I3x7JtHVXJ8Ssi2XVfseS+J0V2HauqMne/wB1dJWx2LXfC37XybOrHyZtU8Z0963/ACpOLVNdGZPOU0vF++x04+RMnpXr8U/sr5LC5dGIr234W+LJy8g29HJX71f/AKWjZYjiktg203e+/wAUzjy+D+fqyV+KP/VrGKscIJbKq8LeJzz4O5/s2+8sqeyavJeJMeD+fsr3lZh3MPTcacYy1SsfUcnYrVxVrbjWqYdOGh0pTAAAAAAAAAAAAAAAwwKogTAAAAGGBgAAAARYGAMMCuQG1T0QEwAAAAAAAAAAAAAAMS0AriBo18VJScYpZK7bbSSd7aJvOz7Os1xY+bWeudK7rmz7RMTMRFfNrrbe/Dqk/SNOyu13XaWds2lzuru2j5MeS25+b/H1/kjy6nNrPd5/q/NGe0aaT1dup5+luu2Wdnk7dRMbNafn6tfyRfb6xrpvd37W7zeyWI7SgleWWcuF7KMnG7ssr2vn18mJ2adeb6vxjUjbqxGs83H8LaayziMW4TUbKz4t2vnaydrXWtm1fJLqjHiiYmdU5tpmtojTmnrt7dN2Ore6/rRp45SXXvbr1ss2tUmr5X3ey9rom+zzH9tfwVptkT3tJ/vPXpx+ytpY6nKLkr2S3tGsuDzSydnZlbYZidP6NMe10mJmOqNej6Pai69RJSklm4rV3V5Jcrcb9uWeo3I4RPzB422kTMV0nT8ZSWNp2bvwvpqua+fY9GhOK0dSY2uk68/1/wDDCxtN2av4PnbPLnl56ZjxM/P90RtdJ00/T9e7z/1Z/wAZC189baPN56ZdT7PAeKlPlVf8JQxMZu0eV9Hp3rq011K2xzHFbHni06R6uqcirVsUfVAtAAAAAAAAAAAAAAAxLQCuIGtVwqk97NPS6dsuX504FqZNI06vtMc2zxadfOifs20VPZ1LJ20VtdVrnx676vPmX8otz/Wp5FTWJiOj886UsBBrj7XH70t5+auiI2i0fPZG7+SZ2Okxp7fxtvfmhLZtNu9nx483d+eeWl3Ymu0W0VtsNddfb+PPP4rq2EhN3d/HWzvn2fMrXJMcGmXZ6255+farhgYRd1fW+vG+vw61bkiZ2i08fYpGx0jh7fvdq2jhYQ0+6o90b295F8szx9aZ+9K+PZ614R6MR92FawcbWvK2WW88rNNeFuN+Wg8bPHzUeTRpprbT3mFgIJWz8dLO6t2PnflpkT46eKPJK6afPazHCQStn49e972ROWU02Wsa/Ppb35oSwMG753ve/jz7Ws75ditMZ5jmROyVmdetfCio6ckvD+5W9pni1x44jgSKrr6OgFwAAAAAAAAAAAAAAEZaAQiBxMRThOrP7RbySilF+qr3u+V3kt53drJau+kTMRGjOYiZ51H6OorJ06bd1moLK80ms1yeT1eels58fbtsjxcdjFPBUHiJQ+yhZKPBXu97O1tHa3rXXo+ir3LTktuxO9Yika6aOXPblejOVKEFPdnKKvN7zWUuKtaN1G7d9Fm3nrGzVmImZ3d6vq/0ZzmmJmIjX7yn/NeJyvRjnLdvv8euyby4vhnfNWL+RU5/+50a69FXym3N5vxLV0nxLT/0Y3UnC2+07rjmkrcLtrOytmR5HSOOT0deinym3VVB9KsQkm6MbZe3pd2V8uPLXnYtj2GkzpGT4VMu2WrWZmvCvrOn+nKlr7i4cXx7rdfZYt9HU1037dfo9n9Xn/TWTdi3iq9Xpdv9CW3aq1prn635/Nyacn45nSMlu6ZOWctY1nFXvH6bq3t9mtbetx/K4dfIn6Px/wCpbun01l108TXvK59IKkdYLx+RfHyTS3DJ8LPP4QXppvYt37yzDbelUqRjuLN21+hG1ckxWk23uitsXhBN71puaa/afQSPJe+voaAXAAAAAAAAAAAAAAARnoBCIHKrqrCpKUYOSkl6rjdNX1UpQTT6ne98lky8c8aa6KTrE6qFXrNelRq3vF60tItP/lXjZdi0LeLjqtX4v4o1nssm6s97e+wq3ve96XJJr/d0dtNNHqk03I9avxfxN+ey3z95zX0Yp1ZOtVc4zk22ozyV8racrKTWV78DWu3TWIrG7pX1qs52WJnWeJ/k/Dfeq8/X48OHDRMn6Qt2V7p5JXtt3mV0Qw60nV5+vx05d1+RP0hbsr3TySO23eF0RwyVt6pw9pcNOGiu8hHKF4nXSvdVvsVZiYnebv8Al+jzn4/QvPK1+yvdcX/T+Ltyd5l7AovjPx+gjlW8cIr3UzyBi65yd4/QVK1rz8foR9J3110r3U/QWPTTeyd5F7AovVz8foTHK2SOEV7qLeD+KeM5O8nR2LRhJSW9dZ6/Qrm5TvaJid3Sy+z8h4sdovXe1r9p05HE9NdQ0faBeAAAAAAAAAAAAAABGegEIgalepVTe7G6y+vHjw5Z34JgjWqXs48PF+5LVceHNXB9tV+55/Tjw489UBKVWpdrd8+r55d65AULEVrepwXHjllp2558ON0BP/ETbcd3Pt7Opa3bWfAAq1V6Q5e1234ez5+8IvEVddx+PH+3Vrys2BvgRYGADAqkBdQ0AvAAAAAAAAAAAAAAAjPQCtOwGrVw8pS3lK11bT6p5clbr43CKwk08pu2fn38NcgJLD1LevxT05LTXjr48wEcPNe3na17duetsrrXl15BCWFnwm1ly8823npr8bhbTozTu531ytz7+HzA2QAACLAwAYFUgLqGgF4AAAAAAAAAAAAAAEZ6AalWe6r9aXi0ua/PMmBdGa0vn+ff8yAVaDV95W53XzsBj7eD9paX1WnPXzAOvC9t5eK+fd2gSnJLN/n86+IGWAAAAIsDABgVSAuoaPtAvAAAAAAAAAAAAAAAjPQDUqw3lbrT8HcmJGXQi2pcV8L/AD1XC60bTgRjhYpWV+HLVaPTXtyfIAsKlezefZre99OedtNctLBiGDglZX1vrfi3xu9X29YEXgoarJ5vhxVuK/OfMDbVkrIBdALoDF0BFsBcDDYFcmBfQ0AvAAAAAAAAAAAAAAAAa04tAUpgSTAXANgYbAXAxcBcBcBcDNwMNgSjBsDcSsgMgAAAAAAAAAAAAAAAAGjLUDCAyAAAYAwAAyBgABJAbsdAMgAAAAAAAAP/2Q=="
                                            class="card-img-top" alt="...">
                                        <form action="" method="post">
                                            <input type="hidden" class="form-control" name="nama_barang"
                                                value="Cetaphil">
                                            <input type="hidden" class="form-control" name="harga" value="250000">
                                            <div class="card-body">
                                                <h3 class="card-title">Cethapil</h3>

                                                <p class="card-text">Penjelasan : Cetaphil Gentle Skin Cleanser diformulasikan sebagai pembersih wajah pengganti sabun untuk kulit kering, normal, kombinasi, dan berjerawat. Cetaphil Gentle Skin Cleanser ditemukan sejak tahun 1947 di Amerika dan hingga saat ini masih menggunakan formula yang sama dengan 70 tahun yang lalu.</p>

                                                <p class="text-muted">Rp250.000</p>

                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-block"
                                                    name="btn-add-to-cart">Tambahkan Ke Keranjang</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col" style="margin: 0; padding:0;">
                                    <div class="card">

                                        <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//87/MTA-1464333/selsun_selsun-blue-shampoo--120-ml-_full02.jpg"
                                            class="card-img-top" alt="...">

                                        <form action="" method="post">

                                            <input type="hidden" class="form-control" name="nama_barang"
                                                value="Selsun Shampoo">
                                            <input type="hidden" class="form-control" name="harga" value="55000">
                                            <div class="card-body">
                                                <h3 class="card-title">Selsun Shampoo</h3>

                                                <p class="card-text">Penjelasan : 
                                                Selsun adalah shampoo yang digunakan untuk menghilangkan gatal-gatal dan pengelupasan kulit kepala dan memulihkan partikel kering dan bersisik yang sering disebut sebagai ketombe (radang kulit kepala karena sekresi minyak berlebihan).
                                                </p>
                                                <p class="text-muted">Rp55.000</p>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-block"
                                                    name="btn-add-to-cart">Tambahkan Ke Keranjang</button>
                                            </div>
                                        </form>
                                    </div>
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