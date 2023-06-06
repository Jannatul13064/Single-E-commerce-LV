
@extends('user_temp.layouts.user_profile_temp')
@section('profile-content')

<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif

    <table class="table">
        <tr>
            <th>Product ID</th>
            <th>Price</th>
        </tr>
        @foreach ($pending_orders as $order )
        <tr>
            <td>
                {{$order->product_id}}
            </td>
            <td>
                {{$order->product_total_price}}
            </td>

        </tr>

        @endforeach
    </table>
</div>
@endsection
