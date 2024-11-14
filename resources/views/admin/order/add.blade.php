@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/order') }}">Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Order</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Order</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/order/add') }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Product Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="product_id" id="product_id">
                                    <option value="">Select Product</option>
                                    @foreach ($getProduct as $value)
                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Color Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-9 d-flex flex-wrap">
                                @foreach ($getColor as $value)
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" name="color_id[]" id="color_id[]" value="{{ $value->id }}" />
                                    <label class="form-check-label">{{ $value->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <a href="{{ url('admin/order') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection