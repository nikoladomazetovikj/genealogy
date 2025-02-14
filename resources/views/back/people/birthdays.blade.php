@section('title')
    &vert; {{ __('birthday.birthdays') }}
@endsection

<x-app-layout>
    <x-slot name="heading">
        <h2 class="font-semibold text-gray-800 dark:text-gray-100">
            {{ __('birthday.birthdays') }}
        </h2>
    </x-slot>

    <div class="overflow-x-auto py-5 space-y-5">
        <div class="flex flex-col rounded bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 text-neutral-800 dark:text-neutral-50"">
            <div class="h-14 min-h-min flex flex-col p-2 border-b-2 border-neutral-100 text-lg font-medium dark:border-neutral-600 dark:text-neutral-50 rounded-t">
                <div class="flex flex-wrap gap-2 justify-center items-start">
                    <div class="flex-grow min-w-max max-w-full flex-1">
                        {{ __('birthday.upcoming_birthdays') }}
                    </div>

                    <div class="flex-grow min-w-max max-w-full flex-1 text-end">
                        <x-icon.tabler icon="cake" />
                    </div>
                </div>
            </div>

            <!-- body -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="p-2 text-end">#</th>
                            <th scope="col" class="p-2">{{ __('person.person') }}</th>
                            <th scope="col" class="p-2 text-end">{{ __('person.dob') }}</th>
                            <th scope="col" class="p-2 text-end">{{ __('birthday.birthday') }}</th>
                            <th scope="col" class="p-2 text-end">{{ __('birthday.in') }}</th>
                            <th scope="col" class="p-2 text-end">{{ __('birthday.age') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($people as $key => $person)
                            <tr class="align-top border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                <td class="whitespace-nowrap p-2 font-medium text-end">{{ $key + 1 }}.</td>
                                <td class="whitespace-nowrap p-2">
                                    <x-link wire:navigate href="/people/{{ $person->id }}" class="{{ $person->isDeceased() ? '!text-danger' : '' }}">
                                        <b>{{ $person->name }}</b>
                                    </x-link>
                                    <x-icon.tabler icon="{{ $person->sex == 'm' ? 'gender-male' : 'gender-female' }}" />
                                </td>
                                <td class="whitespace-nowrap p-2 text-end">
                                    {{ $person->dob ? $person->dob->isoFormat('LL') : '' }}
                                </td>
                                <td class="whitespace-nowrap p-2 text-end">
                                    {{ $person->next_birthday->isoFormat('LL') }}
                                </td>
                                <td class="whitespace-nowrap p-2 text-end">
                                    {!! $person->next_birthday_remaining_days . ' ' . trans_choice('birthday.days', $person->next_birthday_remaining_days) !!}
                                </td>
                                <td class="whitespace-nowrap p-2 text-end">
                                    {{ $person->next_birthday_age }}

                                    @if ($person->isDeceased())
                                        <br />
                                        <span class="text-danger">
                                            <x-icon.tabler icon="coffin" />
                                            {{ $person->age }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="whitespace-nowrap p-2">{{ __('birthday.no_upcoming_birthdays', ['months' => $months]) }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- footer -->
            <div class="h-12 p-2 text-xs rounded-b">
                <p class="py-0">{{ __('birthday.upcoming_months', ['months' => $months]) }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
