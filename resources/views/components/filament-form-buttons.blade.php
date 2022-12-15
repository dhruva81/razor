@props([
    'record' => null,
    'onlySubmit' => false,
])

<div class="flex space-x-4">
    <x-razor::button
        color="indigo"
        type="button"
        wire:click="submit"
        wire:target="submit"
        loader
    >
        Save
    </x-razor::button>
    @if(!$onlySubmit)
        @if($record)
            <x-razor::button
                color="indigo"
                type="button"
                wire:click="submitAndContinueEditing"
                wire:target="submitAndContinueEditing"
                loader
            >
                Save & Continue Editing
            </x-razor::button>
        @else
            <x-razor::button
                color="indigo"
                type="button"
                wire:click="submitAndCreateAnother"
                wire:target="submitAndCreateAnother"
                loader
            >
                Save & Create New
            </x-razor::button>
        @endif
    @endif
    <x-razor::button
        color="gray"
        type="button"
        wire:click="cancel"
        wire:target="cancel"
    >
        Cancel
    </x-razor::button>
</div>
