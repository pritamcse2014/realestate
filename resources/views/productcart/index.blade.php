<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Product Add To Cart</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .dropdown {
                float: right;
                padding-right: 30px;
            }

            .dropdown .dropdown-menu {
                padding: 20px;
                top: 30px !important;
                width: 350px !important;
                left: 0px !important;
                box-shadow: 0px 5px 30px black;
            }

            .dropdown-menu:before {
                content: " ";
                position: absolute;
                top: -20px;
                right: 50px;
                border: 10px solid transparent;
                border-bottom-color: #fff;
            }

            .fs-8 {
                font-size: 13px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row navbar-light bg-light pt-2 pb-2">
                <div class="col-lg-10">
                    <h3 class="mt-2">Product Add To Cart</h3>
                </div>
                <div class="col-md-2 text-right main-section">
                    <div class="dropdown">
                        <button type="button" class="btn btn-success dropdown-toggle mt-1" data-bs-toggle="dropdown">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                            <span class="badge badge-pill badge-danger">111</span>
                        </button>
                        <div class="dropdown-menu">
                            <div class="row total-header-section">
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span class="badge badge-pill badge-danger">121</span>
                                </div>
                            </div>
                            <div class="row cart-detail pb-3 pt-2">
                                <div class="col-lg-4 col-sm-4 col-4">
                                    <img class="img-fluid" src="{{ asset('product/LPb3VbrG518peEe429SH0s7tOdKCzW.jpg') }}" alt="" srcset="" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p class="mb-0">Name : Earbuds</p>
                                    <span class="fs-8 text-info">Price : $999</span>
                                    <br />
                                    <span class="fs-8 fw-lighter">Quantity : 141</span>
                                </div>
                            </div>
                            <div class="text-center">
                                <a class="btn btn-success" href="">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>