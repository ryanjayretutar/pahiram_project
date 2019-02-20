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
    	return $this->belongsTo(Category::class);
    }

    public function user(){
    	return $this->belongsTo(User::class)->with('user_details');
    }

    public function brand(){
    	return $this->belongsTo(Brand::class);
    }

    public function itemDetail(){
        return $this->hasOne(ItemDetail::class);
    }

    public function itemReservation(){
        return $this->hasMany(ItemReservation::class);
    }
}
