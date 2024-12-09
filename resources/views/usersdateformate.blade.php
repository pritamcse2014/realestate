<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Users Date Format</title>
        <!-- Include Bootstrap and DataTables CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" />
        <!-- Include jQuery and DataTables JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <h3 class="card-header p-3">Users Date Format</h3>
                <div class="card-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $(".data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('usersDateFormate') }}",
                    type: "GET",
                },
                columns: [
                    { data: "id", name: "id" },
                    { data: "name", name: "name" },
                    { data: "email", name: "email" },
                    { data: "created_at", name: "created_at" },
                    { data: "updated_at", name: "updated_at" },
                    { data: "status", name: "status" },
                    {
                        data: "action",
                        name: "action",
                        orderable: false,
                        searchable: false,
                    },
                ],
                error: function (xhr, error, thrown) {
                    console.error("Ajax error:", xhr.responseText);
                },
            });
        });
    </script>
</html>