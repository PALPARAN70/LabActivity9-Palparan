<?php

namespace App\Http\Controllers;
use App\Models\Vaccination;
abstract class Controller
{
public function index()
{
 $title = 'Bakuna Tracker – Purok Lastname';
 $schedules = Vaccination::orderBy('scheduled_at')->get();
 $stats = [
 ['label' => 'Total', 'value' => $schedules->count()],
 ['label' => 'Done', 'value' => $schedules->where('status', 'Done')->count()],
 // ... 2 more
 ];
 $alerts = $schedules->where('status', 'Overdue');
 return view('dashboard.index', compact('title', 'stats', 'schedules', 'alerts'));
}

}
