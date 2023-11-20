<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center" x-data>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ingredients') }}
            </h2>
            <x-primary-button type="button" @click="window.location='{{ route('ingredients.create') }}'">
                {{ __('Add new ingredient') }}
            </x-primary-button>
        </div>
    </x-slot>

    @foreach($ingredients as $ingredient)
        <div>
            {{$ingredient->name}}
        </div>
    @endforeach

</x-app-layout>
