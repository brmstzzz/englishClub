<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Schedule;
use App\Models\Participant;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // Halaman Landing Page
    public function index()
    {
        $events    = Event::where('status', 'active')->latest()->take(3)->get();
        $schedules = Schedule::where('status', 'upcoming')->get();
        return view('public.index', compact('events', 'schedules'));
    }

    // Halaman Activities (daftar event)
    public function activities()
    {
        $events    = Event::where('status', 'active')->latest()->get();
        $schedules = Schedule::where('status', 'upcoming')->get();
        return view('public.activities', compact('events', 'schedules'));
    }

    // Halaman Featured
    public function featured()
    {
        return view('public.featured');
    }

    // Halaman Contacts
    public function contacts()
    {
        return view('public.contacts');
    }

    // Tampilkan form registrasi untuk event tertentu
    public function registerForm($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('public.register', compact('event'));
    }

    // Proses submit form registrasi
    public function registerSubmit(Request $request)
    {
        // Validasi data form
        $validated = $request->validate([
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|max:100',
            'phone'         => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'event_id'      => 'required|exists:events,id',
        ]);

        // Simpan ke database
        Participant::create($validated);

        // Redirect ke activities dengan pesan sukses
        return redirect()->route('activities')
            ->with('success', 'Pendaftaran berhasil! Silakan tunggu konfirmasi dari admin.');
    }
}