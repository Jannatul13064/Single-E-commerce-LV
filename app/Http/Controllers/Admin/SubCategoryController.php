<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function Index()
    {
        return view('admin.allsubcategory');
    }
    public function AddSubCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.addsubcategory',compact('categories'));
    }
}
