<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Frontend
Route::get('/', 'App\Http\Controllers\Frontend\FrontendController@index');
Route::get('/about-us', 'App\Http\Controllers\Frontend\FrontendController@aboutUs')->name('about.us');
Route::get('/contact-us', 'App\Http\Controllers\Frontend\FrontendController@contactUs')->name('contact.us');
Route::post('/communicate/user', 'App\Http\Controllers\Frontend\FrontendController@communicateUser')->name('user.communicate');
Route::get('/shopping/cart', 'App\Http\Controllers\Frontend\FrontendController@shoppingCart')->name('shopping.cart');
Route::get('/product/all', 'App\Http\Controllers\Frontend\FrontendController@allProduct')->name('products.list');
Route::get('/product/category/{category_id}', 'App\Http\Controllers\Frontend\FrontendController@categoryWiseProduct')->name('category.wise.product');
Route::get('/product/brand/{brnad_id}', 'App\Http\Controllers\Frontend\FrontendController@brnadWiseProduct')->name('brand.wise.product');
Route::get('/single/product/details/{slug}', 'App\Http\Controllers\Frontend\FrontendController@singleProductDetails')->name('single.product.detials.info');
Route::post('/product/search', 'App\Http\Controllers\Frontend\FrontendController@productSearch')->name('product.search');
Route::get('/get-product', 'App\Http\Controllers\Frontend\FrontendController@getProduct')->name('get.product');

//Cart Route
Route::post('/add-to-cart', 'App\Http\Controllers\Frontend\CartController@inserCart')->name('insert.cart');
Route::get('/show-cart', 'App\Http\Controllers\Frontend\CartController@showCart')->name('show.cart');
Route::post('/update-cart', 'App\Http\Controllers\Frontend\CartController@updateCart')->name('update.cart');
Route::get('/delete-cart/{rowId}', 'App\Http\Controllers\Frontend\CartController@deleteCart')->name('delete.cart');

//Customer login and checkout Route
Route::get('/customer-login', 'App\Http\Controllers\Frontend\CheckoutController@loginCustomer')->name('customer.login');
Route::get('/customer-signup', 'App\Http\Controllers\Frontend\CheckoutController@signupCustomer')->name('customer.signup');
Route::post('/signup-store', 'App\Http\Controllers\Frontend\CheckoutController@signupStore')->name('signup.store');
Route::get('/email-verify', 'App\Http\Controllers\Frontend\CheckoutController@emailVerify')->name('verify.email');
Route::post('/verify-store', 'App\Http\Controllers\Frontend\CheckoutController@verifyStore')->name('verify.store');
Route::get('/customer-checkout', 'App\Http\Controllers\Frontend\CheckoutController@customerCheckout')->name('customer.checkout');
Route::post('/customer-checkout-store', 'App\Http\Controllers\Frontend\CheckoutController@customerCheckoutStore')->name('customer.checkout.store');

Auth::routes();

//Customer Deshboard
Route::group(['middleware' => ['auth', 'customer']], function(){
    Route::get('/dashboard', 'App\Http\Controllers\Frontend\DashboardController@dashboard')->name('dashboard');
    Route::get('/customer-edit-profile', 'App\Http\Controllers\Frontend\DashboardController@editProfile')->name('customer.edit.profile');
    Route::post('/customer-update-profile', 'App\Http\Controllers\Frontend\DashboardController@updateProfile')->name('customer.profile.update');
    Route::get('/customer-password-edit', 'App\Http\Controllers\Frontend\DashboardController@editPassword')->name('customer.password.edit');
    Route::post('/customer-password-update', 'App\Http\Controllers\Frontend\DashboardController@updatePassword')->name('customer.password.update');
    Route::get('/customer-payment', 'App\Http\Controllers\Frontend\DashboardController@customerPayment')->name('customer.payment');
    Route::post('/customer-payment-store', 'App\Http\Controllers\Frontend\DashboardController@customerPaymentStore')->name('customer.payment.store');
    Route::get('/customer-order-list', 'App\Http\Controllers\Frontend\DashboardController@customerOrderList')->name('customer.order.list');
    Route::get('/customer-order-details/{id}', 'App\Http\Controllers\Frontend\DashboardController@customerOrderDetails')->name('customer.order.details');
    Route::get('/customer-order-print/{id}', 'App\Http\Controllers\Frontend\DashboardController@customerOrderPrint')->name('customer.order.print');
});


Route::group(['middleware' => ['auth', 'admin']], function(){
    //Admin Dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::prefix('users')->group(function(){
        Route::get('/view', 'App\Http\Controllers\Backend\UserController@view')->name('users.view');
        Route::get('/add', 'App\Http\Controllers\Backend\UserController@add')->name('users.add');
        Route::post('/store', 'App\Http\Controllers\Backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\UserController@edit')->name('users.edit');
        Route::put('/update/{id}', 'App\Http\Controllers\Backend\UserController@update')->name('users.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\UserController@delete')->name('users.delete');
    });

    Route::prefix('profiles')->group(function(){
        Route::get('/view', 'App\Http\Controllers\Backend\ProfileController@view')->name('profile.view');
        Route::get('/edit', 'App\Http\Controllers\Backend\ProfileController@edit')->name('profile.edit');
        Route::post('/update', 'App\Http\Controllers\Backend\ProfileController@update')->name('profile.update');
        Route::get('/change/password', 'App\Http\Controllers\Backend\ProfileController@changePassword')->name('profile.password.change');
        Route::post('/password/update', 'App\Http\Controllers\Backend\ProfileController@changePasswordUpdate')->name('profile.password.update');
    });


    Route::prefix('logo')->group(function(){
        Route::get('/view', 'App\Http\Controllers\Backend\LogoController@view')->name('logo.view');
        Route::get('/add', 'App\Http\Controllers\Backend\LogoController@add')->name('logo.add');
        Route::post('/store', 'App\Http\Controllers\Backend\LogoController@store')->name('logo.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\LogoController@edit')->name('logo.edit');
        Route::put('/update/{id}', 'App\Http\Controllers\Backend\LogoController@update')->name('logo.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\LogoController@delete')->name('logo.delete');
    });


    Route::prefix('slider')->group(function(){
        Route::get('/view', 'App\Http\Controllers\Backend\SliderController@view')->name('slider.view');
        Route::get('/add', 'App\Http\Controllers\Backend\SliderController@add')->name('slider.add');
        Route::post('/store', 'App\Http\Controllers\Backend\SliderController@store')->name('slider.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\SliderController@edit')->name('slider.edit');
        Route::put('/update/{id}', 'App\Http\Controllers\Backend\SliderController@update')->name('slider.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\SliderController@delete')->name('slider.delete');
    });


    Route::prefix('contacts')->group(function(){
        Route::get('/view', 'App\Http\Controllers\Backend\ContactsController@view')->name('contacts.view');
        Route::get('/add', 'App\Http\Controllers\Backend\ContactsController@add')->name('contacts.add');
        Route::post('/store', 'App\Http\Controllers\Backend\ContactsController@store')->name('contacts.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ContactsController@edit')->name('contacts.edit');
        Route::put('/update/{id}', 'App\Http\Controllers\Backend\ContactsController@update')->name('contacts.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\ContactsController@delete')->name('contacts.delete');
        Route::get('/communicate', 'App\Http\Controllers\Backend\ContactsController@allCommunicateShow')->name('contacts.communicate');
        Route::get('/communicate/{id}', 'App\Http\Controllers\Backend\ContactsController@deleteCommunicate')->name('contacts.communicate.delete');
    });


    Route::prefix('abouts')->group(function(){
        Route::get('/view', 'App\Http\Controllers\Backend\AboutController@view')->name('abouts.view');
        Route::get('/add', 'App\Http\Controllers\Backend\AboutController@add')->name('abouts.add');
        Route::post('/store', 'App\Http\Controllers\Backend\AboutController@store')->name('abouts.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\AboutController@edit')->name('abouts.edit');
        Route::put('/update/{id}', 'App\Http\Controllers\Backend\AboutController@update')->name('abouts.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\AboutController@delete')->name('abouts.delete');
    });


    Route::prefix('categories')->group(function(){
        Route::get('/view', 'App\Http\Controllers\Backend\CategoryController@view')->name('categories.view');
        Route::get('/add', 'App\Http\Controllers\Backend\CategoryController@add')->name('categories.add');
        Route::post('/store', 'App\Http\Controllers\Backend\CategoryController@store')->name('categories.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\CategoryController@edit')->name('categories.edit');
        Route::put('/update/{id}', 'App\Http\Controllers\Backend\CategoryController@update')->name('categories.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\CategoryController@delete')->name('categories.delete');
    });


    Route::prefix('brand')->group(function(){
        Route::get('/view', 'App\Http\Controllers\Backend\BrandController@view')->name('brand.view');
        Route::get('/add', 'App\Http\Controllers\Backend\BrandController@add')->name('brand.add');
        Route::post('/store', 'App\Http\Controllers\Backend\BrandController@store')->name('brand.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\BrandController@edit')->name('brand.edit');
        Route::put('/update/{id}', 'App\Http\Controllers\Backend\BrandController@update')->name('brand.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\BrandController@delete')->name('brand.delete');
    });


    Route::prefix('colors')->group(function(){
        Route::get('/view', 'App\Http\Controllers\Backend\ColorController@view')->name('colors.view');
        Route::get('/add', 'App\Http\Controllers\Backend\ColorController@add')->name('colors.add');
        Route::post('/store', 'App\Http\Controllers\Backend\ColorController@store')->name('colors.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ColorController@edit')->name('colors.edit');
        Route::put('/update/{id}', 'App\Http\Controllers\Backend\ColorController@update')->name('colors.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\ColorController@delete')->name('colors.delete');
    });


    Route::prefix('sizes')->group(function(){
        Route::get('/view', 'App\Http\Controllers\Backend\SizeController@view')->name('sizes.view');
        Route::get('/add', 'App\Http\Controllers\Backend\SizeController@add')->name('sizes.add');
        Route::post('/store', 'App\Http\Controllers\Backend\SizeController@store')->name('sizes.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\SizeController@edit')->name('sizes.edit');
        Route::put('/update/{id}', 'App\Http\Controllers\Backend\SizeController@update')->name('sizes.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\SizeController@delete')->name('sizes.delete');
    });


    Route::prefix('products')->group(function(){
        Route::get('/view', 'App\Http\Controllers\Backend\ProductController@view')->name('products.view');
        Route::get('/add', 'App\Http\Controllers\Backend\ProductController@add')->name('products.add');
        Route::post('/store', 'App\Http\Controllers\Backend\ProductController@store')->name('products.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ProductController@edit')->name('products.edit');
        Route::put('/update/{id}', 'App\Http\Controllers\Backend\ProductController@update')->name('products.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\ProductController@delete')->name('products.delete');
        Route::get('/details/{id}', 'App\Http\Controllers\Backend\ProductController@details')->name('products.details');
    });


    Route::prefix('customers')->group(function(){
        Route::get('/view', 'App\Http\Controllers\Backend\CustomerController@view')->name('customers.view');
        Route::get('/draft-view', 'App\Http\Controllers\Backend\CustomerController@draftView')->name('customers.draft.view');
        Route::get('/customer-draft-delete/{id}', 'App\Http\Controllers\Backend\CustomerController@customerDraftDelete')->name('customers.draft.delete');
    });


    Route::prefix('orders')->group(function(){
        Route::get('/pending/list', 'App\Http\Controllers\Backend\OrderController@pendingList')->name('orders.pending.list');
        Route::get('/approved/list', 'App\Http\Controllers\Backend\OrderController@approvedList')->name('orders.approved.list');
        Route::get('/details/{id}', 'App\Http\Controllers\Backend\OrderController@detials')->name('orders.details');
        Route::post('/order-approved', 'App\Http\Controllers\Backend\OrderController@orderApproved')->name('order.approved');
    });
});
