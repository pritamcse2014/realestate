@extends('agent.agent_dashboard')
@section('agent')
<div class="page-content">
    @include('_message')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('agent/transactions') }}">Transaction</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Transaction</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Transaction</h6>

                    <form class="forms-sample" method="POST" action="{{ url('agent/transactions/add') }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Order Number <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="order_number" id="" placeholder="Enter Your Order Number" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Transaction ID <span style="color: red;"> *</span></label>
                            <div class="col-sm-9 d-flex flex-wrap">
                                <input class="form-control" type="text" name="transaction_id" id="" placeholder="Enter Your Transaction ID" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Amount <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="number" name="amount" id="" placeholder="Enter Your Amount" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Select Your Payment Status <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="is_payment" id="" required>
                                    <option value="">Select Payment Status</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Completed</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection