@props([
    'variant' => 'lean', // lean | dark
])
@php
    $base = 'inline-flex items-center justify-center rounded-xl px-6 py-2 text-white cursor-pointer
             transition-all duration-300 ease-out text-lg';

    $variants = [
        'lean' => 'bg-teal-300 hover:bg-teal-400 hover:shadow-lg hover:shadow-teal-300/40
                   active:scale-[0.97]',
        'dark' => 'bg-dark-300 hover:bg-dark-400 hover:shadow-lg hover:shadow-black/40
                   active:scale-[0.97]',
    ];
@endphp

<a {{ $attributes->merge([
        'class' => $base . ' ' . ($variants[$variant] ?? $variants['lean'])
    ]) }}>
    {{ $slot }}
</a>
