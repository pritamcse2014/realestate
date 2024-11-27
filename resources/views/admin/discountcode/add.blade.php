@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/discountCode') }}">Discount Code</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Discount Code</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Discount Code</h6>
                    <form class="forms-sample" method="POST" action="{{ url('admin/discountCode/add') }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Discount Code <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="discount_code" class="form-control" placeholder="Enter Your Discount Code" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Discount Price <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="discount_price" class="form-control" placeholder="Enter Your Discount Price" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Expiry Date <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="date" name="expiry_date" class="form-control" placeholder="Enter Your Expiry Date" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Type <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="type" id="">
                                    <option value="0">Percentage %</option>
                                    <option value="1">Amount</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Usages <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="usages" id="">
                                    <option value="1">Unlimited</option>
                                    <option value="2">One Time</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <a href="{{ url('admin/discountCode') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection