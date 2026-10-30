@props(['title', 'value'])

<div class="relative overflow-hidden rounded-2xl border border-clinic-100 bg-white p-5 shadow-sm">
    <div class="absolute -right-6 -top-6 h-20 w-20 rounded-full bg-clinic-100"></div>
    <p class="relative text-sm font-medium text-clinic-600">{{ $title }}</p>
    <p class="relative mt-2 text-3xl font-bold text-clinic-900">{{ $value }}</p>
</div>