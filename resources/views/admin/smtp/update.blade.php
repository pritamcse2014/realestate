@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    @include('_message')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/smtp') }}">SMTP</a></li>
            <li class="breadcrumb-item active" aria-current="page">SMTP Setting</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">SMTP Setting</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/smtpSend') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your App Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="app_name" class="form-control" autocomplete="off" placeholder="Enter Your App Name" value="{{ $getRecord->app_name }}" required />
                                <span style="color: red;">{{ $errors->first('app_name') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Mail Mailer <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="mail_mailer" class="form-control" autocomplete="off" placeholder="Enter Your Mail Mailer" value="{{ $getRecord->mail_mailer }}" required />
                                <span style="color: red;">{{ $errors->first('mail_mailer') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Mail Host <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="mail_host" class="form-control" autocomplete="off" placeholder="Enter Your Mail Host" value="{{ $getRecord->mail_host }}" required />
                                <span style="color: red;">{{ $errors->first('mail_host') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Mail Port <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="mail_port" class="form-control" autocomplete="off" placeholder="Enter Your Mail Port" value="{{ $getRecord->mail_port }}" required />
                                <span style="color: red;">{{ $errors->first('mail_port') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Mail Username <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="mail_username" class="form-control" autocomplete="off" placeholder="Enter Your Mail Username" value="{{ $getRecord->mail_username }}" required />
                                <span style="color: red;">{{ $errors->first('mail_username') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Mail Password <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="password" name="mail_password" class="form-control" autocomplete="off" placeholder="Enter Your Mail Password" value="{{ $getRecord->mail_password }}" required />
                                <span style="color: red;">{{ $errors->first('mail_password') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Mail Encryption <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="mail_encryption" class="form-control" autocomplete="off" placeholder="Enter Your Mail Encryption" value="{{ $getRecord->mail_encryption }}" required />
                                <span style="color: red;">{{ $errors->first('mail_encryption') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Mail From Address <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="email" name="mail_from_address" class="form-control" autocomplete="off" placeholder="Enter Your Mail From Address" value="{{ $getRecord->mail_from_address }}" required />
                                <span style="color: red;">{{ $errors->first('mail_from_address') }}</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Send SMTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection