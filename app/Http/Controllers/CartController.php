<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ItemList;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartSell(ItemList $ItemList){
        
        return view('cart.cart-to-sell',[
            'title' => 'Add to Cart',
            'active' => 'add-to-cart',
            'item' => $ItemList
        ]);
    }

    public function cartReserve(ItemList $ItemList){
        return view('cart.cart-to-reserve',[
            'title' => 'Add to Cart',
            'active' => 'add-to-cart',
            'item' => $ItemList
        ]);
    }

    public function cartRent(ItemList $ItemList){
        return view('cart.cart-to-rent',[
            'title' => 'Add to Cart',
            'active' => 'add-to-cart',
            'item' => $ItemList
        ]);
    }

    public function cartSellPost($id, Request $request){
        $validator = $request->validate([
            'quantity' => 'required|numeric|min:1',
            'total_price' => 'required|numeric|min:1'
        ]);

        try {
            Cart::create([
                'item_list_id' => $id,
                'user_id' => auth()->user()->id,
                'quantity' => $request->quantity,
                'total_price' => $request->total_price,
            ]);
        } catch (\Throwable $th) {
            return redirect('/for-sell')->with('error', 'add to cart failed');
        }
        


        return redirect('/for-sell')->with('success', 'Item added to cart');
    }

    public function cartReservePost(Request $request, $id){
        $validator = $request->validate([
            'quantity' => 'required|numeric|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date'
        ]);

        try {
            Cart::create([
                'item_list_id' => $id,
                'user_id' => auth()->user()->id,
                'quantity' => $request->quantity,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'type' => 'Reserve'
            ]);
        } catch (\Throwable $th) {
            return redirect('/for-sell')->with('error', 'add to cart failed');
        }
        


        return redirect('/for-sell')->with('success', 'Item added to cart');

    }

    public function cartRentPost(Request $request, $id){
        $validator = $request->validate([
            'quantity' => 'required|numeric|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_price' => 'required|numeric|min:1'
        ]);
        try {
            Cart::create([
                'item_list_id' => $id,
                'user_id' => auth()->user()->id,
                'quantity' => $request->quantity,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_price' => $request->total_price,
                'down_payment' => $request->total_price / 2,
                'type' => 'Rent-dp'
            ]);
        } catch (\Throwable $th) {
            return redirect('/for-rent')->with('error', 'add to cart failed');
        }
        


        return redirect('/for-rent')->with('success', 'Item added to cart');
    }

    public function cartSellRentView(){
        $user_cart_sell = Cart::where('user_id', auth()->user()->id)->where('type', "Sell")->where('status', 'pending')->with('item')->get();
        $user_cart_rent = Cart::where('user_id', auth()->user()->id)->where('type', "Rent-dp")->where('status', 'pending')->with('item')->get();
        return view('cart.cart-view',[
            'title' => 'Cart',
            'active' => 'cart',
            'user_carts_sell' => $user_cart_sell,
            'user_carts_rent' => $user_cart_rent
        ]);
    }

    public function cartDelete($id){
        try {
            Cart::where('id', $id)->where('user_id', auth()->user()->id)->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Item not deleted from cart');
        }
        return redirect()->back()->with('success', 'Item deleted from cart');
    }
}
