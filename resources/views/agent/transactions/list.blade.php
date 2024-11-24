@extends('agent.agent_dashboard')
@section('agent')
<div class="page-content">
    @include('_message')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Transactions</a></li>
            <li class="breadcrumb-item active" aria-current="page">Transactions List</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Transactions List</h4>
                        <div class="d-flex align-items-center"></div>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Order Number</th>
                                    <th>Transaction Id</th>
                                    <th>Amount</th>
                                    <th>Payment Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalPrice = 0; @endphp @foreach ($getRecord as $value) @php $totalPrice = $totalPrice + $value->amount; @endphp
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->order_number }}</td>
                                    <td>{{ $value->transaction_id }}</td>
                                    <td>{{ $value->amount }}</td>
                                    <td>
                                        @if ($value->is_payment == 1)
                                        <span class="badge bg-success">Completed</span>
                                        @else
                                        <span class="badge bg-primary">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($value->updated_at)) }}</td>
                                </tr>
                                @endforeach @if (!empty($totalPrice))
                                <tr>
                                    <th colspan="4">Total Amount</th>
                                    <td>{{ number_format($totalPrice, 2) }}</td>
                                    <th colspan="4"></th>
                                </tr>
                                @endif
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