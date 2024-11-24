@extends('admin.admin_dashboard') @section('style')
<style type="text/css">
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        /* display: none; */
    }
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 24px;
    }
    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }
    input:checked + .slider {
        background-color: #2196f3;
    }
    input:checked + .slider:before {
        transform: translateX(26px);
    }
</style>
@endsection @section('admin')
<div class="page-content">
    @include('_message')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Color</a></li>
            <li class="breadcrumb-item active" aria-current="page">Color List</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Search Blog</h6>
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
                                    <label class="form-label">Enter Your Color Name</label>
                                    <input class="form-control" type="text" name="name" id="name" value="{{ Request()->name }}" placeholder="Enter Your Color Name" />
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
                        <a class="btn btn-danger ms-1" href="{{ url('admin/color') }}">Reset</a>
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
                        <h4 class="card-title">Color List</h4>
                        <div class="d-flex align-items-center">
                            <a class="btn btn-warning" href="{{ url('admin/pdfColor') }}">PDF Color</a>
                            &nbsp; &nbsp; &nbsp;
                            <a class="btn btn-success" href="{{ url('admin/pdf') }}">PDF</a>
                            &nbsp; &nbsp; &nbsp;
                            <a class="btn btn-primary" href="{{ url('admin/color/add') }}">Add Color</a>
                        </div>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $value)

                                <tr class="table-info text-dark">
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" class="statusCheckbox" data-id="{{ $value->id }}" {{ $value->status ? 'checked' : '' }}>
                                            <span class="slider"></span>
                                        </label>
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                    <td>
                                        <a class="dropdown-item" href="{{ url('admin/color/edit/' .$value->id) }}">
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
                                        <a class="dropdown-item" href="{{ url('admin/color/pdf/' .$value->id) }}">
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
                                                class="feather feather-file-text icon-sm me-2"
                                            >
                                                <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2h12c1.1 0 1.99-.9 1.99-2V8l-6-6z"></path>
                                                <path d="M14 2v6h6"></path>
                                            </svg>
                                            <span class="">PDF</span>
                                        </a>
                                        <a class="dropdown-item" href="{{ url('admin/color/delete/' .$value->id) }}" onclick="return confirm('Are you sure you want to delete?')">
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