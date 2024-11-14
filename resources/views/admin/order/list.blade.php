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
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div style="padding: 20px; float: right;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection