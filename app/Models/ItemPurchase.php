<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPurchase extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function itemDetail()
    {
        return $this->belongsTo(ItemList::class, 'item_list_id');
    }

    public function userDetail()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function cartDetail()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}
