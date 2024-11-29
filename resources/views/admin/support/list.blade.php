@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    @include('_message')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Support</a></li>
            <li class="breadcrumb-item active" aria-current="page">Support List</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Search Support</h6>
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
                                    <label class="form-label">Select Your User Name</label>
                                    <select class="form-control" name="user_id" id="">
                                        <option value="">Select User Name</option>
                                        @foreach ($getUser as $value)
                                        <option {{ (Request()->user_id == $value->id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Title</label>
                                    <input class="form-control" type="text" name="title" id="title" value="{{ Request()->title }}" placeholder="Enter Your Title" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Select Your Status</label>
                                    <select class="form-control" name="status" id="">
                                        <option value="">Select Status</option>
                                        <option {{ (Request()->status == '1') ? 'selected' : '' }} value="1">Closed</option>
                                        <option {{ (Request()->status == '1000') ? 'selected' : '' }} value="1000">Open</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Created At</label>
                                    <input class="form-control" type="date" name="created_at" id="created_at" value="{{ Request()->created_at }}" placeholder="Enter Your Created At" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Updated At</label>
                                    <input class="form-control" type="date" name="updated_at" id="updated_at" value="{{ Request()->updated_at }}" placeholder="Enter Your Updated At" />
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary me-1" type="submit">Search</button>
                        <a class="btn btn-danger ms-1" href="{{ url('admin/support') }}">Reset</a>
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
                        <h4 class="card-title">Support List</h4>
                        <div class="d-flex align-items-center"></div>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>On And Off</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getRecord as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ !empty($value->user->name) ? $value->user->name : '' }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>
                                        @if (Auth::user()->role == 'admin')
                                            <select class="form-control changeSupportStatus" id="{{ $value->id }}" style="width: 80px;">
                                                <option <?= ($value->status == '0') ? 'selected' : '0' ?> value="0">Open</option>
                                                <option <?= ($value->status == '1') ? 'selected' : '1' ?> value="1">Close</option>
                                            </select>
                                        @else
                                            {{ ($value->status == '1') ? 'Closed' : 'Open' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($value->status == 0)
                                            <a class="btn btn-success" href="{{ url('admin/support/statusUpdate/' .$value->id) }}">On</a>
                                        @else
                                            <a class="btn btn-danger" href="{{ url('admin/support/statusUpdate/' .$value->id) }}">Off</a>
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                                    <td><a class="btn btn-primary" href="{{ url('admin/support/reply/' .$value->id) }}">Reply</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%">Record Not Found....</td>
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