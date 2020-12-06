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
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .content {
                text-align: center;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .full-height {
                height: 100vh;
            }
            
            .title {
                font-size: 40px;
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
        <div class="position-ref full-height">
            <div class="flex-top content">
                <div class="links">
                    <a href="/">Home</a>
                    <a href="produk">Product</a>
                    <a href="order">Order</a>
                </div>
                <div class="title m-b-md">
                    <br>
                    Order
                </div>
            </div>
            <form>
                <div class="form-group col-md-8">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group col-md-8">
                    <label for="harga">Price</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="price" class="form-control">
                    </div>
                </div>
                <div class="form-group col-md-8">
                    <label for="deskripsi">Description</label>
                    <textarea type="textarea" class="form-control"></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="stok">Stock</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group col">
                    <label for="image-input">Image file input</label>
                    <input type="file" class="form-control-file">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>