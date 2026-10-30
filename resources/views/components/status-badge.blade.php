@props(['status'])

@php
    $colors = match ($status) {
        'Done'    => 'bg-emerald-100 text-emerald-700',
        'Overdue' => 'bg-red-100 text-red-700',
        default   => 'bg-sky-100 text-sky-700',
    };
@endphp

<span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $colors }}">
    {{ $status }}
</span>