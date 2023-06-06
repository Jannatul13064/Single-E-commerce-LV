<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\UserShipphing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function AddProductToCart(Request $request){
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;
        Cart::insert([
            'product_id'=> $request->product_id,
            'user_id'=>Auth::id(),
            'price'=>$price,
            'quantity'=>$quantity
        ]);
        return redirect()->route('addtocart')->with('message','Your item Added to cart successfully');
    }




    public function ShippingAddress()
    {
        return view('user_temp.shippingaddress');
    }

    public function AddShippingAddress(Request $request){
        UserShipphing::insert([
            'user_id'=> Auth::id(),
            'phone_number'=>$request->phone_number,
            'city_name' =>$request->city_name,
            'street_address' =>$request->city_name,
            'postal_code'=>$request->postal_code
        ]);

        return redirect()->route('checkout');
    }
    public function Checkout(){
        $userid = Auth::id();
        $cart_items = Cart::where('user_id',$userid)->get();
        $user_shipping_address = UserShipphing::where('user_id',$userid)->first();

        return view('user_temp.checkout',compact('cart_items','user_shipping_address'));
    }
    public function AddToCart(){
        $userid = Auth::id();
        $cart_items = Cart::where('user_id',$userid)->latest()->get();
        return view('user_temp.addtocart',compact('cart_items'));
    }
    public function RemoveAddToCart($id){
        Cart::findOrFail($id)->delete($id);
        return redirect()->route('addtocart');

    }

    public function PlaceOrder(){

        $userid = Auth::id();
        $cart_items = Cart::where('user_id',$userid)->get();
        $user_shipping_address = UserShipphing::where('user_id',$userid)->first();
        foreach ($cart_items as $item) {
            Order::insert([
                'user_id'=>$userid,
                'shipping_phone_number'=>$user_shipping_address->phone_number,
                'shipping_city'=>$user_shipping_address->city_name ,
                'shipping_postal_code'=>$user_shipping_address->postal_code ,
                'product_id'=>$item->product_id ,
                'product_quantity'=>$item->quantity ,
                'product_total_price'=>$item->price,
            ]);
            $id =$item->id;
            Cart::findOrFail($id)->delete($id);
        }

        return redirect()->route('pendingorder')->with('message','Congratulations! Your Order Placed successfully.');


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