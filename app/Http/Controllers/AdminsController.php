<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
	public function index() {
		return redirect()->route('admin.dashboard');
	}
    public function dashboard() {
    	return 'dashboard';
    }
}
