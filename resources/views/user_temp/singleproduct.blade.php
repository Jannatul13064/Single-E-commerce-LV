@extends('user_temp.layouts.template')
@section('main-content')

<div class="container ">

        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                <div class="tshirt_img">
                    <img src="{{asset($product->product_img)}}" alt="">
                </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    <div class="product-info">
                        <h4 class="shirt-text text-left">{{$product->product_name}}</h4>
                        <p class="price_text text-left">Price
                            <span style="color:#262626;">{{$product->price}}</span>
                        </p>
                    </div>
                    <div class="my-3 product-details">
                        <p class="lead text-left"><span style="color:blue">Shortend:</span> {{$product->product_short_des}}</p>
                        <p class="lead text-left"><span style="color:blue">Details :</span> {{$product->product_long_des}}</p>
                        <ul class="py-2 text-left font-weight-bold">
                            <li>category : {{$product->product_category_name}}</li>
                            <li>Subcategory : {{$product->product_subcategory_name}}</li>
                            <li>Available quantity : {{$product->quantity}}</li>
                        </ul>

                        <div>
                            <form action="{{route('addproducttocart',$product->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" id="" value="{{$product->id}}">
                                <div class="form-group">
                                    <label for="productQuantity">Quantity :</label>
                                    <input type="number" class="form-control" name="product_quantity" id="" min="1"><br/>
                                    <input class="btn btn-warning" type="submit" value="Add to Cart">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{-- related products --}}


        <div class="container">
            <h1 class="fashion_taital">Related Products</h1>
            <div class="fashion_section_2">
            <div class="row">

                @foreach ($related_products as $product)
                <div class="col-lg-4 col-sm-4">
                    <div class="box_main">
                    <h4 class="shirt_text">{{$product->product_name}}</h4>
                    <p class="price_text">Price  <span style="color: #262626;">$ {{$product->price}}</span></p>
                    <div class="tshirt_img"><img src="{{asset($product->product_img)}}"></div>
                    <div class="btn_main">
                        <form action="{{route('addproducttocart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" id="" value="{{$product->id}}">
                            <div class="form-group">
                                <input class="btn btn-warning" type="submit" value="Buy Now">
                            </div>
                        </form>
                        <div class="seemore_bt"><a href="{{route('singleproduct',[$product->id,$product->slug])}}">See More</a></div>
                    </div>
                    </div>
                </div>

                @endforeach

            </div>
            </div>
        </div>
    </div>


</div>

@endsection
