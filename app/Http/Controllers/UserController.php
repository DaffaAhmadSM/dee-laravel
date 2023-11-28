<?php

namespace App\Http\Controllers;

use App\Models\ItemPurchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('user.profile', [
            'title' => 'User Profile',
            'active' => 'profile',
            'user' => auth()->user()
        ]);
    }

    public function edit(){
        $user = auth()->user();
        return view('user.edit', [
            'title' => 'Edit Profile',
            'active' => 'edit',
            'user' => $user
        ]);
    }

    public function order(Request $request){
        if(!$request->status){
            $request['status'] = 'pending';
        }
        $items = ItemPurchase::where('type', 'Sell')->where('user_id', auth()->user()->id)->with('itemDetail')->with('userDetail');
        if($request->status == 'pending'){
            $items->where('status', 'pending');
        }
        if($request->status == 'delivery'){
            $items->where('status', 'delivery');
        }
        if($request->status == 'completed'){
            $items->where('status', 'completed');
        }
        return view('user.order', [
            'title' => 'User Order',
            'active' => $request->status,
            'items' => $items->get()
        ]);
    }

    public function rent (Request $request){
        if(!$request->status){
            $request['status'] = 'pending';
        }
        $items = ItemPurchase::where('type', 'Rent-dp')->where('user_id', auth()->user()->id)->with('itemDetail')->with('userDetail')->with('cartDetail');
        if($request->status == 'pending'){
            $items->where('status', 'pending');
        }
        if($request->status == 'delivery'){
            $items->where('status', 'delivery');
        }
        if($request->status == 'on-rent'){
            $items->where('status', 'on-rent');
        }
        if($request->status == 'completed'){
            $items->where('status', 'completed');
        }
        return view('user.rent', [
            'title' => 'User Rent',
            'active' => $request->status,
            'items' => $items->get()
        ]);
    }

    public function rentReserveHalfPaid(Request $request){
        $items = ItemPurchase::where('payment_status', 'half-paid')->where([['status', "!=", 'pending'], ['status', "!=", 'on-pickup']])->where('user_id', auth()->user()->id)->with('itemDetail')->with('userDetail')->with('cartDetail');
        return view('user.half-paid', [
            'title' => 'Order Confirm',
            'active' => 'rent-reserve-half-paid',
            'items' => $items->get()
        ]);
    }

    public function paymentMethod($id){
        return view('user.payment-method', [
            'title' => 'Payment Method',
            'active' => 'payment-method',
            'user' => auth()->user(),
            'id' => $id
        ]);
    }

    public function payHalf (Request $request, $id){
        $validator = $request->validate([
            'payment' => 'required',
        ]);
        $item = ItemPurchase::with('itemDetail')->with('userDetail')->with('cartDetail')->find($id);
        return view('user.pay-half-paid', [
            'title' => 'Pay Half Paid',
            'active' => 'pay-half-paid',
            'user' => auth()->user(),
            'payment' => $request->payment,
            'item' => $item
        ]);
    }

    public function payHalfPost (Request $request){
        $validator = $request->validate([
            'payment' => 'required',
            'id' => 'required',
        ]);
        try {
            ItemPurchase::find($request->id)->update([
                'payment_status' => 'paid',
                'payment' => $request->payment
            ]);
            return redirect('/user/rent-reserve-half-paid')->with('success', 'Payment success');
        } catch (\Throwable $th) {
            return redirect('/user/rent-reserve-half-paid')->with('error', 'Payment failed');
        }
    }

    public function pickup(Request $request){
        $items = ItemPurchase::where('user_id', auth()->user()->id)->where('status', 'on-pickup')->with('itemDetail')->with('userDetail')->with('cartDetail');
        // dd($items->get());
        return view('user.pickup', [
            'title' => 'Order Confirm',
            'active' => 'on-pickup',
            'items' => $items->get()
        ]);
    }

    public function editPost(Request $request) {
        $validator = $request->validate([
            'name' => 'max:255',
            'password' => 'confirmed',
        ]);
        if ($request->password) {
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
        }
        if (!$request->password) {
            $request->merge([
                'password' => auth()->user()->password
            ]);
        }
        try {
            User::find(auth()->user()->id)->update($request->except(['_token', 'password_confirmation']));
            return redirect('/user/profile')->with('success', 'Profile updated successfully');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/user/profile')->with('error', 'Profile failed to update');
        }
    }

    public function orderConfirmPost(Request $request, $id){
        try {
            ItemPurchase::find($id)->update([
                'status' => 'completed'
            ]);
            return redirect('/user/order?status=completed')->with('success', 'Arrival status confirmed successfully');
        } catch (\Throwable $th) {
            return redirect('/user/order')->with('error', 'failed to confirm');
        }
    }

    public function rentConfirmPost(Request $request, $id){
        try {
            ItemPurchase::find($id)->update([
                'status' => 'on-rent'
            ]);
            return redirect('/user/rent?status=on-rent')->with('success', 'Arrival status confirmed successfully');
        } catch (\Throwable $th) {
            return redirect('/user/rent')->with('error', 'failed to confirm');
        }
    }
}
