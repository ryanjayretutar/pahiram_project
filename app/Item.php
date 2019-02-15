<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
            'user_id',
			'category_id',
			'brand_id',
			'product_name',
			'product_price',
			'product_stock',
			'added_date',
			'p_status'
		];
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function brand(){
    	return $this->belongsTo('App\Brand');
    }

    public function itemDetail(){
        return $this->hasOne('App\ItemDetail');
    }
}
