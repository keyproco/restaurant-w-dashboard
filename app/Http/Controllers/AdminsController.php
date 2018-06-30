<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminsController extends Controller
{
	public function index() {
		
		return redirect()->route('admin.dashboard');
	}
    public function dashboard() {
		$users = collect(User::countUsersByMonth());
		$users = $users->values();
		$labels = collect(['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout','Septembre','Octobre','Novembre','Decembre' ]);

    	return view('admins.dashboard', compact('users', 'labels'));
    }
}
