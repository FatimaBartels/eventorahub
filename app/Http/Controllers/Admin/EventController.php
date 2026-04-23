<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $events = Event::with('category')->paginate(10); 
        return view('admin.events.index', compact('events'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); 
        return view('admin.events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'title'=> 'required|max:150',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
            'date' => 'required|date',
            'location' => 'required',
            'price' => 'required|numeric',
            'max_capacity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',

        ]);

        // Upload image 
      $validated['image'] = $request->file('image')->store('events','public');
             
           // Create event
        Event::create($validated);
         
 
                //redirect with success
            return Redirect::route('admin.events.index')
                ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::all();  

        return view('admin.events.edit', compact('event', 'categories'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $event = Event::findOrFail($id);

       $validated = $request->validate([
            'title'=> 'required|max:150',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'price' => 'required|numeric',
            'max_capacity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|mimes:jpg,png,jpeg',

        ]);

        // if new image is upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        } else {
            //keep the existing image
            $validated['image'] = $event->image;
        }

        //update the event

        $event->update($validated);

        return Redirect::route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return Redirect::route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
