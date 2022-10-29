@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block py-2 mt-2 text-sm font-semibold text-white bg-gray-200 rounded-lg dark:bg-blue-500 dark:hover:bg-red-400 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline'
            : 'block py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-blue-500 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
