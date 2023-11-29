<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function suggestionLike(){
        return $this->hasOne(SuggestionLike::class);
    }

    public function suggestionDislike(){
        return $this->hasOne(SuggestionDislike::class);
    }

}
