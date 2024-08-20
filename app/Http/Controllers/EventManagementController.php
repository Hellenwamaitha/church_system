<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;


class EventManagementController extends Controller
{
    public function index()
{
    // Retrieve method
    $events = Event::all(); 
    return view('events.index', compact('events'));
}

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'title' => 'required',
        'date' => 'required|date',
        'time' => 'required',
        'location' => 'required',
    ]);

    // Create and store the event
    $event = new Event();
    $event->title = $request->title;
    $event->date = $request->date;
    $event->time = $request->time;
    $event->location = $request->location;
    $event->save();


    return redirect()->route('events.index');
}


    public function edit(Event $event)
    {
        return view('components.event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'date' => 'required|string',
            'time' => 'required|string',
            'location' => 'required|string',

        ]);

        $event->update($validatedData);

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }


    public function destroy(Event $event)
    {
        // Delete method
        $event->delete();

        // Redirect back with success message
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

    public function search(Request $request)
{
    $search = $request->input('search');
    $events = Event::where('title', 'like', '%' . $search . '%')->get();

    return view('events.index', compact('events'));
}

}

