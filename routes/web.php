<?php

Route::get('/logout', function () {
	Auth::logout();
   Session::flush();
	Session::forget('url.intented');
	return redirect("/");
    
})->name('logout');

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/completeprofile', 'Dashboard\ProfileController@completeprofile');
Route::post('/dashboard/completeshop', 'Dashboard\ProfileController@finishProfile');

// settings
Route::get('/dashboard/settings/shops', 'Dashboard\SettingController@shopSetting');
Route::post('/dashboard/settings/settingsupdate', 'Dashboard\SettingController@settingsUpdate');
Route::get('/dashboard/settings/employeelist', 'Dashboard\SettingController@employee');
Route::post('/dashboard/settings/employeeadded', 'Dashboard\SettingController@employeeadded');
Route::get('/dashboard/settings/employeedelete/{id}', 'Dashboard\SettingController@employeedeleted');
Route::get('/dashboard/settings/adminsettings', 'Dashboard\SettingController@admin');
Route::post('/dashboard/settings/adminupdated', 'Dashboard\SettingController@adminupdated');
Route::post('/dashboard/settings/adminpassword', 'Dashboard\SettingController@resetpassword');
Route::post('/dashboard/settings/password', 'Dashboard\SettingController@password')->name('adminpass');
// suppliers
Route::get('/dashboard/suppliers/list', 'Dashboard\SupplierController@suppliersList');
Route::get('/dashboard/suppliers/add', 'Dashboard\SupplierController@addsuppliers');
Route::get('/dashboard/suppliers/edit/{id}', 'Dashboard\SupplierController@editsuppliers');
Route::get('/dashboard/suppliers/delete/{id}', 'Dashboard\SupplierController@deletesuppliers');
Route::post('/dashboard/suppliers/supplieradded', 'Dashboard\SupplierController@addsupplierfinish');
Route::post('/dashboard/suppliers/supplierupdated', 'Dashboard\SupplierController@updatesupplierfinish');
//stock
Route::get('/dashboard/stock/newstock', 'Dashboard\StockController@addstock');
Route::post('/dashboard/stock/stockadded', 'Dashboard\StockController@stockadded');
Route::get('/dashboard/stock/stocklist', 'Dashboard\StockController@stocklist');
Route::get('/dashboard/stock/addcategory', 'Dashboard\StockController@addcategory');
Route::post('/dashboard/stock/itemcategoryadded', 'Dashboard\StockController@addedcategory');
Route::get('/dashboard/stock/deletecategory/{id}', 'Dashboard\StockController@deletecategory');
Route::get('/dashboard/stock/emergencystock', 'Dashboard\StockController@emergencystock');
Route::get('/dashboard/stock/emergencystocksearch', 'Dashboard\StockController@emergencystocksearch');
Route::post('/dashboard/stock/emergencyupdated', 'Dashboard\StockController@emergencyupdated');
Route::get('/dashboard/stock/emergencystockreport', 'Dashboard\StockController@emergencystockreport');
Route::get('/dashboard/stock/damageitem', 'Dashboard\StockController@damageitem');
Route::get('/dashboard/stock/damageitemsearch', 'Dashboard\StockController@damageitemsearch');
Route::post('/dashboard/stock/damageitemupdated', 'Dashboard\StockController@damageitemupdated');
//customer
Route::get('/dashboard/customer/localcustomer', 'Dashboard\CustomerController@localcustomer');
Route::post('/dashboard/customer/localcustomeradded', 'Dashboard\CustomerController@addedcustomer');
Route::get('/dashboard/customer/localcustomerdelete/{id}', 'Dashboard\CustomerController@localcustomerdeleted');
Route::get('/dashboard/customer/order', 'Dashboard\CustomerController@order');
//sales
Route::get('/dashboard/sales/makesale', 'Dashboard\SalesController@makesales');
Route::get('/dashboard/sales/addingitems', 'Dashboard\SalesController@addingitems');
Route::post('/dashboard/sales/sellitems', 'Dashboard\SalesController@sellitems');
Route::get('/dashboard/sales/makesaleusersearch', 'Dashboard\SalesController@makesaleusersearch');
Route::get('/dashboard/sales/salelist', 'Dashboard\SalesController@salelist');
Route::get('/dashboard/sales/view/{id}', 'Dashboard\SalesController@view');
//account
Route::get('/dashboard/account/voucher', 'Dashboard\AccountController@voucher');
Route::get('/dashboard/account/income', 'Dashboard\AccountController@income');
Route::post('/dashboard/account/incomeadded', 'Dashboard\AccountController@incomeadded');
Route::post('/dashboard/account/voucheradded', 'Dashboard\AccountController@voucheradded');

////////////eCommerce
Route::get('/shop', 'Ecommerce\ProductListController@shop')->name('shop');
Route::get('/domain/{id}', 'Ecommerce\ProductListController@domain');

//ProductList
Route::get('/shop/productlist', 'Ecommerce\ProductListController@allproduct')->name('shopitemlist');
Route::get('/shop/productlist/{id}', 'Ecommerce\ProductListController@productcategory')->name('shopitemlistcategory');
Route::get('/shop/product/{id}', 'Ecommerce\ProductListController@itemview');
//cart
Route::get('/shop/cart/addtocart/{id}', 'Ecommerce\CartController@addtocart');
Route::get('/shop/cart/addtocartitem/{id}', 'Ecommerce\CartController@addtocartitem');
Route::get('/shop/cart/cartlist', 'Ecommerce\CartController@cartlist');
Route::get('/shop/cart/clear', 'Ecommerce\CartController@clearcart');

//user
Route::get('/shop/user/login', 'Ecommerce\UserController@loginsignup');
Route::get('/shop/user/orderlist', 'Ecommerce\UserController@orderlist');
Route::post('/shop/user/logged', ['uses' => 'Ecommerce\UserController@login', 'as'=> 'shoplogin']);
Route::post('/shop/user/useradded', 'Ecommerce\UserController@useradded')->name('signupshop');
Route::get('/shop/user', 'Ecommerce\UserController@user');
Route::get('/shop/user/shippingaddress', 'Ecommerce\UserController@shippingaddress');
Route::post('/shop/user/updated', 'Ecommerce\UserController@userupdated');

//checkout
Route::get('/shop/cart/checkouts', 'Ecommerce\CheckoutController@cartlist');
Route::post('/shop/cart/storecheckout', 'Ecommerce\CheckoutController@store');
