@props([
    'icon' =>  'heroicon-s-chevron-down',
    'iconClass' => '',
    'color' => 'white',
    'type' => 'button',
    'size' => 'md',
    'rounded' => 'md',
    'class' => '',
    'popoverClass' => 'w-56',
    'links' => [],
    ])


<div x-data="{ open: false }" class="relative">
    <x-button
        color="{{ $color }}"
        class="{{ $class }}"
        type="{{ $type }}"
        size="{{ $size }}"
        rounded="{{ $rounded }}"
        icon="{{ $icon }}"
        iconPosition="right"
        @click="open = !open" @click.away="open = false" aria-haspopup="true" x-bind:aria-expanded="open">
         Action
    </x-button>


    <div x-show="open" x-description="Dropdown panel, show/hide based on dropdown state."
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="absolute z-40 lg:origin-top-right right-0 mt-2 -mr-1 w-56 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 {{ $popoverClass  }}"
         role="menu" style="display: none;">

        {{ $slot }}

        @foreach($links as $link)
            <a
                href="{!! $link['href'] !!}"
                class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-1 py-2 text-sm font-medium {{ isset($link['divider']) ? 'border-t border-gray-100' : '' }}"

            >

                @if(isset($link['icon']))
                    @svg( $link['icon'], ['class' => 'text-gray-400 group-hover:text-gray-500 flex-shrink-0 ml-1 mr-3
                    h-5 w-5'])
                @endif
                {{ $link['label'] }}
                @if(isset($link['count']))
                    <span class="bg-white ml-auto inline-block py-0.5 px-3 text-xs rounded-full">
                        {{ $link['count'] }}
                  </span>
                @endif
            </a>
        @endforeach
    </div>
</div>
