@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/reply') }}">Reply</a></li>
            <li class="breadcrumb-item active" aria-current="page">Support Reply</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Support Reply</h6>
                    <div class="content-frame-body content-frame-body-left" style="width: 100%;">
                        <div class="message message-img">
                            <div class="item in">
                                <div class="text">
                                    <div class="heading">
                                        <a href="#">Hi</a>
                                        <span class="date">15-12-2024</span>
                                    </div>
                                    <b>Title : </b> Title
                                    <br />
                                    <b>Description : </b> Welcome
                                </div>
                            </div>
                            <div class="item">
                                <div class="text">
                                    <div class="heading">
                                        <a href="#">Hard</a>
                                        <span class="date">16-12-2024</span>
                                    </div>
                                    Good Work
                                </div>
                            </div>
                            <div class="item in">
                                <div class="text">
                                    <div class="heading">
                                        <a href="#">Error</a>
                                        <span class="date">17-12-2024</span>
                                    </div>
                                    Good Work Done
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default push-up-10">
                            <div class="panel-body panel-body-search">
                                <form action="" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default">Reply Message</button>
                                        </div>
                                        <input class="form-control" type="text" name="description" placeholder="Enter Your Message...." required />
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection