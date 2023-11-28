<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new ingredient') }}
        </h2>
    </x-slot>

    <x-container>
        <h2>{{ __('Create Ingredient') }}</h2>

        @include('ingredients.partials.form')
    </x-container>
</x-app-layout>
