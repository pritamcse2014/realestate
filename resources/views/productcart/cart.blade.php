@extends('productcart.index')
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
        <tr data-id="">
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs">
                        <img class="img-responsive" src="{{ asset('product/LPb3VbrG518peEe429SH0s7tOdKCzW.jpg') }}" alt="" srcset="" width="100" height="150" />
                    </div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">Name</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">$125</td>
            <td data-th="Quantity">
                <input class="form-control quantity update-cart" type="number" value="1" />
            </td>
            <td class="text-center" data-th="Subtotal">$10 * 4</td>
            <td class="actions" data-th="">
                <button class="btn btn-danger btn-sm remove-from-cart">
                    <i class="fa fa-trash-o"></i>
                </button>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h3><strong>Total $125</strong></h3>
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
<script type="text/javascript"></script>
@endsection