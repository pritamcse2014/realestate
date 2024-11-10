@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    @include('_message')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Schedule</a></li>
            <li class="breadcrumb-item active" aria-current="page">Schedule List</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Schedule List</h4>
                        <div class="d-flex align-items-center"></div>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Week</th>
                                    <th>Open/Close</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($week as $row) @php $getSchedule = App\Models\Schedule::getDetails($row->id); $open_close = !empty($getSchedule->status) ? $getSchedule->status : ''; $start_time = !empty($getSchedule->start_time) ?
                                $getSchedule->start_time : ''; $end_time = !empty($getSchedule->end_time) ? $getSchedule->end_time : ''; @endphp

                                <tr class="table-info text-dark">
                                    <td>{{ !empty($row->name) ? $row->name : '' }}</td>
                                    <td>
                                        <input type="hidden" name="week[{{ $row->id }}][week_id]" value="{{ $row->id }}" />
                                        <label class="switch">
                                            <input type="checkbox" name="week[{{ $row->id }}][status]" id="{{ $row->id }}" {{ !empty($open_close) ? 'checked' : '' }} />
                                        </label>
                                    </td>
                                    <td>
                                        <select class="form-control" name="week[{{ $row->id }}][start_time]" id="">
                                            @foreach ($time as $row)

                                            <option>{{ $row->name }}</option>

                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="week[{{ $row->id }}][end_time]" id="">
                                            @foreach ($time as $row)

                                            <option>{{ $row->name }}</option>

                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="padding: 20px; float: right;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection