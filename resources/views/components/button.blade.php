@props([
'color' => 'primary',
'type' => 'submit',
'size' => 'default',
'rounded' => 'md',
'loader' => false,
'icon' => '',
'href' => '',
'iconPosition' => 'left',

'colorVariant' => [
    'primary' => 'text-white bg-primary-600 hover:bg-primary-700 border-transparent ',
    'secondary' => 'text-white bg-secondary-600 hover:bg-secondary-700 border-transparent ',
    'success' => 'text-white bg-success-600 hover:bg-success-700 border-transparent ',
    'danger' => 'text-white bg-danger-600 hover:bg-danger-700 border-transparent ',
    'white' => 'text-gray-700 bg-white hover:bg-gray-200 border-gray-300 ',
    'indigo' => 'text-white bg-indigo-600 hover:bg-indigo-700 border-transparent ',
    'yellow' => 'text-white bg-yellow-600 hover:bg-yellow-700 border-transparent ',
    'blue' => 'text-white bg-blue-600 hover:bg-blue-700 border-transparent ',
    'green' => 'text-white bg-green-600 hover:bg-green-700 border-transparent ',
    'red' => 'text-white bg-red-600 hover:bg-red-700 border-transparent ',
    'gray' => 'text-gray-900 bg-gray-300 hover:bg-gray-400 border-transparent ',
    'grey' => 'text-gray-900 bg-gray-300 hover:bg-gray-400 border-transparent ',
],

'sizeVariant' => [
    'default' => 'px-3 py-1.5 text-sm',
    'xs' => 'px-4 py-1.5 text-xs',
    'md' => 'px-4 py-2 text-sm',
    'lg' => 'px-4 py-2 text-base',
    'xl' => 'px-6 py-3 text-base',
],

'roundedVariant' => [
    'default' => 'rounded',
    'sm' => 'rounded-sm',
    'md' => 'rounded-md',
    'lg' => 'rounded-lg',
    'full' => 'rounded-full'
]
])

@php

    $iconClass = $iconPosition === 'left' ? 'h-5 w-5 mr-2' : 'h-5 w-5 ml-2 -mr-1';

@endphp


@if(isset($href) && $href != '')
    <a href="{{ $href }}" {{ $attributes->merge([
         'class' =>     'inline-flex justify-center items-center border shadow-sm font-medium focus:outline-none disabled:opacity-25 transition'
                        . ' ' . $colorVariant[$color]
                        . ' ' . $roundedVariant[$rounded]
                        . ' ' . $sizeVariant[$size]
                        ]) }}
        >
        @if($icon && $iconPosition == 'left')
            @svg($icon, $iconClass)
        @endif
            {{ $slot  }}
        @if($icon && $iconPosition == 'right')
            @svg($icon, $iconClass)
        @endif
    </a>
@else
<button {{ $attributes->merge([
        'type' => $type,
        'class' =>      'inline-flex justify-center items-center border shadow-sm font-medium focus:outline-none disabled:opacity-25 transition'
                        . ' ' . $colorVariant[$color]
                        . ' ' . $roundedVariant[$rounded]
                        . ' ' . $sizeVariant[$size]
                        ]) }}
        wire:loading.attr="disabled"
>
    @if(isset($loader) && $loader)
        <div wire:loading {{ $attributes->only('wire:target') }} >
            <svg class="w-4 h-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
        </div>
        <div wire:loading.remove {{ $attributes->only('wire:target') }}>
            @if($icon && $iconPosition == 'left')
                @svg($icon, $iconClass)
            @endif

            {{ $slot  }}

            @if($icon && $iconPosition == 'right')
                @svg($icon, $iconClass)
            @endif
        </div>
    @else
        @if($icon && $iconPosition == 'left')
            @svg($icon, $iconClass)
        @endif

        {{ $slot  }}

        @if($icon && $iconPosition == 'right')
            @svg($icon, $iconClass)
        @endif
    @endif
</button>
@endif

