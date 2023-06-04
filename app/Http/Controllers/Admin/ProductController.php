<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index()
    {
        $products = Product::latest()->get();
        return view('admin.allproducts',compact('products'));
    }
    public function AddProduct()
    {
        $subcategories = Subcategory::latest()->get();
        $categories = Category::latest()->get();

        return view('admin.addproduct',compact('subcategories','categories'));

    }

    public function StoreProduct(Request $request){

        $request->validate([
            'product_name'=>'required|unique:products|max:75',
            'price'=> 'required',
            'quantity'=> 'required',
            'product_short_des'=> 'required',
            'product_long_des'=> 'required',
            'product_category_id'=> 'required',
            'product_subcategory_id'=> 'required',
            'product_img'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',

        ]);


        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url = 'upload/'.$img_name;

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = Category::where('id','=',$category_id)->value('category_name');
        $subcategory_name = Subcategory::where('id','=',$subcategory_id)->value('sub_category_name');


        Product::insert([
            'product_name'=>$request->product_name,
            'product_short_des'=>$request->product_short_des,
            'product_long_des'=>$request->product_long_des,
            'price'=>$request->price,
            'product_category_name'=>$category_name,
            'product_subcategory_name'=>$subcategory_name,
            'quantity'=>$request->quantity,
            'product_category_id'=>$request->product_category_id,
            'product_subcategory_id'=>$request->product_subcategory_id,
            'product_img'=>$img_url,
            'slug'=>strtolower(str_replace(' ','-',$request->product_name)),
        ]);

        Category::where('id',$category_id)->increment('product_count',1);
        Subcategory::where('id',$subcategory_id)->increment('product_count',1);

        return redirect()->route('allproducts')->with('message',"product Added Successfully!");

    }

    public function EditProductImg($id){
        $product_img_info = Product::findOrFail($id);
        return view('admin.editproductimg',compact('product_img_info'));
    }

    public function UpdateProductImg(Request $request)
    {

        $request->validate([
            'product_img'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',

        ]);

        $id = $request->id;
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url = 'upload/'.$img_name;

        Product::findOrFail($id)->update([
            'product_img' => $img_url

        ]);

        return redirect()->route('allproducts')->with('message','Image Updated successfully!');
    }
    public function EditProduct($id){
        $product_info = Product::findOrFail($id);
        return view('admin.editproduct',compact('product_info'));
    }

    public function UpdateProduct(Request $request){


        $productid = $request->id;

        $request->validate([
            'product_name'=>'required|unique:products|max:75',
            'price'=> 'required',
            'quantity'=> 'required',
            'product_short_des'=> 'required',
            'product_long_des'=> 'required',
        ]);


        Product::findOrFail($productid)->update([
            'product_name'=>$request->product_name,
            'product_short_des'=>$request->product_short_des,
            'product_long_des'=>$request->product_long_des,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'slug'=>strtolower(str_replace(' ','-',$request->product_name)),

        ]);

        return redirect()->route('allproducts')->with('message','Product Info Updated successfully!');


    }

    public function DeleteProduct ($id){
        $cat_id = Product::where('id',$id)->value('product_category_id');
        $sub_cat_id = Product::where('id',$id)->value('product_subcategory_id');
        Product::findOrFail($id)->delete();
        Category::where('id',$cat_id)->decrement('product_count',1);
        Subcategory::where('id',$sub_cat_id)->decrement('product_count',1);



        return redirect()->route('allproducts')->with('message','Product Successfully deleted');

    }


}