@props([
    'width' => 'w-48',
    'tabs' => [],
])

<div class="{{ $width }} flex-none">
    <div class="overflow-y-auto py-4 space-y-1 border-r border-gray-200">
        @foreach($tabs as $tab)
            <a href="{{ $tab['href'] }}"
                @class([
                'group flex items-center px-3 py-2 text-sm font-medium rounded-md',
                'bg-gray-100 text-gray-900' => $tab['active'],
                'text-gray-600 hover:bg-gray-50 hover:text-gray-900' => !$tab['active'],
             ])>
                @if(isset($tab['icon']))
                    <x-dynamic-component :component="$tab['icon']"
                        @class([
                             'flex-shrink-0 -ml-1 mr-3 h-6 w-6',
                             'text-gray-500' => $tab['active'],
                             'text-gray-400 group-hover:text-gray-500' => !$tab['active'],
                          ])/>
                @endif
                {{ $tab['label'] }}
            </a>
        @endforeach
    </div>
</div>
