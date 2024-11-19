<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>PDF Color</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    </head>
    <body>
        <h1>{{ $title }}</h1>
        <p>{{ $date }}</p>
        <h2>https://pritamcse2014.github.io/pritamkumarkundu/</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
            </tr>
            @foreach ($getRecord as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>