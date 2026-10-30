<?php

namespace App\Http\Controllers;

use App\Models\Vaccination;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Bakuna Tracker – Purok Palparan';

        $schedules = Vaccination::orderBy('scheduled_at')->get();

        $stats = [
            ['label' => 'Total',     'value' => $schedules->count()],
            ['label' => 'Done',      'value' => $schedules->where('status', 'Done')->count()],
            ['label' => 'Scheduled', 'value' => $schedules->where('status', 'Scheduled')->count()],
            ['label' => 'Overdue',   'value' => $schedules->where('status', 'Overdue')->count()],
        ];

        $alerts = $schedules->where('status', 'Overdue');

        // vaccines the health center ran out of (hardcoded for now, database in Week 10)
        $outOfStock = ['Anti-Flu'];

        return view('dashboard.index', compact('title', 'stats', 'schedules', 'alerts', 'outOfStock'));
    }

    public function schedule()
    {
        $title = 'Bakuna Tracker – Purok Palparan';

        $schedules = Vaccination::orderBy('scheduled_at')->get();

        // group rows into "November 2026", "December 2026", ...
        $months = $schedules->groupBy(fn ($row) => $row->scheduled_at->format('F Y'));

        return view('dashboard.schedule', compact('title', 'months'));
    }
}