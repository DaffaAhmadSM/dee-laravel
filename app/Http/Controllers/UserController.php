<?php

namespace App\Http\Controllers;

use App\Models\ItemPurchase;
use App\Models\Renewal;
use App\Models\User;
use Carbon\Carbon;
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
    public function reservation (Request $request){
        if(!$request->status){
            $request['status'] = 'pending';
        }
        $items = ItemPurchase::where('type', 'Reserve-dp')->where('user_id', auth()->user()->id)->with('itemDetail')->with('userDetail')->with('cartDetail');
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
        return view('user.reserve', [
            'title' => 'User Rent',
            'active' => $request->status,
            'items' => $items->get()
        ]);
    }

    public function rentReserveHalfPaid(Request $request){
        $items = ItemPurchase::where('payment_status', 'half-paid')->where('user_id', auth()->user()->id)->with('itemDetail')->with('userDetail')->with('cartDetail');
        $renewal = Renewal::where('status', 'renewed')->where('user_id', auth()->user()->id)->with('itemDetail')->with('userDetail')->with('cartDetail')->with('itemPurchaseDetail');
        return view('user.half-paid', [
            'title' => 'Order Confirm',
            'active' => 'rent-reserve-half-paid',
            'items' => $items->get(),
            'renewal' => $renewal->get()
        ]);
    }

    public function renewal(Request $request){
        if(!$request->status){
            $request['status'] = 'on-rent';
            $items = ItemPurchase::where('status', 'on-rent')->where('user_id', auth()->user()->id)->with('itemDetail')->with('userDetail')->with('cartDetail');
        }
        if($request->status == 'on-rent'){
            $items = ItemPurchase::where('status', 'on-rent')->where('user_id', auth()->user()->id)->with('itemDetail')->with('userDetail')->with('cartDetail');
        }
        if($request->status == 'pending'){
            $items = Renewal::where('status', 'pending')->where('user_id', auth()->user()->id)->with('itemDetail')->with('userDetail')->with('cartDetail');
        }
        if($request->status == 'renewed'){
            $items = Renewal::where('status', 'renewed')->where('user_id', auth()->user()->id)->with('itemDetail')->with('userDetail')->with('cartDetail');
        }
        return view('user.renewal', [
            'title' => 'Renewal',
            'active' => $request->status,
            'items' => $items->get()
        ]);
    }

    public function renewalConfirm($id){
        $item = ItemPurchase::with('itemDetail')->with('userDetail')->with('cartDetail')->find($id);
        return view('user.renewal-confirm', [
            'title' => 'Renewal Confirm',
            'active' => 'renewal',
            'user' => auth()->user(),
            'item' => $item
        ]);
    }

    public function renewalConfirmPost(Request $request, $id){
        $validator = $request->validate([
            'renewal_date' => 'required'
        ]);
        $item = ItemPurchase::with('cartDetail')->with('itemDetail')->find($id);
        $end = Carbon::parse($item->cartDetail->end_date);
        $renewal_date = Carbon::parse($request->renewal_date);

        $diff = $end->diffInDays($renewal_date);

        $total_price = $item->itemDetail->price * $diff;
        try {
            Renewal::create([
                'user_id' => auth()->user()->id,
                'item_list_id' => $item->itemDetail->id,
                'item_purchase_id' => $item->id,
                'cart_id' => $item->cart_id,
                'renewal_date' => $request->renewal_date,
                'price_total' => $total_price,
                'down_payment' => $total_price/2,
                'status' => 'pending'
            ]);
            return redirect('/user/renewal?status=pending')->with('success', 'Renewal requested successfully');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/user/renewal')->with('error', 'failed to request renewal');
        }
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

    public function reservationConfirmPost(Request $request, $id){
        try {
            ItemPurchase::find($id)->update([
                'status' => 'on-rent'
            ]);
            return redirect('/user/reservation?status=on-rent')->with('success', 'Arrival status confirmed successfully');
        } catch (\Throwable $th) {
            return redirect('/user/reservation')->with('error', 'failed to confirm');
        }
    }
}
