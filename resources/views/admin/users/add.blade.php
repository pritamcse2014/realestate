@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add User</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add User</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/users/add') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Username <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" placeholder="Enter Your Username" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Email <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Your Email" value="{{ old('email') }}" onblur="duplicateEmail(this)" required />
                                <span style="color: red;" class="duplicate-message">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Photo</label>
                            <div class="col-sm-9">
                                <input type="file" name="photo" class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Phone</label>
                            <div class="col-sm-9">
                                <input type="phone" name="phone" class="form-control" placeholder="Enter Your Phone" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Role <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="role" id="role" required>
                                    <option value="">Select Your Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="agent">Agent</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your Status <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="status" required>
                                    <option value="">Select Your Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <a href="{{ url('admin/users') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    function duplicateEmail(element) {
        var email = $(element).val();
        // alert(email);
        $.ajax({
            type: "POST",
            url: '{{ url('checkemail') }}',
            data: {
                email: email,
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (res) {
                if (res.exists) {
                    $(".duplicate-message").html("That Email is Taken. Try Another.");
                } else {
                    $(".duplicate-message").html("");
                }
            },
            error: function (jqXHR, exception) {

            }
        });
    }
</script>
@endsection