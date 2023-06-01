@extends('admin.layouts.template')
@section('page_title')
    all category
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span>All Categories</h4>
        <div class="card">
            <h5 class="card-header">Product Categories Info</h5>
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
                            <th>Category Name</th>
                            <th>Sub-Category</th>
                            <th>slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        @foreach ($categories as $category )
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->sub_category_count}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    <a href="{{route('editcategory',['id' => $category->id])}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('deletecategory',['id' => $category->id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
