<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Schedule;
use App\Models\Participant;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Landing page
     */
    public function index()
    {
        $schedules = Schedule::where('status', 'upcoming')
            ->orderBy('day', 'asc')
            ->get();

        $events = Event::latest('date')->get();

        return view('welcome', compact('schedules', 'events'));
    }

    /**
     * (Opsional) Form registrasi halaman terpisah - tidak dipakai karena pakai modal,
     * tapi tetap disediakan agar route lama tetap berjalan.
     */
    public function registerForm($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('register', compact('event'));
    }

    /**
     * Proses simpan registrasi peserta (dipanggil dari modal di landing page)
     */
    public function registerSubmit(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:100',
            'email'         => 'required|email',
            'phone'         => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        Participant::create($validated);

        return redirect()->route('welcome')
            ->with('success', 'Pendaftaran berhasil! Terima kasih telah mendaftar.');
    }
}