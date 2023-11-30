<?php

namespace App\Http\Controllers\Catalog;

use App\Models\ItemList;
use App\Models\ItemPurchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ForRentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_item_rent = ItemList::where('Type', 'Rent')->get();
        $item_half_paid = ItemPurchase::where('payment_status', 'half-paid')->where('user_id', auth()->user()->id)->sum('total_price');
        if($item_half_paid > 0){
        Session::flash('warning', 'You have to pay the rest of your payment, your total payment is Rp. '.number_format($item_half_paid/2, 0, ',', '.') );
        }
        return view('catalog.for-rent',[
            'lists' => $list_item_rent,
            'title' => 'Item For Rent',
            'description' => 'For Rent',
            'active' => 'for-rent'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
