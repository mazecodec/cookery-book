<x-card
    class="shadow-md hover:shadow-lg rounded border border-gray-200 h-auto sm:px-0 transition-ease-in-out duration-300"
    :headerLink="route('recipes.show', $recipe)">
    <x-slot name="header" :image="$recipe->image">
    </x-slot>

    <x-slot name="body">
        <a class="text-lg font-semibold text-gray-800 dark:text-gray-200"
           href="{{ route('recipes.show', $recipe) }}">
            {{ $recipe->title }}
        </a>
        <article class="text-sm mt-2 text-gray-500 hidden" hidden aria-hidden="true">
            {{ $recipe->description }}
        </article>
    </x-slot>

    <x-slot name="footer"
            class="flex flex-wrap flex-1 justify-between items-end w-full">
        <x-primary-button
            type="button"
            @click="window.location='{{ route('recipes.show', $recipe) }}'">
            {{ __('View') }}
        </x-primary-button>
        @can('update', $recipe)
        <div class="flex">
            <x-secondary-button
                type="button"
                @click="window.location='{{ route('recipes.edit', $recipe) }}'">
                E
            </x-secondary-button>
            <form class="deleteForm"
                  method="POST"
                  action="{{ route('recipes.destroy', $recipe) }}">
                @method('DELETE')
                @csrf

                <x-secondary-button type="submit">
                    D
                </x-secondary-button>
            </form>
        </div>
        @endcan
    </x-slot>
</x-card>
