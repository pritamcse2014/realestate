@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/blog') }}">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Blog</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">View Blog</h6>

                    <form class="forms-sample" method="" action="">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your ID</label>
                            <div class="col-sm-9">
                                {{ $getRecord->id }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Title</label>
                            <div class="col-sm-9">
                                {{ $getRecord->title }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Slug</label>
                            <div class="col-sm-9">
                                {{ $getRecord->slug }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Description</label>
                            <div class="col-sm-9">
                                {!! $getRecord->description !!}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Created At</label>
                            <div class="col-sm-9">
                                {{ date('d-m-Y H:s A', strtotime($getRecord->created_at)) }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Updated At</label>
                            <div class="col-sm-9">
                                {{ date('d-m-Y H:s A', strtotime($getRecord->updated_at)) }}
                            </div>
                        </div>
                        <a href="{{ url('admin/blog') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection