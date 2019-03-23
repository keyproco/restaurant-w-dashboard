<?php

namespace App\Http\Controllers;

use App\Orders;
use App\User;
use Carbon\Carbon;

class AdminsController extends Controller
{
    public function index()
    {

        return redirect()->route('admin.dashboard');
    }
    public function dashboard()
    {
        return view('layouts.admin');
    }
    public function stats()
    {
        $users = collect(User::countUsersByMonth());
        $labels = collect(['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre']);

        return [
            'usersByMonth' => [
                'users' => $users->values(),
                'labels' => $labels,
            ],
            'todaySales' => Orders::whereDay('updated_at', '=', Carbon::today()->day)->sum('total'),
            'orders' => Orders::where('status', '!=', 3)->with(['adress', 'user', 'products'])->get(),
        ];

    }
}
