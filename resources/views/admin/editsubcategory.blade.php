@extends('admin.layouts.template')
@section('page_title')
    Edit_Sub_Category
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span>Edit Sub-Categories</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Update Sub-Category</h5>
                    <small class="text-muted float-end">Ex: Mobile, T-shirt , Chocolate etc</small>
                </div>
                <div class="card-body">
                    <form action="{{route('updatesubcategory')}}" method="POST">
                        @csrf
                        <input type="hidden" name="subcategoryid" value="{{$subcategory_info->id}}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Sub-Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="subcategory_name" name="sub_category_name"
                                    placeholder="Sub Category Name" value="{{$subcategory_info->sub_category_name}}"/>
                            </div>

                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Sub Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
