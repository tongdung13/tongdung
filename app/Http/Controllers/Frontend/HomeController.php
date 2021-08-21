<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Story;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function story()
    {
        $stories = Story::paginate(15);
        $categories = Category::all();

        return view('frontend.home', compact('stories', 'categories'));
    }
}
