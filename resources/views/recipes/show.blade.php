<x-guest-layout>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Recipes') }}
    </h2>
    <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $recipe->title }}
    </h3>
    <blockquote>{{ $recipe->description }}</blockquote>
</x-guest-layout>
