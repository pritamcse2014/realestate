@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    @include('_message')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/emailOTP') }}">Email OTP</a></li>
            <li class="breadcrumb-item active" aria-current="page">Verify Email OTP</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Verify Email OTP</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/emailOTP/verify') }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your OTP Code <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="email_otp" class="form-control" placeholder="Enter Your OTP Code" required />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Verify</button>
                        <a href="{{ url('admin/emailOTP/verify') }}" class="btn btn-secondary ms-1">Reset</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection