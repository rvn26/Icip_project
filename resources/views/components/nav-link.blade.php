@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center p-2 border-b-2 border-orange3 bg-orange3 rounded-lg text-sm font-medium leading-5 text-cream focus:outline-none focus:border-cream transition duration-150 ease-in-out text-white'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-black hover:text-gray-700 hover:border-orange3 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

{{-- ? 'inline-flex items-center px-1 pt-1 border-b-2 border-orange3 bg-indigo-100 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'; --}}