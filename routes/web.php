<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/error',function(){
	return view ('error');
});

Route::get('/borrow',function(){
	return view ('/cart.confirmation');
});

Route::get('/gallery', "AccomodationController@showGallery");
Route::any('/search',"AccomodationController@search");
Route::get('/admin/orders',"AccomodationController@showAdminOrderDetails");
Route::get('/menu/categories/{id}',"CategoryController@findItems");


Route::middleware("auth")->group(function () {
	Route::get('menu/clearcart',"AccomodationController@clearCart");
	Route::get('menu/mycart',"AccomodationController@showCart");
	Route::get('/menu/borrow',"AccomodationController@showBorrowForm");

	// Route::post('/menu/borrow/date',"AccomodationController@saveDate");

	Route::post('/menu/borrow/checkout',"AccomodationController@checkout");
	Route::get('/user/orders',"AccomodationController@showUserOrderDetails");
	Route::any('/user/orders/search',"AccomodationController@userOrdersSearch");
	Route::get('/menu/add',"AccomodationController@showAddItemForm");

	Route::get('/user/orders/cancel/{id}', "AccomodationController@ordersCancel");
	Route::get('/user/orders/return/{id}', 'AccomodationController@ordersReturn');
	
	Route::get('menu/{id}',"AccomodationController@GalleryDetails");
	Route::patch('/menu/mycart/{id}/changeQty',"AccomodationController@updateCart");
	Route::delete('menu/mycart/{id}/delete',"AccomodationController@deleteCart");
	Route::post('/addToCart/{id}',"AccomodationController@addToCart");
	Route::delete('/menu/{id}/delete',"AccomodationController@deleteItem");

	Route::get('/myprofile/{id}',"AccomodationController@showEditProfileForm");
	Route::patch('/myprofile/{id}',"AccomodationController@saveMoNgaAko");
});

// if(Auth::user()->role_id == 1){
// 	Route::get('/restore',"AccomodationController@showDeletedItem");
// }else{
// 	return view('return');
// }

Route::middleware("admin")->group(function (){
	Route::get('/menu/add',"AccomodationController@showAddItemForm");
	Route::post('/menu/add',"AccomodationController@saveItems");
	Route::get('/category',"AccomodationController@showAddCategoryForm");
	Route::post('/category',"AccomodationController@saveCategoryForm");
	Route::get('/restore',"AccomodationController@showDeletedItem");
	Route::any('/admin/orders/search',"AccomodationController@adminOrdersSearch");
	// Route::get('/user', "RoleController@userAdminPage");
	Route::get('/admin/orders/approve/{id}', 'AccomodationController@ordersApprove');
	Route::get('/admin/orders/reject/{id}', 'AccomodationController@ordersReject');
	Route::get('/admin/orders/confirm/{id}', 'AccomodationController@ordersConfirm');
	Route::get('/menu/{id}/edit',"AccomodationController@showEditForm");
	Route::patch('/menu/{id}/edit',"AccomodationController@editItem");
	Route::delete('/menu/{id}/permanentlydelete',"AccomodationController@permanentlyDeleteItem");
	Route::get('/menu/{id}/restore',"AccomodationController@restoreItem");
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
