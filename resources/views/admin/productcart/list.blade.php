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
                    <h6 class="card-title">Search Product Cart</h6>
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
                                    <label class="form-label">Enter Your Name</label>
                                    <input class="form-control" type="text" name="name" id="name" value="{{ Request()->name }}" placeholder="Enter Your Name" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Description</label>
                                    <input class="form-control" type="text" name="description" id="description" value="{{ Request()->description }}" placeholder="Enter Your Description" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Price</label>
                                    <input class="form-control" type="number" name="price" id="price" value="{{ Request()->price }}" placeholder="Enter Your Price" />
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
                        <a class="btn btn-danger ms-1" href="{{ url('admin/productCart') }}">Reset</a>
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
                                @php $totalPrice = 0; @endphp @forelse ($getRecord as $value) @php $totalPrice = $totalPrice + $value->price; @endphp
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>
                                        <img class="wd-100 ht-100 rounded-circle" src="{{ asset('product/' .$value->image) }}" alt="" srcset="" />
                                    </td>
                                    <td>{{ number_format($value->price, 2) }}</td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($value->created_at)) }}</td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($value->updated_at)) }}</td>
                                    <td>
                                        <a class="dropdown-item" href="{{ url('admin/productCart/edit/' .$value->id) }}">
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
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%">No Record Found....</td>
                                </tr>
                                @endforelse @if (!empty($totalPrice))
                                <tr>
                                    <th colspan="4">Total Amount</th>
                                    <td>{{ number_format($totalPrice, 2) }}</td>
                                    <th colspan="4"></th>
                                </tr>
                                @endif
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