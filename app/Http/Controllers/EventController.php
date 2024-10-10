<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function eventMenu()
    {

    // Ambil semua event dari database, sertakan data organizer dan kategori
    $events = Event::with('organizer', 'eventCategory')->get();

    // Tampilkan view menu.blade.php dengan data events
    return view('eventMenu', compact('events'));
    }

    public function show($id)
    {
        $event = Event::with('organizer', 'eventCategory')->findOrFail($id);

        return view('events.detailEvent', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
