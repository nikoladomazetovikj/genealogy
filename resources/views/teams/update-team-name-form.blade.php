<x-form-section submit="updateTeamName">
    <x-slot name="title">
        <div class="dark:text-gray-400">
            {{ __('Team Name') }}
        </div>
    </x-slot>

    <x-slot name="description">
        <div class="dark:text-gray-100">
            {{ __('The team\'s name and owner information.') }}
        </div>
    </x-slot>

    <x-slot name="form">
        <!-- Team Owner Information -->
        <div class="col-span-6">
            <x-label value="{{ __('Team Owner') }}" />

            <div class="flex items-center mt-2">
                <img class="w-12 h-12 rounded-full object-cover" src="{{ $team->owner->profile_photo_url }}" alt="{{ $team->owner->name }}">

                <div class="ms-4 leading-tight">
                    <div class="text-gray-900">{{ $team->owner->name }}</div>
                    <div class="text-gray-700 text-sm">{{ $team->owner->email }}</div>
                </div>
            </div>
        </div>

        <!-- Team Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Team Name') }}" />

            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" :disabled="!Gate::check('update', $team)" />

            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Team description -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="description" value="{{ __('Team Description') }}" />

            <div class="relative mt-1 mb-3 block w-full">
                <textarea id="description" wire:model="state.description" :disabled="!Gate::check('update', $team)"
                    class="peer block min-h-[auto] w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded shadow-sm px-3 py-[0.32rem]" rows="3">
                </textarea>
            </div>

            <x-input-error for="description" class="mt-2" />
        </div>
    </x-slot>

    @if (Gate::check('update', $team))
        <x-slot name="actions">
            <x-action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>

            <x-button.primary>
                {{ __('Save') }}
            </x-button.primary>
        </x-slot>
    @endif
</x-form-section>
