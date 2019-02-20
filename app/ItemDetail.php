<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
	protected $fillable = [
			'item_id',
			'image_path',
			'description',
			'item_value',
			'model'
	];
    public function item(){
    	return $this->belongsTo(Item::class);
    }
}
