@extends('admin.layouts.template')
@section('page_title')
    Edit_Product
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span>Edit Product</h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update Product</h5>
                <small class="text-muted float-end">Enter your new product Info</small>
            </div>
            <div class="card-body">
                <form action="{{route('updateproduct')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$product_info->id}}">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"  >Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="product_name" name="product_name"
                               value="{{$product_info->product_name}}" />

                               @error('product_name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"  >Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" name="price"
                            value="{{$product_info->price}}" />
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"  >Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                value="{{$product_info->quantity}}" />
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"  >Short Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="product_short_des" id="" cols="30" rows="10" style="height:69px" >{{$product_info->product_short_des}}</textarea>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"  >Long Description</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" name="product_long_des" id="" cols="30" rows="10" >{{$product_info->product_long_des}}</textarea>
                        </div>
                    </div>


                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" >Update Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
