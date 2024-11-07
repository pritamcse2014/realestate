@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    @include('_message')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/edit_profile') }}">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Update Pofile</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/edit_profile/update') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" placeholder="Enter Your Name" value="{{ $getRecord->name }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Email <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Your Email" value="{{ old('email', $getRecord->email) }}" required />
                                <span style="color: red;">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Profile Image</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" name="photo" id="photo" />
                                @if (!empty($getRecord->photo))
                                <img class="wd-100 ht-100 rounded-circle mt-1" src="{{ asset('upload/'.$getRecord->photo) }}" alt="Upload Photo" srcset="" />
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" placeholder="Enter Your Password" />
                                (Leave blank you are not changing the password)
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection