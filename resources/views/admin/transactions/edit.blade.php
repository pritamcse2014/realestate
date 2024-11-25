@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    @include('_message')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/transactions') }}">Transactions</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Transaction</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Transaction</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/transactions/edit/' .$getRecord->id) }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Order Number <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="order_number" value="{{ $getRecord->order_number }}" id="" placeholder="Enter Your Order Number" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Transaction ID <span style="color: red;"> *</span></label>
                            <div class="col-sm-9 d-flex flex-wrap">
                                <input class="form-control" type="text" name="transaction_id" value="{{ $getRecord->transaction_id }}" id="" placeholder="Enter Your Transaction ID" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Amount <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="number" name="amount" value="{{ $getRecord->amount }}" id="" placeholder="Enter Your Amount" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Select Your Payment Status <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="is_payment" id="" required>
                                    <option {{ ($getRecord->is_payment == '0') ? 'selected' : '' }} value="0">Pending</option>
                                    <option {{ ($getRecord->is_payment == '1') ? 'selected' : '' }} value="1">Completed</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Update</button>
                        <a href="{{ url('admin/transactions') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection