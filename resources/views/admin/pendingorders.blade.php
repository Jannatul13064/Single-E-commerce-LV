@extends('admin.layouts.template')
@section('page_title')
    Pending_Order
@endsection
@section('content')
    <div class="contrainer">
        <div class="text-center" style="font-size: 35px;font-weight:700">Pendining Orders</div>
        <div class="card">
            <div class="card-body">

                    <table class="table">
                        <tr>
                            <th>User ID</th>
                            <th>Shipping Address</th>
                            <th>Product Id</th>
                            <th>Quantity</th>
                            <th>Total paid</th>

                            <th>Order time</th>
                            <th>Action</th>

                        </tr>
                        @foreach ($pending_orders as $orders)
                        <tr>
                            <td>{{$orders->user_id}}</td>
                            <td>
                                <ul>
                                    <li>Order Id {{$orders->id}}</li>
                                    <li>Phone Number: {{$orders->shipping_phone_number}} </li>
                                    <li>City : {{$orders->shipping_city}}</li>
                                    <li>Postal Code : {{$orders->shipping_postal_code}}</li>
                                </ul>


                            </td>
                            <td>{{$orders->product_id}}</td>
                            <td>{{$orders->product_quantity}}</td>
                            <td>{{$orders->product_total_price}}</td>

                            <td>{{$orders->created_at}}</td>
                            <td><a href="" class="btn btn-success">Approve Now</a></td>
                        </tr>


                        @endforeach

                    </table>

            </div>
        </div>

    </div>
@endsection
