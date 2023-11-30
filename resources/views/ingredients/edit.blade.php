<x-app-layout>
    <x-slot name="header" x-data>
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Update an ingredient') }}
        </h2>

        <x-button-link :href="route('ingredients.index')">
            {{ __('Back') }}
        </x-button-link>
    </x-slot>

    <x-container>
        <div
            class="flex flex-col w-full p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">{{ __('Edit Ingredient') }}</h2>

            @include('ingredients.partials.form', [
                'ingredient' => $ingredient
            ])
        </div>
    </x-container>
</x-app-layout>
