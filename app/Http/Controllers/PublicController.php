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
        $schedules = Schedule::orderBy('day', 'asc')->get();

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

        return redirect()->route('home')
            ->with('success', 'Pendaftaran berhasil! Terima kasih telah mendaftar.');
    }

    /**
     * Tambahan Fitur: Proses join Event atau Schedule hanya dengan Nama & No Telp
     */
    public function joinFiturBaru(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:100',
            'phone'       => 'required|string|max:20',
            'event_id'    => 'nullable|exists:events,id',
            'schedule_id' => 'nullable|exists:schedules,id',
        ]);

        // Menggunakan query builder direct/model baru tanpa mengganggu skema pendaftaran lama
        \App\Models\Participant::create([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'event_id'      => $request->event_id,
            'schedule_id'   => $request->schedule_id,
            'email'         => null, // Diisi null sesuai request (cukup nama & telp)
            'jenis_kelamin' => null,
        ]);

        return redirect()->back()->with('success', 'Kamu berhasil bergabung!');
    }
}