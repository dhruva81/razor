@props([
    'id' => '',
    'icon' => '',
    'image' => '',
    'title' => '',
    'badge' => '',
    'iconColor' => 'text-black',
    'iconBgColor' => 'bg-gray-200',
    'href' => '#',
    'simple' => false,
    'subtitle' => '',
])

@if(isset($simple) && $simple)
<div class="sm:flex sm:items-center mt-8 mb-6 ">
    <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900 flex items-center">
            @if($icon)
                @svg($icon, 'h-6 w-6 mr-2 text-gray-500')
            @endif
            {{ $title }}
        </h1>
        @if($subtitle)
            <p class="mt-2 text-sm text-gray-700">
                {{ $subtitle }}
            </p>
        @endif
    </div>
    <div class="mt-4 sm:mt-0 flex items-center space-x-2">
        {{ $slot }}
    </div>
</div>

@else
<x-slot name="fullWidth">

    <div {{ $attributes->merge(['class' => 'pt-5 bg-white border-b border-gray-200']) }}>

        <div class="px-4 md:px-6 lg:px-8">
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

                                <h2 class="mt-1 text-xl font-semibold text-gray-900 sm:truncate">
                                    @if($href)
                                        <a href="{{ $href }}" >
                                            {{ $title }}
                                        </a>
                                    @else
                                        {{ $title }}
                                    @endif
                                </h2>

                            <div class="mt-1">
                                {{ $subTitleSlot ?? '' }}
                            </div>

                        </div>
                    </div>

                    <!-- Slot -->
                    <div class="mt-5 flex items-center justify-center sm:mt-0 space-x-3">
                        {{ $slot }}
                    </div>

                </div>
        </div>

    </div>

    @isset($navSlot)
        {{ $navSlot ?? '' }}
    @endif
</x-slot>
@endif
