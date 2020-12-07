<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

     
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <style>
            html, body {
                color: #636b6f;
                background-color: #fff;
                font-weight: 200;
                font-family: 'Nunito', sans-serif;
                height: 100vh;
                margin: 0;
            }
            
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .full-height {
                height: 100vh;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }

            .position-ref {
                position: relative;
            }
            
            .links > a {
                color: #636b6f;
                padding: 0 20px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 35px;
            }
        </style>
    </head>
    <body>
        <div class="flex-top position-ref full-height">
            <div class="content">
                <div class="links">
                    <a href="/">Home</a>
                    <a href="produk">Product</a>
                    <a href="order">Order</a>
                </div>
                <div class="title m-b-md">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_i4LyCQagNPp7onHqG_9cJ6BbBv0Xnv2uKA&usqp=CAU">
                </div>
            </div>
        </div>
    </body>
</html>