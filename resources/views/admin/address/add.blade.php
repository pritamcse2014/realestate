@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/address') }}">Address</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Address</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Address</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/address/add') }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Select Your Country <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="countries_id" id="countries_id" required>
                                    <option value="">Select Country</option>
                                    @foreach ($getCountries as $value)
                                    <option value="{{ $value->id }}">{{ $value->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Select Your State <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="state_id" id="state_id" required>
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Select Your City <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="city_id" id="city_id" required>
                                    <option value="">Select City</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <a href="{{ url('admin/address') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection