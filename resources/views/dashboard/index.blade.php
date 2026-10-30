@extends('layouts.app')

@section('title', $title)

@section('content')
    {{-- Header --}}
    <div class="mb-6 flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-sm font-medium text-clinic-500">{{ now()->format('l, F j, Y') }}</p>
            <h1 class="text-2xl font-bold text-clinic-900 sm:text-3xl">{{ $title }}</h1>
        </div>
        <p class="text-sm text-clinic-700">Barangay Matina Crossing Health Center</p>
    </div>

    {{-- Alert banner --}}
    @if ($alerts->count() > 0)
        <div class="mb-6 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-800">
            <span class="text-xl">⚠️</span>
            <div>
                <p class="font-semibold">{{ $alerts->count() }} overdue vaccination(s)</p>
                <p class="text-sm">Follow up with: {{ $alerts->pluck('patient_name')->join(', ') }}</p>
            </div>
        </div>
    @elseif (count($outOfStock) > 0)
        <div class="mb-6 flex items-start gap-3 rounded-2xl border border-amber-200 bg-amber-50 p-4 text-amber-800">
            <span class="text-xl">📦</span>
            <div>
                <p class="font-semibold">Out of stock: {{ implode(', ', $outOfStock) }}</p>
                <p class="text-sm">Reschedule affected residents until the next delivery.</p>
            </div>
        </div>
    @else
        <div class="mb-6 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800">
            <span class="text-xl">💉</span>
            <p class="font-semibold">All clear! No overdue vaccinations today.</p>
        </div>
    @endif

    {{-- Stats --}}
    <div class="mb-6 grid gap-4 md:grid-cols-4">
        @foreach ($stats as $stat)
            <x-stat-card :title="$stat['label']" :value="$stat['value']" />
        @endforeach
    </div>

    {{-- Schedule table --}}
    <x-panel title="Vaccination Schedule" subtitle="Sorted by date">
        <x-slot:actions>
            <a href="/schedule" class="text-sm font-medium text-clinic-600 hover:text-clinic-800">View by month →</a>
        </x-slot:actions>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-clinic-100 text-xs uppercase tracking-wide text-clinic-800">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Resident</th>
                        <th class="hidden px-4 py-3 sm:table-cell">Purok</th>
                        <th class="px-4 py-3">Vaccine</th>
                        <th class="hidden px-4 py-3 md:table-cell">Dose</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($schedules as $row)
                        <tr class="border-t border-clinic-100 {{ $loop->even ? 'bg-clinic-50' : 'bg-white' }}">
                            <td class="px-4 py-3 text-clinic-400">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 font-medium">{{ $row->patient_name }}</td>
                            <td class="hidden px-4 py-3 sm:table-cell">{{ $row->purok }}</td>
                            <td class="px-4 py-3">{{ $row->vaccine }}</td>
                            <td class="hidden px-4 py-3 md:table-cell">{{ $row->dose }}</td>
                            <td class="whitespace-nowrap px-4 py-3">
                                {{ $row->scheduled_at->format('M d, Y') }}
                                @unless ($row->status === 'Done')
                                    <span class="block text-xs text-clinic-500">{{ $row->scheduled_at->diffForHumans() }}</span>
                                @endunless
                            </td>
                            <td class="px-4 py-3"><x-status-badge :status="$row->status" /></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-10 text-center text-clinic-500">No schedules yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-panel>
@endsection