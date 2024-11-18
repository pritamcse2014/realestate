@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/blog') }}">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Blog</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/blog/add') }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Title <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" placeholder="Enter Your Title" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Slug <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="slug" class="form-control" placeholder="Enter Your Slug" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Description <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control editor" name="description" id="description" placeholder="Enter Your Description...."></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <a href="{{ url('admin/blog') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection