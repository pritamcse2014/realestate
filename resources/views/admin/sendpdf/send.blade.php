@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    @include('_message')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/sendPdf') }}">Send PDF</a></li>
            <li class="breadcrumb-item active" aria-current="page">Send PDF</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Send PDF</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/sendPdfEmail') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Email <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Your Email" required />
                                <span style="color: red;">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Subject <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="subject" class="form-control" autocomplete="off" placeholder="Enter Your Subject" required />
                                <span style="color: red;">{{ $errors->first('subject') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Message <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <textarea name="message" id="message" class="form-control" autocomplete="off" placeholder="Enter Your Message...." required></textarea>
                                <span style="color: red;">{{ $errors->first('message') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your PDF <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="pdf" class="form-control" autocomplete="off" accept="application/pdf" required />
                                <span style="color: red;">{{ $errors->first('pdf') }}</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Send PDF</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection