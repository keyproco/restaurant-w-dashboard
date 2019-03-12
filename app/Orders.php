<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function adress() {
        return $this->belongsTo(Adress::class, 'delivery_id');
    }
}
