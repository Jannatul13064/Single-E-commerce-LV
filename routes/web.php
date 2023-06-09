<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;



//Client Side-Control

Route::controller(HomeController::class)->group(function(){
    Route::get('/','Index')->name('home');
});

Route::controller(ClientController::class)->group(function(){
    Route::get('/category/{id}/{slug}','CategoryPage')->name('category');
    Route::get('/product-details/{id}/{slug}','SingleProduct')->name('singleproduct');
    Route::get('/new-release','NewRelease')->name('newrelease');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

// Route::get('/userprofile', [DashboardController::class, 'Index']);

Route::middleware(['auth','role:user'])->group(function(){
    Route::controller(ClientController::class)->group(function(){
        Route::get('/add-to-cart','AddToCart')->name('addtocart');
        Route::post('/add-product-to-cart','AddProductToCart')->name('addproducttocart');
        Route::get('/checkout','Checkout')->name('checkout');
        Route::get('/shipping-address','ShippingAddress')->name('shippingaddress');
        Route::post('/add-shipping-address','AddShippingAddress')->name('addshippingaddress');
        Route::post('/place-order','PlaceOrder')->name('placeorder');


        Route::get('/user-profile','UserProfile')->name('userprofile');
        Route::get('/user-profile/user-pending-order','PendingOrder')->name('pendingorder');
        Route::get('/user-profile/history','History')->name('history');
        Route::get('/todays-deal','TodaysDeal')->name('todaysdeal');
        Route::get('/customer-service','CustomerService')->name('customerservice');
        Route::get('/remove-cart-item/{id}','RemoveAddToCart')->name('removeaddtocart');

    });

});

// Controller Group with Middleware
//Dashboard Controller for Super-User

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'Index')->name('allcategory');
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('/admin/storecategory', 'StoreCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}','EditCategory')->name('editcategory');
        Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}','DeleteCategory')->name('deletecategory');
    });
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/admin/all-subcategory', 'Index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/editsubcategory/{id}','EditSubCategory')->name('editsubcategory');
        Route::post('/admin/updatesubcategory/','UpdateSubCategory')->name('updatesubcategory');
        Route::get('/admin/deletesubcategory/{id}','DeleteSubCategory')->name('deletesubcategory');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-products', 'Index')->name('allproducts');
        Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
        Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
        Route::get('/admin/edit-product-img/{id}','EditProductImg')->name('editproductimg');
        Route::post('/admin/update-product-img','UpdateProductImg')->name('updateproductimg');
        Route::get('/admin/edit-product/{id}','EditProduct')->name('editproduct');
        Route::post('/admin/updateproduct/','UpdateProduct')->name('updateproduct');
        Route::get('/admin/deleteproduct/{id}','DeleteProduct')->name('deleteproduct');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pending-order', 'Index')->name('pendingorders');
        Route::get('/admin/completed-order', 'CompletedOrders')->name('completedorders');
        Route::get('/admin/cancel-order', 'CancelOrders')->name('cancelorders');
    });
});




///user Control Middleware for update their info

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
