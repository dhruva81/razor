@props([
    'record' => null,
    'flat' => false,
     'onlySubmit' => false,
    ])
<div>
    <div
        @class([
            'bg-white shadow rounded-lg divide-y divide-gray-200 border border-gray-300' => !$flat,
            ])
    >
        <div
            @class([
            'px-6 py-6' => !$flat,
            ])
           >
            {{ $this->form }}
        </div>

        <div
            @class([
            'py-4',
            'flex justify-between items-center rounded-b-lg bg-gray-100 px-6' => !$flat,
            ])
            >
            <x-razor::filament-form-buttons :record="$record" :onlySubmit="$onlySubmit" />

        </div>

    </div>
</div>
