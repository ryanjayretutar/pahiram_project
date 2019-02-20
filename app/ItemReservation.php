<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemReservation extends Model
{
    public function user() {
    	return $this->belongsToMany(User::class);
    }

    public function item() {
    	return $this->belongsToMany(Item::class);
    }

    
}
