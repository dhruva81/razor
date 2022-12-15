@props([
    'darkMode' => false,
])

<div aria-hidden="true" {{ $attributes->class([
    'border-t border-gray-200',
    'dark:border-gray-700' => $darkMode,
]) }}></div>
