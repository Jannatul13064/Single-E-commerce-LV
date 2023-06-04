<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function CategoryPage($id){

        $category = Category::findOrFail($id);
        return view('user_temp.category',compact('category'));
    }
    public function SingleProduct(){
        return view('user_temp.singleproduct');
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