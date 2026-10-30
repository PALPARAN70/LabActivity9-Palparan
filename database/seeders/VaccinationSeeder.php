<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use Illuminate\Database\Seeder;

class VaccinationSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['patient_name' => 'Baby Mariel Santos', 'purok' => 'Purok 2', 'vaccine' => 'BCG',
                'dose' => '1st dose', 'scheduled_at' => '2026-11-05', 'status' => 'Scheduled'],
            ['patient_name' => 'Baby Rhea Mendoza', 'purok' => 'Purok 4', 'vaccine' => 'Pentavalent',
                'dose' => '2nd dose', 'scheduled_at' => '2026-10-12', 'status' => 'Done'],
            ['patient_name' => 'Baby Jomar Villanueva', 'purok' => 'Purok 1', 'vaccine' => 'OPV',
                'dose' => '3rd dose', 'scheduled_at' => '2026-10-08', 'status' => 'Overdue'],
            ['patient_name' => 'Baby Kisses Alonzo', 'purok' => 'Purok 3', 'vaccine' => 'MMR',
                'dose' => '1st dose', 'scheduled_at' => '2026-11-18', 'status' => 'Scheduled'],
            ['patient_name' => 'Lolo Berting Cabahug', 'purok' => 'Purok 5', 'vaccine' => 'Anti-Flu',
                'dose' => 'Annual', 'scheduled_at' => '2026-10-22', 'status' => 'Overdue'],
            // your own vaccine choice
            ['patient_name' => 'Baby Third Ocampo', 'purok' => 'Purok 2', 'vaccine' => 'Hepatitis B',
                'dose' => 'Birth dose', 'scheduled_at' => '2026-11-10', 'status' => 'Scheduled'],
            // birthday row: use YOUR real birthday in 2026
            ['patient_name' => 'Nanay Luz Dagohoy', 'purok' => 'Purok 3', 'vaccine' => 'Anti-Flu',
                'dose' => 'Annual', 'scheduled_at' => '2026-03-15', 'status' => 'Done'],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}

