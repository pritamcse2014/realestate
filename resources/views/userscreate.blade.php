<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Client Side Form Validation</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
        <style type="text/css">
            label.error {
                color: #dc3545;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <h3 class="card-header p-3"><i class="fa fa-star"></i> Client Side Form Validation</h3>
                <div class="card-body">
                    @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>
                    @endsession @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There Were Some Problems With Your Input. <br />
                        <br />
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="">
                        <div class="mb-2">
                            <label class="form-label" for="">Enter Your Name</label>
                            <input class="form-control" type="text" name="name" id="" placeholder="Enter Your Name" />
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="">Enter Your Email</label>
                            <input class="form-control" type="text" name="email" id="" placeholder="Enter Your Email" />
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="">Enter Your Password</label>
                            <input class="form-control" type="password" name="password" id="" placeholder="Enter Your Password" />
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="">Enter Your Confirm Password</label>
                            <input class="form-control" type="password" name="confirm_password" id="" placeholder="Enter Your Confirm Password" />
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-success btn-submit" type="submit"><i class="fa fa-save"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript"></script>
</html>