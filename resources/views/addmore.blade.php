<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Add More Fields</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <h3 class="card-header p-3">Add More Fields</h3>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h5>Create Category</h5>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input class="form-control" type="text" name="" id="" placeholder="Name" />
                        </div>
                        <table class="table table-bordered mt-2 table-add-more">
                            <thead>
                                <tr>
                                    <th colspan="2">Add Stock</th>
                                    <th>
                                        <button class="btn btn-primary btn-sm btn-add-more"><i class="fa fa-plus"></i> Add More</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input class="form-control" type="number" name="" id="" placeholder="Quantity" />
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" name="" id="" placeholder="Price" />
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-control" type="number" name="" id="" placeholder="Quantity" />
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" name="" id="" placeholder="Price" />
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Submit</button>
                        </div>
                    </form>
                    <h5 class="mt-5">Category List</h5>
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Total Price</th>
                                <th>Total Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>