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
Route::get('/gallery', "AccomodationController@showGallery");
Route::any('/search',"AccomodationController@search");
Route::get('/admin/orders',"AccomodationController@showAdminOrderDetails");
Route::get('/menu/categories/{id}',"CategoryController@findItems");
Route::get('/admin/orders/approve/{id}', 'AccomodationController@ordersApprove');
Route::get('/admin/orders/reject/{id}', 'AccomodationController@ordersReject');
Route::get('/admin/orders/confirm/{id}', 'AccomodationController@ordersConfirm');


Route::middleware("auth")->group(function () {
	Route::get('menu/clearcart',"AccomodationController@clearCart");
	Route::get('menu/mycart',"AccomodationController@showCart");
	Route::get('/menu/borrow',"AccomodationController@showBorrowForm");
	Route::get('/menu/borrow/checkout',"AccomodationController@checkout");
	Route::get('/user/orders',"AccomodationController@showUserOrderDetails");
	Route::any('/user/orders/search',"AccomodationController@userOrdersSearch");
	Route::get('/user/orders/cancel/{id}', "AccomodationController@ordersCancel");
	Route::get('/user/orders/return/{id}', 'AccomodationController@ordersReturn');
	
	Route::get('menu/{id}',"AccomodationController@GalleryDetails");
	Route::patch('/menu/mycart/{id}/changeQty',"AccomodationController@updateCart");
	Route::delete('menu/mycart/{id}/delete',"AccomodationController@deleteCart");
	Route::post('/addToCart/{id}',"AccomodationController@addToCart");
	Route::delete('/menu/{id}/delete',"AccomodationController@deleteItem");
});

// if(Auth::user()->role_id == 1){
// 	Route::get('/restore',"AccomodationController@showDeletedItem");
// }else{
// 	return view('return');
// }

Route::middleware("admin")->group(function (){
	Route::get('menu/add',"AccomodationController@showAddItemForm");
	Route::post('menu/add',"AccomodationController@saveItems");
	Route::get('/category',"AccomodationController@showAddCategoryForm");
	Route::post('/category',"AccomodationController@saveCategoryForm");
	Route::get('/restore',"AccomodationController@showDeletedItem");
	// Route::get('/user', "RoleController@userAdminPage");
	Route::get('/menu/{id}/edit',"AccomodationController@showEditForm");
	Route::patch('/menu/{id}/edit',"AccomodationController@editItem");
	Route::delete('/menu/{id}/permanentlydelete',"AccomodationController@permanentlyDeleteItem");
	Route::get('/menu/{id}/restore',"AccomodationController@restoreItem");
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
