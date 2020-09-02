@props(['route'])

@php
    $classes = Request::routeIs($route) ? 'text-blue-500 underline' : '';
@endphp

<a href="{{ route($route) }}" {{ $attributes->merge(['class' => 'px-6 hover:underline hover:text-blue-500 ' . $classes]) }}>{{ $slot }}</a>
