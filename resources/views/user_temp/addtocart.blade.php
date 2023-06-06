
@extends('user_temp.layouts.template')
@section('main-content')
<div class="container mt-3">
    <div class="mb-3" style="font-size: 24px;font-weight: 700;">Add to cart</div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="box_main">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart_items as $item)
                            <tr>
                                @php
                                    $product_name = App\Models\Product::where('id',$item->product_id)->value('product_name'); //fetch the category data
                                @endphp

                                <td>{{$product_name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>
                                <td>
                                    <a href="{{route('removeaddtocart',['id' => $item->id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @php
                                $total = $total +$item->price;
                            @endphp
                        @endforeach
                        @if ($total>0)
                        <tr>
                            <td style="font-weight: 700">Total</td>
                            <td></td>
                            <td style="font-weight: 700; color:brown" >{{$total}}</td>
                            <td><a href="{{route('shippingaddress')}}" class="btn btn-primary">Proceed to Checkout</a></td>
                        </tr>

                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
