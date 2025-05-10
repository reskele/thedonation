@props(['type' => 'success', 'message'])

@php
    $colors = [
        'success' => 'bg-green-100 text-green-800 border-green-300',
        'error' => 'bg-red-100 text-red-800 border-red-300',
        'info' => 'bg-blue-100 text-blue-800 border-blue-300',
    ];
@endphp

<div class="mb-4 px-4 py-2 border-l-4 rounded {{ $colors[$type] ?? $colors['info'] }}">
    {{ $message }}
</div>
