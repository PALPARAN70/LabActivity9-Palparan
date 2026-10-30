@extends('layouts.app')

@section('title', 'Schedule')

@section('content')
    <div class="mb-6">
        <p class="text-sm font-medium text-clinic-500">{{ $title }}</p>
        <h1 class="text-2xl font-bold text-clinic-900 sm:text-3xl">Schedule by Month</h1>
    </div>

    <div class="space-y-6">
        @forelse ($months as $month => $rows)
            <x-panel :title="$month" :subtitle="$rows->count() . ' scheduled'">
                <ul class="divide-y divide-clinic-100">
                    @foreach ($rows as $row)
                        <li class="flex items-center gap-4 px-5 py-4">
                            <div class="w-14 shrink-0 rounded-xl bg-clinic-100 py-2 text-center">
                                <p class="text-xl font-bold leading-none text-clinic-700">{{ $row->scheduled_at->format('d') }}</p>
                                <p class="text-xs uppercase text-clinic-500">{{ $row->scheduled_at->format('D') }}</p>
                            </div>

                            <div class="min-w-0 flex-1">
                                <p class="truncate font-medium">{{ $row->patient_name }}</p>
                                <p class="text-sm text-clinic-600">
                                    {{ $row->vaccine }} · {{ $row->dose }}
                                    <span class="hidden sm:inline">· {{ $row->purok }}</span>
                                </p>
                            </div>

                            <x-status-badge :status="$row->status" />
                        </li>
                    @endforeach
                </ul>
            </x-panel>
        @empty
            <div class="rounded-2xl border border-dashed border-clinic-300 bg-white p-10 text-center text-clinic-500">
                No schedules yet.
            </div>
        @endforelse
    </div>
@endsection