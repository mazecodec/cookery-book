@php use Illuminate\Support\Str; @endphp
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center" x-data>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Recipes') }}
            </h2>

            @can('update', $recipe)
                <x-primary-button type="button"
                                  @click="window.location='{{ route('recipes.edit', $recipe) }}'">
                    {{ __('Edit') }}
                </x-primary-button>
            @endcan
        </div>
    </x-slot>

    <x-container>
        <x-card>
            <x-slot name="header" :image="$recipe->image" ></x-slot>

            <x-slot name="body">
                <div class="flex w-full">
                    <div class="flex flex-col flex-grow">
                        <h1 class="text-3xl font-bold mb-2 uppercase">{{ $recipe->title }}</h1>
                        <blockquote class="my-2">{{ $recipe->description }}</blockquote>
                        <article class="prose prose-stone prose-md dark:prose-invert">
                            <h2 class="mb-1">Instructions</h2>
                            {!! Str::markdown($recipe->instructions ?? '...') !!}
                        </article>
                    </div>
                    @if(isset($recipe->ingredients))
                        <div class="flex-auto w-1/4 bg-gray-500">
                            <ul>
                                @foreach($recipe->ingredients as $ingredient)
                                    {{ $recipe->ingredients }}
                                    <li>{{ $ingredient->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </x-slot>

            @if(isset($recipe->tags))
                <x-slot name="footer">
                    <ul>
                        @foreach($recipe->tags as $tag)
                            {{ $recipe->ingredients }}
                            <li>{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                </x-slot>
            @endif
        </x-card>
    </x-container>
</x-app-layout>
