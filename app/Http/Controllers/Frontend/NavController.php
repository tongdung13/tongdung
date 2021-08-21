<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function category()
    {
        $categories = Category::all();

        return view('layouts.frontend', compact('categories'));
    }
}
