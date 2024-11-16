@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    @include('_message')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order List</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Order List</h4>
                        <div class="d-flex align-items-center">
                            <a class="btn btn-primary" href="{{ url('admin/order/add') }}">Add Order</a>
                        </div>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Product Quantity</th>
                                    <th>Product Color</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $value)
                                <tr class="table-info text-dark">
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->product_quantity }}</td>
                                    <td>
                                        @foreach ($value->getColor as $colorValue) {{ $colorValue->name . ',' }} @endforeach
                                    </td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($value->created_at)) }}</td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($value->updated_at)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="padding: 20px; float: right;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection