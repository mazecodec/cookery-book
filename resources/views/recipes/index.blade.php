<x-guest-layout>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Recipes') }}
    </h2>
    <div class="py-12">
        <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($recipes as $recipe)
                <li class="mb-4">
                    <x-card>
                        <x-slot name="image">
                            <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}">
                        </x-slot>
                        <a class="text-lg font-semibold text-gray-800 dark:text-gray-200" href="{{ route('recipes.show', $recipe) }}">
                            {{ $recipe->title }}
                        </a>
                        <article>
                            {{ $recipe->description }}
                        </article>
                    </x-card>
                </li>
            @endforeach
        </ul>
    </div>
    {{ $recipes->onEachSide(2)->links() }}
</x-guest-layout>
