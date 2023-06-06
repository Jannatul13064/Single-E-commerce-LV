@extends('user_temp.layouts.template')
@section('main-content')

<div style="margin-bottom: 4px">
    Provide your shipping address
    <div class="row">
        <div class="col-12">
            <div class="box_main">
                <form action="{{route('addshippingaddress')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text " class="form-control" name="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label for="city_name">City/District</label>
                        <input type="text " class="form-control" name="city_name" required>
                    </div>
                    <div class="form-group">
                        <label for="street_address">Street Address</label>
                        <input type="text " class="form-control" name="street_address" required>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code/Zip Code</label>
                        <input type="text " class="form-control" name="postal_code" required>
                    </div>
                    <div class="form-group">

                        <input type="submit" class="btn btn-primary" value="Place Order">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
