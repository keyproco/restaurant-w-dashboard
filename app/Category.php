<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	// relationship: a single category has many products
    public function products() {
    	return $this->hasMany(Product::class); // => App\Product
    }
}
