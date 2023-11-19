<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\ItemList;
use Illuminate\Http\Request;

class ForRentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_item_rent = ItemList::where('Type', 'Rent')->get();

        return view('catalog.listing',[
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
