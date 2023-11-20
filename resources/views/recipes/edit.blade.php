@php use Illuminate\Support\Str; @endphp

@vite(["resources/js/autoloadFiles.js"])
@vite(["resources/js/markdownEditor.js"])

<x-app-layout>
    <x-container>
        <x-card class="p-9">
            <form method="POST"
                  action="{{ route('recipes.update', $recipe) }}"
                  enctype="multipart/form-data"
                  id="recipe-form"
                  class="flex flex-col gap-2">
                @csrf
                @method('PUT')
                <div class="flex flex-col">
                    <label for="title">Title</label>
                    <input id="title"
                           name="title"
                           value="{{ old('title', $recipe->title) }}"
                           type="text"
                           class="@error('title') is-invalid @enderror border border-gray-300 dark:border-gray-700 rounded shadow-sm dark:bg-gray-900 dark:text-gray-300">
                    @error('title')
                    <x-error-message class="alert alert-danger">
                        {{ $message }}
                    </x-error-message>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="description">Description</label>
                    <input id="description"
                           name="description"
                           value="{{ old('description', $recipe->description) }}"
                           type="text"
                           class="@error('description') is-invalid @enderror border border-gray-300 dark:border-gray-700 rounded shadow-sm dark:bg-gray-900 dark:text-gray-300">
                    @error('description')
                    <x-error-message class="alert alert-danger">{{ $message }}</x-error-message>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-col space-y-2">
                        <x-label for="editor" class="text-gray-600 font-semibold">Instructions
                        </x-label>
                        <div id="editor"
                             class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            {!! Str::markdown(old('instructions', $recipe->instructions)) !!}
                        </div>
                        @error('instructions')
                        <x-error-message class="alert alert-danger">{{ $message }}</x-error-message>
                        @enderror
                        <input type="hidden" name="instructions" id="editor-markdown" value="{!! old('instructions', $recipe->instructions) !!}"/>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row justify-between md:justify-start items-start md:items-center overflow-hidden">
                    @php
                        $src = old('image', $recipe->image);
                        $src = Str::startsWith($src, 'http') ? $src : 'storage/images/' . $recipe->image;
                        $src = asset($src);
                    @endphp
                    <img id="preview" src="{{ $src ?? '#' }}"
                         alt="Preview"
                         class="max-h-20 w-full md:w-fit md:self-justify-end object-fill rounded border-gray-600 shadow"
                         style="{{ !empty($src) ? '' : 'display:none;' }}"
                    />
                    <div class="flex flex-col">
                        <label for="image">Image</label>
                        <input id="image"
                               name="image"
                               type="file"
                               data-value="{{$src}}"
                               accept="image/*"
                               class="@error('image') is-invalid @enderror dark:bg-gray-900 dark:text-gray-300">
                        @error('image')
                        <x-error-message class="alert alert-danger">{{ $message }}</x-error-message>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col mt-3">
                    <x-primary-button type="submit" class="w-full h-10 justify-center rounded-md">
                        {{ __('Edit') }}
                    </x-primary-button>
                </div>
            </form>
        </x-card>
    </x-container>
</x-app-layout>

