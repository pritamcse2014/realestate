@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add User</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add User</h6>

                    <form class="forms-sample">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter Your Name" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Username <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter Your Username" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Email <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" autocomplete="off" placeholder="Enter Your Email" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Phone</label>
                            <div class="col-sm-9">
                                <input type="phone" class="form-control" placeholder="Enter Your Phone" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Role <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="role" id="role" required>
                                    <option value="">Select Your Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="agent">Agent</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Status <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="status" required>
                                    <option value="">Select Your Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <a href="{{ url('admin/users') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection