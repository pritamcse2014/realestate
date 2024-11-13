@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/color') }}">Color</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Color</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Color</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/color/add') }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Color Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" placeholder="Enter Your Color Name" required />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <a href="{{ url('admin/color') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection