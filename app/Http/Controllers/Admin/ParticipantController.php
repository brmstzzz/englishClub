<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Event;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        $query = Participant::latest('id');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $perPage = $request->input('per_page', 10);
        $participants = $query->paginate($perPage);

        return view('admin.participants.index', compact('participants'));
    }

    public function create()
    {
        $events = Event::where('status', 'active')->get();
        return view('admin.participants.create', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:100',
            'email'         => 'required|email',
            'phone'         => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        Participant::create($validated);

        return redirect()->route('admin.participants.index')
            ->with('success', 'Peserta berhasil ditambahkan!');
    }

    public function edit(Participant $participant)
    {
        $events = Event::where('status', 'active')->get();
        return view('admin.participants.edit', compact('participant', 'events'));
    }

    public function update(Request $request, Participant $participant)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:100',
            'email'         => 'required|email',
            'phone'         => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        $participant->update($validated);

        return redirect()->route('admin.participants.index')
            ->with('success', 'Data peserta berhasil diperbarui!');
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();
        return redirect()->route('admin.participants.index')
            ->with('success', 'Peserta berhasil dihapus!');
    }
}