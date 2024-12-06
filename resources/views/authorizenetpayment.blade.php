<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Authorize Net Payment</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" crossorigin="anonymous" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card mt-5">
                        <h3 class="card-header p-3">Authorize Net Payment</h3>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="col-form-label text-md-right" for="">Enter Your Card Number</label>
                                        <input class="form-control" type="text" name="" id="" placeholder="Enter Your Card Number" autocomplete="off" maxlength="16" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label text-md-right" for="">Enter Your Expiration Date</label>
                                        <input class="form-control" type="date" name="" id="" placeholder="Enter Your Expiration Date" autocomplete="off" maxlength="16" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label text-md-right" for="">Enter Your CVV Number</label>
                                        <input class="form-control" type="text" name="" id="" placeholder="Enter Your CVV Number" autocomplete="off" maxlength="16" required />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-success" type="submit">Payment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>