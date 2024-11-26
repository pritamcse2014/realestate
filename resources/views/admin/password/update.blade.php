@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    @include('_message')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/changePassword') }}">Change Password</a></li>
            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Change Password</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/changePassword/update') }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Old Password <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="password" name="old_password" class="form-control" placeholder="Enter Your Old Password" required />
                            </div>
                        </div>
                        <hr />
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your New Password <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="password" name="new_password" class="form-control" placeholder="Enter Your New Password" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Confirm Password <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="password" name="confirm_password" class="form-control" placeholder="Enter Your Confirm Password" required />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Update</button>
                        <a href="{{ url('admin/changePassword') }}" class="btn btn-secondary ms-1">Reset</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection