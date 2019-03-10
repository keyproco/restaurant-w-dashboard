<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
	public function product() 
	{
		return $this->belongsTo(Product::class);
	}
	public function order() {
		return $this->belongsTo(Orders::class);
	}
}


