@extends('productcart.layout')
@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width: 50%;">Product</th>
            <th style="width: 10%;">Price</th>
            <th style="width: 8%;">Quantity</th>
            <th style="width: 22%;">Subtotal</th>
            <th style="width: 10%;"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp @if (session('productCartAll')) @foreach (session('productCartAll') as $id => $details) @php $total += $details['price'] * $details['quantity']; @endphp
        <tr data-id="{{ $id }}">
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs">
                        <img style="width: full; height: 150px;" class="img-fluid" src="{{ asset('product/' .$details['image']) }}" alt="" srcset="" />
                    </div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">{{ $details['price'] }}</td>
            <td data-th="Quantity">
                <input class="form-control quantity update-cart" type="number" value="{{ $details['quantity'] }}" />
            </td>
            <td class="text-center" data-th="Subtotal">${{ $details['price'] * $details['quantity'] }}</td>
            <td class="actions" data-th="">
                <button class="btn btn-danger btn-sm remove-from-cart">
                    <i class="fa fa-trash-o"></i>
                </button>
            </td>
        </tr>
        @endforeach @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h3><strong>Total = ${{ $total }}</strong></h3>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a class="btn btn-primary" href="{{ url('productCart') }}"><i class="fa fa-angle-left"></i> Continue Shopping </a>
                <button class="btn btn-success">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection @section('script')
<script type="text/javascript">
    $(".update-cart").change(function (event) {
        event.preventDefault();
        var element = $(this);
        $.ajax({
            url : '{{ route('updateCart') }}',
            method : 'Patch',
            data : {
                _token : '{{ csrf_token() }}',
                id : element.parents("tr").attr("data-id"),
                quantity : element.parents("tr").find(".quantity").val(),
            },
            success : function (response) {
                window.location.reload();
            }
        });
    });
</script>
@endsection