@props([
    'badge' => '',
    'icon' => '',
    'image' => '',

    'bgColor' => 'bg-transparent',
    'iconColor' => 'text-black',
    'iconBgColor' => 'bg-gray-200',

    'title' => '',
    'subtitle' => '',
    'meta' => '',

    'href' => '#',
    'variant' => null,

    'actionDropdownLinks' => [],
    'actionButtons' => [],
    'tabLinks' => [],

    'withBorder' => false,
])

@php

    $theVariant = match($variant){
        default => 'fullWidth',
        'simple' => 'defaultWidth',
    };

    $padding = match($variant){
        default => 'px-4 md:px-6 lg:px-8',
        'simple' => 'px-0',
    };

    $withBottomBorder = match($withBorder){
        true => true,
        default => false,
    };

@endphp

@if($theVariant == 'fullWidth')
    <x-slot name="fullWidth">
        @endif

        <div @class([
                'pt-5',
                $bgColor,
                'px-4 md:px-6 lg:px-8' => $theVariant == 'fullWidth',
            ])
             ])>
            <div class="sm:flex sm:items-center sm:justify-between pb-5">

                <!-- Title -->
                <div class="flex-1 flex items-center space-x-4">

                    @if($image)
                        <div class="flex-shrink-0">
                            <img class="object-cover mx-auto h-24 w-32 rounded-lg"
                                 src="{{ $image }}" alt="">
                        </div>
                    @elseif($icon)
                        <div class="bg-gray-200 p-4 flex items-center justify-center rounded-lg">
                            @svg($icon, "h-6 w-6 " . $iconColor )
                        </div>
                    @endif

                    <div>
                        @if($badge)
                            <div
                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                {{ $badge }}
                            </div>
                        @endif

                        @if($title)
                            <h2 class="mt-1 text-xl font-semibold text-gray-900 sm:truncate">
                                @if($href)
                                    <a href="{{ $href }}">
                                        {{ $title }}
                                    </a>
                                @else
                                    {{ $title }}
                                @endif
                            </h2>
                        @endif

                        @if($subtitle)
                            <div class="mt-1 text-sm text-gray-700 sm:truncate">
                                {{ $subtitle }}
                            </div>
                        @endif

                        <div class="mt-1">
                            {{ $meta ?? '' }}
                        </div>

                    </div>

                </div>

                <!-- Slot -->
                <div class="mt-5 flex items-center sm:mt-0 space-x-3">

                    {{ $actions ?? '' }}

                    @if($actionButtons)
                        @foreach($actionButtons as $button)
                            <x-razor::button
                                :href="$button['href']"
                                :icon="$button['icon']">
                                {{ $button['label'] }}
                            </x-razor::button>
                        @endforeach
                    @endif

                    @if($actionDropdownLinks)
                        <x-razor::dropdown :links="$actionDropdownLinks"/>
                    @endif
                </div>

            </div>
        </div>


        @if($withBottomBorder)
            <x-razor::hr/>
        @endif

        {{ $tabs ?? '' }}

        @if($tabLinks)
            <xrazor::tabs
                :tabs="$tabLinks"
                :padding="$padding"
                :bgColor="$bgColor"
            />
        @endif

        @if($theVariant === 'fullWidth')
    </x-slot>
@endif

