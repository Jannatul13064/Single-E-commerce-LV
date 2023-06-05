<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function CategoryPage($id){

        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id',$id)->latest()->get();
        return view('user_temp.category',compact('category','products'));
    }

    // have a question here! why we are not using the same thing as CategoryPage() in the SingleProduct. Though they worked
    public function SingleProduct($id){
        $product = Product::findOrFail($id);
        $sub_cat_id = Product::where('id',$id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id',$sub_cat_id)->latest()->get();
        return view('user_temp.singleproduct',compact('product','related_products'));
    }

    public function AddProductToCart(){
        return '';
    }

    public function Checkout(){
        return view('user_temp.checkout');
    }
    public function AddToCart(){
        return view('user_temp.addtocart');
    }
    public function UserProfile(){
        return view('user_temp.userprofile');
    }
    public function PendingOrder(){
        return view('user_temp.pendingorder');
    }
    public function History(){
        return view('user_temp.history');
    }
    public function NewRelease(){
        return view('user_temp.newrelease');
    }

    public function TodaysDeal(){
        return view('user_temp.todaysdeal');
    }
    public function CustomerService(){
        return view('user_temp.customerservice');
    }


}
