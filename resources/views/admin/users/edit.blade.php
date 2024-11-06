@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update User</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Update User</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/users/edit/' .$getRecord->id) }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{ $getRecord->name }}" class="form-control" placeholder="Enter Your Name" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Username <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="username" value="{{ $getRecord->username }}" class="form-control" placeholder="Enter Your Username" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Email <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="email" name="email" value="{{ $getRecord->email }}" class="form-control" autocomplete="off" placeholder="Enter Your Email" required readonly />
                                <span style="color: red;">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Phone</label>
                            <div class="col-sm-9">
                                <input type="phone" name="phone" value="{{ $getRecord->phone }}" class="form-control" placeholder="Enter Your Phone" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Role <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="role" id="role" required>
                                    <option value="">Select Your Role</option>
                                    <option {{ ($getRecord->role === 'admin') ? 'selected' : '' }} value="admin">Admin</option>
                                    <option {{ ($getRecord->role === 'agent') ? 'selected' : '' }} value="agent">Agent</option>
                                    <option {{ ($getRecord->role === 'user') ? 'selected' : '' }} value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Status <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="status" required>
                                    <option value="">Select Your Status</option>
                                    <option {{ ($getRecord->status === 'active') ? 'selected' : '' }} value="active">Active</option>
                                    <option {{ ($getRecord->status === 'inactive') ? 'selected' : '' }} value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Update</button>
                        <a href="{{ url('admin/users') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection