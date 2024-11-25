@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    @include('_message')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Transactions</a></li>
            <li class="breadcrumb-item active" aria-current="page">Transactions List</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Search Transactions</h6>
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
                                    <label class="form-label">Enter Your User Name</label>
                                    <input class="form-control" type="text" name="user_id" id="user_id" value="{{ Request()->user_id }}" placeholder="Enter Your User Name" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Order Number</label>
                                    <input class="form-control" type="text" name="order_number" id="order_number" value="{{ Request()->order_number }}" placeholder="Enter Your Order Number" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Transaction ID</label>
                                    <input class="form-control" type="text" name="transaction_id" id="transaction_id" value="{{ Request()->transaction_id }}" placeholder="Enter Your Transaction ID" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Amount</label>
                                    <input class="form-control" type="number" name="amount" id="amount" value="{{ Request()->amount }}" placeholder="Enter Your Amount" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Select Your Payment Status</label>
                                    <select class="form-control" name="is_payment" id="">
                                        <option value="">Select Payment Status</option>
                                        <option {{ (Request()->is_payment == '0') ? 'selected' : '' }} value="0">Pending</option>
                                        <option {{ (Request()->is_payment == '1') ? 'selected' : '' }} value="1">Completed</option>
                                    </select>
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
                        <a class="btn btn-danger ms-1" href="{{ url('admin/transactions') }}">Reset</a>
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
                        <h4 class="card-title">Transactions List</h4>
                        <div class="d-flex align-items-center"></div>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Order Number</th>
                                    <th>Transaction Id</th>
                                    <th>Amount</th>
                                    <th>Payment Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalPrice = 0; @endphp @foreach ($getRecord as $value) @php $totalPrice = $totalPrice + $value->amount; @endphp
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->order_number }}</td>
                                    <td>{{ $value->transaction_id }}</td>
                                    <td>{{ $value->amount }}</td>
                                    <td>
                                        @if ($value->is_payment == 1)
                                        <span class="badge bg-success">Completed</span>
                                        @else
                                        <span class="badge bg-primary">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($value->updated_at)) }}</td>
                                    <td>
                                        <a class="dropdown-item" href="{{ url('admin/transactions/delete/' .$value->id) }}" onclick="return confirm('Are you sure you want to delete?')">
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
                                @endforeach @if (!empty($totalPrice))
                                <tr>
                                    <th colspan="4">Total Amount</th>
                                    <td>{{ number_format($totalPrice, 2) }}</td>
                                    <th colspan="4"></th>
                                </tr>
                                @endif
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