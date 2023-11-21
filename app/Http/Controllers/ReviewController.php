<?php

namespace App\Http\Controllers;

use App\Models\ItemList;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store ($item, Request $request){
        $this->validate($request, [
            'review' => 'required'
        ]);

        Review::create([
            'item_id' => $item,
            'user_id' => auth()->user()->id,
            'review' => $request->review
        ]);

        return redirect(url()->previous().'#review')->with('success', 'Review added');
    }

    public function reply ($item_id, $id, Request $request){
        $this->validate($request, [
            'review' => 'required'
        ]);

        Review::create([
            'item_id' => $item_id,
            'user_id' => auth()->user()->id,
            'review' => $request->review,
            'reply_id' => $id
        ]);

        return redirect(url()->previous().'#review')->with('success', 'Reply added');
    }
}
