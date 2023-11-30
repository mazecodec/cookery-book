@php use Illuminate\Support\Str; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recipes') }}
        </h2>
        <x-primary-button type="button"
                          @click="window.location='{{ route('recipes.create') }}'">
            {{ __('Add new recipe') }}
        </x-primary-button>
    </x-slot>

    <x-container>
        @fragment('recipes-list')
            <div class="grid gap-0.5 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-4">
                @foreach ($recipes as $recipe)
                    <x-recipes.recipe-card :recipe="$recipe"/>
                @endforeach
            </div>
        @endfragment
    </x-container>

    <x-container>
        {{ $recipes->onEachSide(2)->links() }}
    </x-container>
</x-app-layout>
