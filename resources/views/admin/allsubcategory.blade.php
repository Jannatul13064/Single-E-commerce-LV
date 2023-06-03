@extends('admin.layouts.template')
@section('page_title')
    All_Sub_Category
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span>All Sub-Categories</h4>
        <div class="card">
            <h5 class="card-header">Product Sub-Categories Info</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Sub Category Name</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($allsubcategories as $subcategory)
                        <tr>
                            <td>{{$subcategory->id}}</td>
                            <td>{{$subcategory->sub_category_name}}</td>
                            <td>{{$subcategory->category_name}}</td>
                            <td>{{$subcategory->product_count}}</td>
                            <td>
                                <a href="{{route('editsubcategory',$subcategory->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('deletesubcategory',$subcategory->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
