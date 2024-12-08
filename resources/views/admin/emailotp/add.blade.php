@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/emailOTP') }}">Email OTP</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Email OTP</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Email OTP</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/emailOTP') }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Email <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Send</button>
                        <a href="{{ url('admin/emailOTP') }}" class="btn btn-secondary ms-1">Reset</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection