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
                    @session('success')
                    <div class="alert alert-success" role="alert">{{ $value }}</div>
                    @endsession
                    <form action="{{ route('addMore') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h5>Create Category</h5>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input class="form-control" type="text" name="name" value="{{ request()->old('name') }}" id="" placeholder="Name" />
                            @error("name")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
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
                                @php $key = 0; @endphp @if (request()->old('stock')) @foreach (request()->old('stock') as $key => $stock)
                                <tr>
                                    <td>
                                        <input class="form-control" type="number" name="stock[{{$key}}][quantity]" value="{{ $stock['quantity'] ?? '' }}" id="" placeholder="Quantity" />
                                        @error("stock.{$key}.quantity")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" name="stock[{{$key}}][price]" value="{{ $stock['price'] ?? '' }}" id="" placeholder="Price" />
                                        @error("stock.{$key}.price")
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach @else
                                <tr>
                                    <td>
                                        <input class="form-control" type="number" name="stock[0][quantity]" id="" placeholder="Quantity" />
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" name="stock[0][price]" id="" placeholder="Price" />
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endif
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
                                <th>Total Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->stock->sum('quantity') }}</td>
                                <td>{{ $product->stock->sum('price') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100%">No Record Found....</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $products->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function () {
            i = "{{ $key }}";
            $(".btn-add-more").click(function (event) {
                event.preventDefault();
                i++;
                $(".table-add-more").append(
                    '<tr><td><input class="form-control" type="number" name="stock[' +
                        i +
                        '][quantity]" placeholder="Quantity" /></td><td><input class="form-control" type="number" name="stock[' +
                        i +
                        '][price]" placeholder="Price" /></td><td><button class="btn btn-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i></button></td></tr>'
                );
            });
            $(document).on("click", ".btn-add-more-rm", function () {
                $(this).parents("tr").remove();
            });
        });
    </script>
</html>