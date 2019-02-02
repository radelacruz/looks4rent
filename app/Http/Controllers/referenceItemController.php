<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\Category;
use Auth;
use Session;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // public function showItems(){
    // 	$items = Item::all();
    // 	return view('items.catalog',compact('items'));
    // }
    public function showItems(){
    	$categories = Category::all();
    	$items = Item::all();
    	return view('items.catalog',compact("items"));
    }
    public function itemDetails($id){
    	$item = Item::find($id);
    	return view('items.item_details',compact("item"));
    }

    public function showAddItemForm(){
    	$categories = Category::all();
    	return view('items.add_items', compact('categories'));
    }

    
    public function saveItems(Request $request){
    	// dd($request);
    	$rules = array(
    		"name"=>"required",
    		"description"=>"required",
    		"price"=>"required:numeric",
    		'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    	);
    	// to validate
    	$this->validate($request,$rules);
    	// if validation fails, it would not proceed to the next step
    	$item = new Item;
    	$item->name = $request->name;
    	$item->description = $request->description;
    	$item->price = $request->price;
    	$item->category_id = $request->category;

    	$image = $request->file('image');
    	$image_name = time(). "." .$image->getClientOriginalExtension();
    	$destination = "images/"; 
    	$image->move($destination, $image_name);

    	$item->image_path = $destination.$image_name;
    	$item->save();
    	Session::flash("success_message","Item added successfully");
    	return redirect('/catalog');
    }

    public function deleteItem($id){
    	$item = Item::find($id);
      	$item->delete();
      	Session::flash("success_message","Item successfully deleted");
    	return redirect("/catalog");
    }

    public function showEditForm($id){
    	$item = Item::find($id);
    	$categories = Category::all();
    	return view("items.edit_form", compact(["categories", "item"]));
    }

    public function editItem($id, Request $request){
    	$item = Item::find($id);

    	$rules = array(
    		"name"=>"required",
    		"description"=>"required",
    		"price"=>"required:numeric",
    		'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    	);
    	$this->validate($request,$rules);

    	$item->name = $request->name;
    	$item->description = $request->description;
    	$item->price = $request->price;
    	$item->category_id = $request->category;

    	if($request->file('image')!=null){
    		$image = $request->file('image');
	    	$image_name = time(). "." .$image->getClientOriginalExtension();
	    	$destination = "images/"; 
	    	$image->move($destination, $image_name);
	    	$item->image_path = $destination.$image_name;
    	}
    	$item->save();
    	Session::flash("edit_message","Item updated successfully");
    	return redirect("/menu/$id");
    }

    public function addToCart($id, Request $request){
    	// if there is an existing cart, get it, if none, initialize it
    	if(Session::has('cart')){
    		$cart = Session::get('cart');
    	} else {
    		$cart = [];
    	}

    	// if item in cart already has quantity, add to it, if none, assign to quantity
    	if(isset($cart[$id])){
    		$cart[$id] += $request->quantity;
    	} else{
    		$cart[$id] = $request->quantity;
    	}

    	// put the cart in a session
    	Session::put('cart',$cart); //this is the traditional session
    	// dd(Session::get('cart'));
    	$item = Item::find($id);
    	Session::flash("success_cart","$request->quantity of $item->name has been successfully added to your cart");
    	// return redirect("/catalog");
    	return array_sum($cart);
    }

    public function showCart(){
    	$item_cart=[];
    	if(Session::has('cart')){
    		$cart = Session::get('cart');
    		$total = 0;
    		foreach ($cart as $id => $quantity) {
    			$item = Item::find($id);
    			$item->quantity = $quantity;
    			$item->subtotal = $item->price * $quantity;
    			// at this point, each element of the $item has an id, name, description, price, image_path, category_id and quantity, subtotal
    			// quantity and subtotal DO NOT EXIST on the database, but it exists for $item
    			// dd($item);
    			$total += $item->subtotal;
    			// we push $item array. (array-pushing)
    			$item_cart[] = $item;
    		}
    		// dd($item_cart);
    	}

    	return view("items.cart_content", compact("item_cart", 'total'));
    }

    public function deleteCart($id){
    	// we want to remove the specific id in the Session 'cart'
    	Session::forget("cart.$id"); //this is the same as cart['$id'] 
    	return redirect("/menu/mycart");
    }

    public function clearCart(){
    	// we want to remove the specific id in the Session 'cart'
    	Session::forget("cart"); //this is the same as cart['$id'] 
    	return redirect("/menu/mycart");
    } 

    public function updateCart($id, Request $request){
    	$cart = Session::get("cart");
    	$cart[$id] = $request->new_qty;
    	Session::put('cart',$cart);
    	return redirect("/menu/mycart");

    }

    public function checkout(){
        $order = new Order;
        // we need to make sure that the user that's trying to checkkout is logged in, else, we would encounter an error with Auth::user
        $order->user_id = Auth::user()->id;
        $order->total=0;
        $order->status_id = 1; //all orders should have a default status pending
        //create a new order
        $order->save();

        // link items to the order
        $total=0;
        foreach(Session::get('cart') as $item_id => $quantity){
            // dd(Session::get('cart'));


            // items() -> attach() is a function that allows us to insert the item to the item_order table for that specific order_id along with any other columns that we want to include, in this case the quantity column

            $order->items()->attach($item_id,['quantity'=>$quantity]);
            //attach means to insert to the pivot table
            //syntax attach(yung other fk,[other columns we want to include in the associative array])

            //update order total
            $item = Item::find($item_id);
            $total += $item->price * $quantity;
        }
        //save the total to the current order

        $order->total = $total;
        $order->save();

        //remove the current seession cart and return to the catalog
        Session::forget('cart');
        return redirect('/catalog');

    }


    public function showOrders(){
        // SELECT * FROM orders WHERE user_id = the id of the current user_id
        // ->get(), runs the get query
        $orders = Order::where("orders.user_id",Auth::user()->id)->get();
        // $item = Item::find($id);

        return view("items.order_details",compact("orders"));
    }

    public function restoreItem($id){
        $item = Item::withTrashed()->find($id);
        //we need to use withTrashed to include "soft-deleted" items in the query
        $item->restore();
        return redirect('/catalog');
    }



}
