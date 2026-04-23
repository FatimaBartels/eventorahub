<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Category;

class HomeController extends Controller
{
   public function index()
    {
    $featuredEvents = Event::with('category')->latest()->take(3)->get();
    $categories = Category::all();

    return view('public-pages.home', compact('featuredEvents', 'categories'));
    }
}
