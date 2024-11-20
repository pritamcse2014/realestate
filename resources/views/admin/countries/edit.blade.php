@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/countries') }}">Countries</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Country</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Country</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/countries/edit/' .$getRecord->id) }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Country Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="country_name" value="{{ $getRecord->country_name }}" class="form-control" placeholder="Enter Your Country Name" required />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Update</button>
                        <a href="{{ url('admin/countries') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection