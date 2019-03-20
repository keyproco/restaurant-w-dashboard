<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    const PENDING = -1;
    const IN_PROGRESS = 1;
    const PREPARED = 2;

    protected $fillable = ['user_id', 'confirmed', 'delivery_id', 'payment_type'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function adress()
    {
        return $this->belongsTo(Adress::class);
    }
}
