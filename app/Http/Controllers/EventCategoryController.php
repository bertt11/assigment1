<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventCategories = EventCategory::all(); 
        return view('eventCategories.masterEventCategory', compact('eventCategories')); 
    }

    public function create()
    {
        return view('eventCategories.createEventCategory'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        EventCategory::create($request->all()); // Simpan kategori acara baru

        return redirect()->route('masterEventCategory')->with('success', 'Event category created successfully.');
    }

    public function edit($id)
    {
        $eventCategory = EventCategory::findOrFail($id); 
        return view('eventCategories.editEventCategory', compact('eventCategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $eventCategory = EventCategory::findOrFail($id);
        $eventCategory->update($request->all()); // Update kategori acara

        return redirect()->route('masterEventCategory')->with('success', 'Event category updated successfully.');
    }

    public function destroy($id)
    {
        $eventCategory = EventCategory::findOrFail($id);
        $eventCategory->delete(); // Hapus kategori acara

        return redirect()->route('masterEventCategory')->with('success', 'Event category deleted successfully.');
    }
}
