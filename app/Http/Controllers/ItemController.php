<?php

namespace App\Http\Controllers;

use App\Models\ItemList;
use App\Models\Review;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(ItemList $ItemList)
    {
        
        $reviews = Review::where('item_id', $ItemList->id)->where('reply_id', null)->with('reply', 'reply.user')->orderBy('created_at', 'desc')->with('user')->get();
        return view('catalog.item-detail',[
            'title' => 'Item Detail',
            'active' => 'item-detail',
            'item' => $ItemList,
            'reviews' => $reviews
        ]);
    }
}
