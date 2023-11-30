<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome') }} {{ Auth::user()->name }}! 👩🏾‍🍳🍴
        </h2>
    </x-slot>

    <x-container>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-center items-center">
                <h2 class="font-thin text-4xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-8">
                    {{ __('Search Recipes') }}
                </h2>

                <form class="flex justify-center items-center w-4/5">
                    <x-text-input
                        class="w-full"
                        type="search"
                        name="query"
                        id="query"
                        placeholder="Search..."
                    ></x-text-input>

                    <x-primary-button type="submit" class="flex justify-center ml-4 h-full w-1/5 text-center">
                        {{ __('Search') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </x-container>
</x-app-layout>



