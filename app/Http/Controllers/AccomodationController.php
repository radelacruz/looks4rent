<?php

namespace App\Http\Controllers;

use App\Accomodation;
use App\Order;
use App\User;
use App\Category;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function showGallery(){
        $categories = Category::all();
        $details = Accomodation::all();
        return view('gallery.gallery',compact("details"));
    }

    public function GalleryDetails($id){
        $item = Accomodation::find($id);
        return view('gallery.gallery_details',compact("item"));
    }

    public function showAddItemForm(){
        $categories = Category::all();
        return view('gallery.add_item',compact("categories"));
    }


    public function saveItems(Request $request){
        $rules = array(
            "name" => "required",
            "description" => "required",
            "quantity" => "required:numeric",
            "available" => "required:numeric",
            "price" => "required:numeric",
            "deposit" => "required:numeric",
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        );

        $this->validate($request,$rules);
        $item = new Accomodation;

        $item->name=$request->name;
        $item->description=$request->description;
        $item->quantity=$request->quantity;
        $item->available=$request->available;
        $item->price=$request->price;
        $item->deposit=$request->deposit;
        $item->category_id=$request->category;

        $image = $request->file('image');
        $image_name = time(). "." .$image->getClientOriginalExtension();
        $destination = "images/"; 
        $image->move($destination, $image_name);

        $item->image_path = $destination.$image_name;
        $item->save();
        Session::flash("success_message","Item added successfully");
        return redirect('/gallery');
    }


    public function showEditForm($id){
        $item = Accomodation::find($id);
        $categories = Category::all();
        return view('gallery.edit_item',compact("item","categories"));
    }

    public function editItem($id, Request $request){
        $item = Accomodation::find($id);

        $rules = array(
            "name" => "required",
            "description" => "required",
            "quantity" => "required:numeric",
            "available" => "required:numeric",
            "price" => "required:numeric",
            "deposit" => "required:numeric",
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        );

        $this->validate($request,$rules);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->quantity = $request->quantity;
        $item->available = $request->available;
        $item->price = $request->price;
        $item->deposit = $request->deposit;
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

    public function showAddCategoryForm(){
        return view('admin.category');
    }

    public function saveCategoryForm(Request $request){
        $rules = array(
            "name" => "required"
        );

        $this->validate($request,$rules);
        $item = new Category;

        $item->name=$request->name;
        $item->save();
        Session::flash("success_message","Category added successfully");
        return redirect('/category');
    }
    public function deleteItem($id){
        $item = Accomodation::find($id);
        $item->delete();

        Session::flash("success_message","Item successfully deleted");
        return redirect('/gallery');
    }

    public function showDeletedItem(){
        $item = Accomodation::onlyTrashed()->get();
        return view('gallery.restore_item',compact("item"));
    }

    public function restoreItem($id){
        $item = Accomodation::withTrashed()->find($id);
        $item->restore();
        Session::flash("success_message","Item successfully restored");
        return redirect('/restore');
    }

    public function permanentlyDeleteItem($id){
    $item = Accomodation::withTrashed()->find($id);
    $item->forceDelete();
    Session::flash("success_message","Item successfully deleted");
    return redirect('/restore');
    }

    public function addToCart($id, Request $request){
        // $items = Accomodation::all();
        if(Session::has('cart')){
            $cart = Session::get('cart');
        } else{
            $cart = [];
        }

        if(isset($cart[$id])){
            $cart[$id]+=$request->quantity;
        }else{
            $cart[$id]=$request->quantity;
        }

        Session::put('cart',$cart);
        $item = Accomodation::find($id);

        Session::flash("success_message","$request->quantity of $item->name has been successfully added to your cart");
        return redirect('/gallery');
        return array_sum($cart);
    }

    public function showCart(){
        $item_cart = [];
        $total = 0;
        if(Session::has('cart')){
            $cart = Session::get('cart');
            foreach ($cart as $id => $quantity) {
                $item = Accomodation::find($id);
                $item->quantity = $quantity;
                $item->subtotal = $item->price * $quantity + $item->deposit;
                $total += $item->subtotal;
                $item_cart[] = $item;
            }
        }
        return view('gallery.cart',compact("item_cart","total"));
    }

    public function updateCart($id, Request $request){
        $cart = Session::get("cart");
        $cart[$id] = $request->new_qty;
        Session::put('cart',$cart);
        return redirect("/menu/mycart");

    }
    public function deleteCart($id){
        Session::forget("cart.$id");
        return redirect("/menu/mycart");
    }
    public function clearCart(){
        Session::forget("cart");
        return redirect("/menu/mycart");
    }


    public function showBorrowForm(){
        $user = User::all();
        $order = Order::all();
        $item_cart = [];
        $total = 0;
        if(Session::has('cart')){
            $cart = Session::get('cart');
            foreach ($cart as $id => $quantity) {
                $item = Accomodation::find($id);
                $item->quantity = $quantity;
                $item->subtotal = $item->price * $quantity + $item->deposit;
                $total += $item->subtotal;
                $item_cart[] = $item;
            }
        }
        return view('cart.checkout',compact("item_cart","total","user","order"));
    }

    // public function showBorrowForm(){
    //     $user = User::all();
    //     $order = Order::all();
    //     return view('cart.borrow_form',compact("user","order"));
    // }



    public function checkout() {
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->total=0;
        $order->transaction_code=0;
        $order->status_id = 1; 
        $order->save();
        $total=0;
        foreach(Session::get('cart') as $item_id => $quantity) {
            $order->accomodations()->attach($item_id, ['quantity'=>$quantity]);
            $item = Accomodation::find($item_id);
            $total += $item->price * $quantity;
        }
        $order->total = $total;
        $latestOrder = Order::orderBy('created_at','DESC')->first();
        $order->transaction_code = 'Looks4Rent-'.time().'-'.str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);
        $order->save();

        Session::forget('cart');
        return view('cart.confirmation',compact("order"));
    }


    public function showOrders(){
        $orders = Order::all();
        $users = User::all();
        return view('gallery.orders',compact('orders','users'));
        // $orders = Order::where("orders.user_id",Auth::user()->id)->get();
        // return view("gallery.orders",compact("orders"));
    }


    // public function showOrders(){


        // $user = User::find(1);
        // $friends_votes = $user->friends()
        //     ->with('user') // bring along details of the friend
        //     ->join('votes', 'votes.user_id', '=', 'friends.friend_id')
        //     ->get(['votes.*']); // exclude extra details from friends table
    // }

// $order_query = "SELECT o.id, o.transaction_code, o.status_id, s.name AS status FROM orders o JOIN statuses s ON (o.status_id = s.id);";
// $orders = mysqli_query($conn, $order_query);
// foreach ($orders as $order)





    public function search(){

        $input = Input::get('search');
            if ($input != " ") {
                $result = Accomodation::where('id','LIKE','%'.$input.'%')
                ->orWhere('name','LIKE','%'.$input.'%')
                ->orWhere('description','LIKE','%'.$input.'%')
                // ->orWhere('middlename','LIKE','%'.$input.'%')
                ->get();

                if (count($result)>0) {
                    return view("gallery.gallery")->withDetails($result)->withQuery($input);
                }else{
                    return view("gallery.gallery")->withMessage("No Item Found!");
                }   
            }

    }


}
    // public function showGallery(){
    //     $categories = Category::all();
    //     $details = Accomodation::all();
    //     return view('gallery.gallery',compact("details"));
    // }