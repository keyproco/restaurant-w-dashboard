<?php

namespace App\Http\Controllers;
use App\Category as Categories;
use Illuminate\Http\Request;


class Category extends Controller
{
    public function productsByCategories() {
        return Categories::with('products')->get();
    }
}
