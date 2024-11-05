@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users List</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Search Users</h6>
                    <form method="GET" action="">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your ID</label>
                                    <input class="form-control" type="text" name="id" id="id" value="{{ Request()->id }}" placeholder="Enter Your ID" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Name</label>
                                    <input class="form-control" type="text" name="name" id="name" value="{{ Request()->name }}" placeholder="Enter Your Name" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your User Name</label>
                                    <input class="form-control" type="text" name="username" id="username" value="{{ Request()->username }}" placeholder="Enter Your User Name" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Email</label>
                                    <input class="form-control" type="email" name="email" id="email" value="{{ Request()->email }}" placeholder="Enter Your Email" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Phone</label>
                                    <input class="form-control" type="tel" name="phone" id="phone" value="{{ Request()->phone }}" placeholder="Enter Your Phone" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Website</label>
                                    <input class="form-control" type="text" name="website" id="website" value="{{ Request()->website }}" placeholder="Enter Your Website" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Role</label>
                                    <select class="form-control" name="role" id="role">
                                        <option value="">Select Your Role</option>
                                        <option value="admin" {{ (Request()->role === 'admin') ? 'selected' : '' }}>Admin</option>
                                        <option value="agent" {{ (Request()->role === 'agent') ? 'selected' : '' }}>Agent</option>
                                        <option value="user" {{ (Request()->role === 'user') ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Select Your Status</option>
                                        <option value="active" {{ (Request()->status === 'active') ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ (Request()->status === 'inactive') ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary me-1" type="submit">Search</button>
                        <a class="btn btn-danger ms-1" href="{{ url('admin/users') }}">Reset</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Users List</h4>
                        <div class="d-flex align-items-center">
                            <a class="btn btn-primary" href="{{ url('admin/users/add') }}">Add User</a>
                        </div>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Phone</th>
                                    <th>Website</th>
                                    <th>Address</th>
                                    <th>About</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getRecord as $value)
                                <tr class="table-info text-dark">
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->username }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>
                                        @if (!empty($value->photo))
                                        <img class="wd-100 ht-100 rounded-circle" src="{{ asset('upload/'.$value->photo) }}" alt="Upload Photo" srcset="" />
                                        @endif
                                    </td>
                                    <td>{{ $value->phone }}</td>
                                    <td>{{ $value->website }}</td>
                                    <td>{{ $value->address }}</td>
                                    <td>{{ $value->about }}</td>
                                    <td>
                                        @if ($value->role === 'admin')
                                        <span class="badge bg-primary">Admin</span>
                                        @elseif ($value->role === 'agent')
                                        <span class="badge bg-danger">Agent</span>
                                        @elseif ($value->role === 'user')
                                        <span class="badge bg-success">User</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($value->status === 'active')
                                        <span class="badge bg-primary">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                    <td>
                                        <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/users/view/'.$value->id) }}">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-eye icon-sm me-2"
                                            >
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                            <span class="">View</span>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%">No Record Found....</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div style="padding: 20px; float: right;">
                        {!! $getRecord->appends(Request::except('page'))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection