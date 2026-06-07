<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:200',
            'description' => 'required',
            'date'        => 'required|date',
            'status'      => 'required|in:upcoming,ongoing,ended',
        ]);

        Event::create($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:200',
            'description' => 'required',
            'date'        => 'required|date',
            'status'      => 'required|in:upcoming,ongoing,ended',
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus!');
    }
}