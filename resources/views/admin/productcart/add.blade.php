@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/productCart') }}">Product Cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Product Cart</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Product Cart</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/productCart/add') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Description <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <textarea name="description" id="description" class="form-control" placeholder="Enter Your Description...." required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Image <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="image" class="form-control" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Price <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="price" class="form-control" placeholder="Enter Your Price" required />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <a href="{{ url('admin/productCart') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection