@extends('user_temp.layouts.template')
@section('main-content')

<div style="color:green ;font-weight:900">Successfully Placed Order!</div>
<div style="margin-top: 2%;font-weight:700">Waiting for your confirmation</div>
<div class="row mt-4">
    <div class="col-lg-6">
        <div class="box_main">
            <div>Product will send at - </div>
            <div>
                <h3>City/District - {{$user_shipping_address->city_name}}</h3>
                <p>Street Address - {{$user_shipping_address->street_address}}</p>
                <p>Street Address - {{$user_shipping_address->postal_code}}</p>
                <p>Phone Number - {{$user_shipping_address->phone_number}}</p>
                <p>Order Placed at - {{$user_shipping_address->created_at}}</p>
            </div>

        </div>

    </div>
    <div class="col-lg-6">
        <div class="box_main">
            <div>Your Final Products</div>
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
                        <tr>
                            <td style="font-weight: 700">Total</td>
                            <td></td>
                            <td style="font-weight: 700; color:brown" >{{$total}}</td>

                        </tr>
                    </table>
                </div>
            </div>
    </div>


    <form action="" method="post">
        @csrf
        <input type="submit" value="Cancel Order" name="cancel_order" class="btn btn-danger text-center">
    </form>
    <form action="{{route('placeorder')}}" method="post">
        @csrf
        <input type="submit" value="Place Order" name="place_order" class="btn btn-primary mx-3 text-center">
    </form>
</div>

@endsection
