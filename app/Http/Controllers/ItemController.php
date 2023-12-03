<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ItemList;
use App\Models\Review;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(ItemList $ItemList)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->where('item_list_id', $ItemList->id)->where('status', 'paid')->first();
        if ($cart) {
            $bool = true;
        } else {
            $bool = false;
        }
        // dd($bool);
        $reviews = Review::where('item_id', $ItemList->id)->where('reply_id', null)->with('reply', 'reply.user')->orderBy('created_at', 'desc')->with('user')->get();
        return view('catalog.item-detail',[
            'title' => 'Item Detail',
            'active' => 'item-detail',
            'item' => $ItemList,
            'reviews' => $reviews,
            'bool' => $bool
        ]);
    }
}
