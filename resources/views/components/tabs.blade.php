@props([
    'tabs' => [],
    'padding' => 'px-4 md:px-6 lg:px-8',
    'bgColor' => 'bg-transparent',
    ])

<div
    {{ $attributes->merge(['class' => $bgColor . ' border-t border-b border-gray-200 ']) }}>
    <div class="{{ $padding }}">
        <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select a tab</label>
            <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
            <select id="tabs" name="tabs"
                    class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 mt-2">
                @foreach($tabs as $tab)
                    <option>{{ $tab['label']  }}</option>
                @endforeach
            </select>
        </div>
        <div class="hidden sm:block">
            <div class="">
                <nav class="-mb-px flex space-x-4" aria-label="Tabs">
                    @foreach($tabs as $tab)
                        <a href="{{ $tab['href'] }}"
                            @class([
                            'flex items-center hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4  border-b-2 border-transparent font-medium text-sm',
                            'border-indigo-500 text-indigo-600' => $tab['active'],
                            'border-transparent text-gray-600' => !$tab['active'],
                         ])>
                            <x-dynamic-component :component="$tab['icon']"
                                @class([
                                     'group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5',
                                     'border-indigo-500 text-indigo-600' => $tab['active'],
                                     'border-transparent text-gray-600' => !$tab['active'],
                                  ])/>
                            {{ $tab['label'] }}
                        </a>
                    @endforeach

                </nav>
            </div>
        </div>
    </div>
</div>
