<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	protected $fillable = ['brand_name'];
    public function product(){
    	return $this->hasMany(Item::class);
    }
}
