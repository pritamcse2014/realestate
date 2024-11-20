@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/state') }}">State</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit State</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add State</h6>

                    <form class="forms-sample" method="POST" action="{{ url('admin/state/edit/' .$getState->id) }}">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Select Your Country <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="countries_id" id="countries_id" required>
                                    @foreach ($getCountries as $value)
                                    <option {{ ($getState->countries_id == $value->id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Enter Your State Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="state_name" value="{{ $getState->state_name }}" class="form-control" placeholder="Enter Your State Name" required />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-1">Update</button>
                        <a href="{{ url('admin/state') }}" class="btn btn-secondary ms-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection