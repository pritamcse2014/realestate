@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/discountCode') }}">Discount Code</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Discount Code</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Discount Code</h6>
                    <form class="forms-sample" method="POST" action="{{ url('admin/discountCode/edit/' .$getRecord->id) }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your User Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="user_id" id="" required>
                                    @foreach ($getUser as $value)
                                    <option {{ ($getRecord->user_id == $value->id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Discount Code <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="discount_code" value="{{ $getRecord->discount_code }}" class="form-control" placeholder="Enter Your Discount Code" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Discount Price <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="discount_price" value="{{ $getRecord->discount_price }}" class="form-control" placeholder="Enter Your Discount Price" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Expiry Date <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="date" name="expiry_date" value="{{ $getRecord->expiry_date }}" class="form-control" placeholder="Enter Your Expiry Date" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Type <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="type" id="">
                                    <option {{ ($getRecord->type == 0) ? 'selected' : '' }} value="0">Percentage %</option>
                                    <option {{ ($getRecord->type == 1) ? 'selected' : '' }} value="1">Amount</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Usages <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="usages" id="">
                                    <option {{ ($getRecord->usages == 1) ? 'selected' : '' }} value="1">Unlimited</option>
                                    <option {{ ($getRecord->usages == 2) ? 'selected' : '' }} value="2">One Time</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Update</button>
                        <a href="{{ url('admin/discountCode') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection