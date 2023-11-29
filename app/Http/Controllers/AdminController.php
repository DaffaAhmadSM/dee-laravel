<?php

namespace App\Http\Controllers;

use App\Models\ItemPurchase;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function order(Request $request){
        if(!$request->status){
            $request['status'] = 'pending';
        }
        $items = ItemPurchase::where('type', 'Sell')->with('itemDetail')->with('userDetail');
        if($request->status == 'pending'){
            $items->where('status', 'pending');
        }
        if($request->status == 'delivery'){
            $items->where('status', 'delivery');
        }
        if($request->status == 'completed'){
            $items->where('status', 'completed');
        }
        return view('admin.order', [
            'title' => 'Order Confirm',
            'active' => $request->status,
            'items' => $items->get()
        ]);
    }

    public function rent(Request $request){
        if(!$request->status){
            $request['status'] = 'pending';
        }
        $items = ItemPurchase::where('type', 'Rent-dp')->with('itemDetail')->with('userDetail')->with('cartDetail');
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
        // dd($items->get());
        return view('admin.rent', [
            'title' => 'Order Confirm',
            'active' => $request->status,
            'items' => $items->get()
        ]);
    }

    public function reservation (Request $request){
        if(!$request->status){
            $request['status'] = 'pending';
        }
        $items = ItemPurchase::where('type', 'Reserve-dp')->with('itemDetail')->with('userDetail')->with('cartDetail');
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
        // dd($items->get());
        return view('admin.reserve', [
            'title' => 'Order Confirm',
            'active' => $request->status,
            'items' => $items->get()
        ]);
    }

    public function pickup(Request $request){
        $date_now = date('Y-m-d');
        if(!$request->status){
            $request['status'] = 'pickup';
        }
        $items = ItemPurchase::with('itemDetail')->with('userDetail')->whereHas('cartDetail', function($q) use($date_now){
            $q->where('end_date', '<=', $date_now);
        });
        // $items = ItemPurchase::with(['cartDetail' => function($q) use($date_now){
        //     $q->where('end_date', '<=', $date_now);
        // }])->with('itemDetail')->with('userDetail');
        // dd($items->get());
        if($request->status == 'pickup'){
            $items->where('status', 'on-rent');
        }
        if($request->status == 'on-pickup'){
            $items->where('status', 'on-pickup');
        }
        // dd($items->get());
        return view('admin.pickup-confirm', [
            'title' => 'Order Confirm',
            'active' => $request->status,
            'items' => $items->get()
        ]);
    }

    public function rentReserveHalfPaid(Request $request){
        $items = ItemPurchase::where('payment_status', 'half-paid')->with('itemDetail')->with('userDetail')->with('cartDetail');
        return view('admin.half-paid', [
            'title' => 'Order Confirm',
            'active' => 'rent-reserve-half-paid',
            'items' => $items->get()
        ]);
    }


    public function orderConfirmPost($id){
        try{
            $item = ItemPurchase::find($id);
            $item->update(['status' => 'delivery']);
            return redirect('/admin/order?status=delivery')->with('success', 'Order status Confirmed product is on delivery');
        }catch(\Exception $e){
            return redirect('/admin/order?status=pending')->with('error', 'Something went wrong');
        }
    }

    public function rentConfirmPost($id){
        try{
            $item = ItemPurchase::find($id);
            $item->update(['status' => 'delivery']);
            return redirect('/admin/rent?status=delivery')->with('success', 'Rent status Confirmed product is on delivery');
        }catch(\Exception $e){
            return redirect('/admin/rent?status=pending')->with('error', 'Something went wrong');
        }
    }

    public function reservationConfirmPost($id){
        try{
            $item = ItemPurchase::find($id);
            $item->update(['status' => 'delivery']);
            return redirect('/admin/reservation?status=delivery')->with('success', 'reservation status Confirmed product is on delivery');
        }catch(\Exception $e){
            return redirect('/admin/reservation?status=pending')->with('error', 'Something went wrong');
        }
    }

    public function pickupConfirmPost($id){
        try{
            $item = ItemPurchase::find($id);
            $item->update(['status' => 'on-pickup']);
            return redirect('/admin/pickup?status=on-pickup')->with('success', 'Pickup status Confirmed product is on pickup');
        }catch(\Exception $e){
            return redirect('/admin/pickup?status=pickup')->with('error', 'Something went wrong');
        }
    }

    public function pickupArrivalPost($id){
        try{
            $item = ItemPurchase::find($id);
            $item->update(['status' => 'completed']);
            return redirect('/admin/pickup?status=on-pickup')->with('success', 'Pickup status Confirmed product is on pickup');
        }catch(\Exception $e){
            return redirect('/admin/pickup?status=pickup')->with('error', 'Something went wrong');
        }
    }
}
