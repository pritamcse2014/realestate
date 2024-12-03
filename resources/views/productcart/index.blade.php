@extends('productcart.layout')
@section('content')

<div class="row mt-4">
    @foreach ($products as $product)
    <div class="col-md-3">
        <div class="card text-center">
            <img style="width: full; height: 150px;" class="card-img-top" src="{{ asset('product/'.$product->image) }}" alt="" srcset="" />
            <div class="caption card-body">
                <h4>{{ $product->name }}</h4>
                <p>{{ $product->description }}</p>
                <p><strong>Price : </strong>${{ $product->price }}</p>
                <a href="">Add To Cart</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection @section('script')
<script type="text/javascript"></script>
@endsection