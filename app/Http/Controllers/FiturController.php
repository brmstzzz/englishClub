<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class FiturController extends Controller
{
    /**
     * Menangani pendaftaran dari tombol "Join Schedule" dan "Join Event"
     */
    public function join(Request $request)
    {
        // 1. Validasi input dari form modal
        $validated = $request->validate([
            'schedule_id'   => 'nullable|integer',
            'event_id'      => 'nullable|integer',
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|max:150',
            'phone'         => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        // 2. Simpan data ke database melalui model Participant
        Participant::create([
            'schedule_id'   => $request->input('schedule_id') ?: null,
            'event_id'      => $request->input('event_id') ?: null,
            'name'          => $validated['name'],
            'email'         => $validated['email'],
            'phone'         => $validated['phone'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
        ]);

        // 3. Kembalikan ke halaman landing page dengan pesan sukses
        return redirect()->back()->with('success', 'Thank you! You have successfully joined the activity.');
    }

    /**
     * Menangani pendaftaran umum dari tombol "Register" di Hero Section
     */
    public function registerSubmit(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|max:150',
            'phone'         => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        // Pendaftaran umum tidak mengikat schedule maupun event
        Participant::create([
            'schedule_id'   => null,
            'event_id'      => null,
            'name'          => $validated['name'],
            'email'         => $validated['email'],
            'phone'         => $validated['phone'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
        ]);

        return redirect()->back()->with('success', 'Registration successful! Welcome to the English Club.');
    }
}