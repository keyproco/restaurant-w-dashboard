<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	// If we need to know on which category belongs
    public function category() {
    	return $this->belongsTo(Category::class);
    }
    public function orders() {
        return $this->belongsToMany(Orders::class)->withPivot('quantity');;
    }

}

