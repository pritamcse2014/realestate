@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    @include('_message')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Product Cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Cart List</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Product Cart List</h4>
                        <div class="d-flex align-items-center">
                            <a class="btn btn-primary" href="{{ url('admin/productCart/add') }}">Add Product Cart</a>
                        </div>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>
                                        <img class="wd-100 ht-100 rounded-circle" src="{{ asset('product/' .$value->image) }}" alt="" srcset="" />
                                    </td>
                                    <td>{{ $value->price }}</td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($value->created_at)) }}</td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($value->updated_at)) }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="padding: 20px; float: right;">
                        {!! $getRecord->appends(Request::except('page'))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection