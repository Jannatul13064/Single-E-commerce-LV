@extends('admin.layouts.template')
@section('page_title')
    Add_Product
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span>Add Product</h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add Product</h5>
                <small class="text-muted float-end">Enter your product Info</small>
            </div>
            <div class="card-body">
                <form action="{{route('storeproduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"  >Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="product_name" name="product_name"
                                placeholder="Product Name" />
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"  >Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" name="price"
                                placeholder="Product Price" />
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"  >Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                placeholder="Product Quntity" />
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"  >Short Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="product_short_des" id="" cols="30" rows="10" style="height:69px"></textarea>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"  >Long Description</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" name="product_long_des" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"  >Product Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="product_img"/>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label"  >Select Category</label>
                        <div class="col-sm-10 my-3">

                            <select class="form-select" id="category" name="product_category_id"
                                aria-label="Default select example">
                                <option selected>Select Category</option>
                                @foreach ($categories as $category)

                                <option value="{{$category->id}}">{{$category->category_name}}</option>

                            @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"  >Select Sub Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="category" name="product_subcategory_id"
                                aria-label="Default select example">
                                <option selected>Select Sub Category</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->sub_category_name}}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" >Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
