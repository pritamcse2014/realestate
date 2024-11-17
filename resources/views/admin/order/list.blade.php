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
                    <h6 class="card-title">Search Order</h6>
                    <form method="GET" action="">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your ID</label>
                                    <input class="form-control" type="text" name="id" id="id" value="{{ Request()->id }}" placeholder="Enter Your ID" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Product Name</label>
                                    <input class="form-control" type="text" name="title" id="title" value="{{ Request()->title }}" placeholder="Enter Your Product Name" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Created At</label>
                                    <input class="form-control" type="date" name="created_at" id="created_at" value="{{ Request()->created_at }}" placeholder="Enter Your Created At" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Updated At</label>
                                    <input class="form-control" type="date" name="updated_at" id="updated_at" value="{{ Request()->updated_at }}" placeholder="Enter Your Updated At" />
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary me-1" type="submit">Search</button>
                        <a class="btn btn-danger ms-1" href="{{ url('admin/order') }}">Reset</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br />
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
                                    <th>Action</th>
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
                                    <td>
                                        <a class="dropdown-item" href="{{ url('admin/order/edit/' .$value->id) }}">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-edit-2 icon-sm me-2"
                                            >
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                            <span class="">Edit</span>
                                        </a>
                                        <a class="dropdown-item" href="{{ url('admin/order/delete/' .$value->id) }}" onclick="return confirm('Are you sure you want to delete?')">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-trash icon-sm me-2"
                                            >
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                            <span class="">Delete</span>
                                        </a>
                                    </td>
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