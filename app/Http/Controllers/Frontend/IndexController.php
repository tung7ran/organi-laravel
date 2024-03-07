<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $category = ProductCategory::all();
        return view('frontend.pages.home', compact('category'));
    }
}
