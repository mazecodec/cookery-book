<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center" x-data>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ingredients') }}
            </h2>
        </div>
    </x-slot>

    <x-container>
        <div class="flex w-full p-4
        bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-between items-center">

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('List of ingredients') }}
                    </h2>

                    @include('ingredients.partials.search-input')
                </div>

                <div id="ingredients-table-container"
                     class="w-full table-fixed my-3"
                     hx-get="{{ route('ingredients.index') }}"
                     hx-trigger="load from:body">

                    @include('ingredients.partials.table', [ 'ingredients' => $ingredients ])
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout  >
