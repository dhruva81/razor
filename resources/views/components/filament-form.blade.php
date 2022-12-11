@props([
    'record' => null,
    ])
<div>
    <form>
        {{ $this->form }}
    </form>

    <div class="flex space-x-4 my-6">
        <x-button
            color="indigo"
            type="button"
            wire:click="save"
            wire:target="save"
            loader
        >
            Submit
        </x-button>
        @if($record)
            <x-button
                color="indigo"
                type="button"
                wire:click="saveAndContinueEditing"
                wire:target="saveAndContinueEditing"
                loader
            >
                Submit and Continue Editing
            </x-button>
        @else
            <x-button
                color="indigo"
                type="button"
                wire:click="saveAndCreateAnother"
                wire:target="saveAndCreateAnother"
                loader
            >
                Submit and Create Another
            </x-button>
        @endif
        <x-button
            color="gray"
            type="button"
            wire:click="cancel"
            wire:target="cancel"
        >
            Cancel
        </x-button>
    </div>
</div>
