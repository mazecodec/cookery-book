<x-guest-layout>
    <form method="POST" action="{{ route('recipes.store') }}" class="flex flex-col gap-2">
        @csrf
        <div class="flex flex-col">
            <label for="description">Title</label>
            <input id="description"
                   type="text"
                   class="@error('title', 'recipe') is-invalid @enderror border border-gray-300 dark:border-gray-700 rounded shadow-sm dark:bg-gray-900 dark:text-gray-300">
            @error('title', 'recipe')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="description">Description</label>
            <input id="description"
                   type="text"
                   class="@error('description', 'recipe') is-invalid @enderror border border-gray-300 dark:border-gray-700 rounded shadow-sm dark:bg-gray-900 dark:text-gray-300">
            @error('description', 'recipe')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="instruction">Instructions</label>
            <textarea id="instruction"
                      class="@error('instruction', 'recipe') is-invalid @enderror border border-gray-300 dark:border-gray-700 rounded shadow-sm dark:bg-gray-900 dark:text-gray-300">
            </textarea>
            @error('instruction', 'recipe')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="image">Image</label>
            <input id="image"
                   type="file"
                   class="@error('image', 'recipe') is-invalid @enderror dark:bg-gray-900 dark:text-gray-300">
            @error('image', 'recipe')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col mt-3">
            <x-primary-button type="submit" class="w-full h-10 justify-center rounded-md">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
