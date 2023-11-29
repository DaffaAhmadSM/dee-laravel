<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\ItemList;
use App\Models\ItemPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ForSellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_item_sell = ItemList::where('Type', 'Sell')->get();
        $item_half_paid = ItemPurchase::where('payment_status', 'half-paid')->where('user_id', auth()->user()->id)->sum('total_price');
        Session::flash('warning', 'You have to pay the rest of your payment, your total payment is Rp. '.number_format($item_half_paid/2, 0, ',', '.') );
        return view('catalog.for-sell',[
            'lists' => $list_item_sell,
            'title' => 'Item For Sell',
            'description' => 'For Sell',
            'active' => 'for-sell',
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
