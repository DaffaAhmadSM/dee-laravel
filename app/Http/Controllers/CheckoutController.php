<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ItemList;
use App\Models\ItemPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index($id, Request $request){
        $validate = $request->validate([
            'payment' => 'required|max:255'
        ]);
        $cart = Cart::with('item')->find($id);
        return view('checkout',[
            'title' => 'Checkout',
            'active' => 'checkout',
            'cart' => $cart,
            'payment' => $request->payment
        ]);
    }

    public function paymentMethod($id){
        $cart = Cart::find($id);
        return view('payment-method',[
            'title' => 'Payment',
            'active' => 'payment',
            'item' => $cart
        ]);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'payment' => 'required|max:255',
            'item_list_id' => 'required|integer',
            'quantity' => 'required|integer',
            'total_price' => 'required|integer',
            'cart_id' => 'required|integer',
            'type' => 'required|max:255'
        ]);
        $request['user_id'] = auth()->user()->id;
        if($request->type == 'Sell'){
            $request['payment_status'] = 'paid';
        }else{
            $request['payment_status'] = 'half-paid';
        }
        try {
            DB::beginTransaction();
            $pay = ItemPurchase::create($request->except(['_token']));
            Cart::find($request->cart_id)->update(['status' => 'paid']);
            DB::commit();
        } catch (\Throwable $th) {
            return redirect('/for-sell')->with('error', 'Checkout Failed');
        }
        return redirect('/for-sell')->with('success', 'Checkout Success');
    }
}
