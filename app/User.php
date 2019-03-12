<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Carbon\Carbon;
class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function orders() {
        return $this->hasMany(Orders::class);
    }

    public static function countUsersByMonth() {
        $users = User::select('id', 'created_at')
->get()
->groupBy(function($date) {
    return Carbon::parse($date->created_at)->format('m'); // grouping by months
});

$usermcount = [];
$userArr = [];
foreach ($users as $key => $value) {
    $usermcount[(int)$key] = count($value);
}
for($i = 1; $i <= 12; $i++){
    if(!empty($usermcount[$i])){
        $userArr[$i] = $usermcount[$i];    
    }else{
        $userArr[$i] = 0;    
    }
}
return $userArr;
    }
}
