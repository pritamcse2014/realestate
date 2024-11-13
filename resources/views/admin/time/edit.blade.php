@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/time') }}">Week Time</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Week Time</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Week Time</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/time/edit/' .$getRecord->id) }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Week Time <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="time" name="name" value="{{ $getRecord->name }}" class="form-control" placeholder="Enter Your Week Time" required />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Update</button>
                        <a href="{{ url('admin/time') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection