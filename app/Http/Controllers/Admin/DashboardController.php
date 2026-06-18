<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Schedule;
use App\Models\Participant;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents        = Event::count();
        $totalSchedules     = Schedule::count();
        $totalParticipants  = Participant::count();
        $latestSchedules    = Schedule::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalEvents',
            'totalSchedules',
            'totalParticipants',
            'latestSchedules'
        ));
    }
}