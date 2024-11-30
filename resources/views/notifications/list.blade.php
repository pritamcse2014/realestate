<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Notification</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h4>Laravel Toastr Notification</h4>
                </div>
                <div class="card-body text-center">
                    <a class="btn btn-success" href="{{ route('notification', 'success') }}">Success</a>
                    <a class="btn btn-info" href="{{ route('notification', 'info') }}">Info</a>
                    <a class="btn btn-warning" href="{{ route('notification', 'warning') }}">Warning</a>
                    <a class="btn btn-danger" href="{{ route('notification', 'danger') }}">Danger</a>
                </div>
            </div>
        </div>
        @include('notifications.notifications')
    </body>
</html>