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
Route::get('menu/mycart',"AccomodationController@showCart");
Route::get('menu/clearcart',"AccomodationController@clearCart");
Route::any('/search',"AccomodationController@search");
Route::get('/menu/categories/{id}',"CategoryController@findItems");
Route::post('/addToCart/{id}',"AccomodationController@addToCart");
Route::patch('/menu/mycart/{id}/changeQty',"AccomodationController@updateCart");
Route::delete('menu/mycart/{id}/delete',"AccomodationController@deleteCart");
Route::get('menu/{id}',"AccomodationController@GalleryDetails");


Route::middleware("auth")->group(function () {
	Route::get('/menu/borrow',"AccomodationController@showBorrowForm");
	Route::get('/menu/borrow/checkout',"AccomodationController@checkout");
	Route::get('/orders',"AccomodationController@showOrders");
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
