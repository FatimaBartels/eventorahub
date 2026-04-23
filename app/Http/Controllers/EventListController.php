<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventListController extends Controller
{

    public function index(Request $request){


    
        $query = Event::with('category');

        if ($request->filled('search'))  {
            $query->where(function($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('description', 'like', '%' . $request->search . '%');
        });

        }

        if ($request->filled('categories')){
            $query->whereIn('category_id', $request->categories);
        }

        if ($request->filled('location')){
            $query->where('location', 'like', '%'. $request->location . '%');
        }

        
         if ($request->filled('max_price') && $request->max_price < 500) {
        $query->where('price', '<=', $request->max_price);
    }
            
        


        match($request->sort) {
        'soonest'    => $query->orderBy('date'),
        'price_asc'  => $query->orderBy('price'),
        'price_desc' => $query->orderByDesc('price'),
        default      => $query->latest(),
    };
        

    $events     = $query->paginate(10)->withQueryString();
    $categories = Category::all();

        return view('public-pages.events', compact('events', 'categories'));
    }
}
