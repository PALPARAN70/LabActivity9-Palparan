@props(['title', 'subtitle' => null])

<section class="overflow-hidden rounded-2xl border border-clinic-100 bg-white shadow-sm">
    <header class="flex flex-wrap items-center justify-between gap-2 border-b border-clinic-100 px-5 py-4">
        <div>
            <h2 class="font-semibold text-clinic-900">{{ $title }}</h2>
            @if ($subtitle)
                <p class="text-xs text-clinic-500">{{ $subtitle }}</p>
            @endif
        </div>
        {{ $actions ?? '' }}
    </header>

    {{ $slot }}
</section>