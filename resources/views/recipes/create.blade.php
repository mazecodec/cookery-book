@php use Illuminate\Support\Str; @endphp
@vite(["resources/js/autoloadFiles.js"])
@vite(["resources/js/markdownEditor.js"])
@vite(["resources/js/preloadImageViewer.js"])

<x-app-layout>
    <x-container>
        <x-card class="p-9">
            <form method="POST"
                  id="recipe-form"
                  action="{{ route('recipes.store') }}"
                  enctype="multipart/form-data"
                  hx-post="{{ route('recipes.store') }}"
                  hx-encoding="multipart/form-data"
                  hx-target="body"
                  hx-swap="innerHTML"
                  hx-indicator="#loading"
                  hx-trigger="submit delay:500ms"
                  class="flex flex-col gap-2">
                @csrf
                <div class="flex flex-col">
                    <label for="title">Title</label>
                    <input id="title"
                           name="title"
                           value="{{ old('title') }}"
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
                           value="{{ old('description') }}"
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
                             class="mt-1 block w-full rounded-md border-gray-300 shadow-sm h-80">
                            {!! Str::markdown(old('instructions') ?? '') !!}
                        </div>
                        @error('instructions')
                        <x-error-message class="alert alert-danger">{{ $message }}</x-error-message>
                        @enderror
                        <input type="hidden" name="instructions" id="editor-markdown"
                               value="{!! old('instructions') ?? '' !!}"/>
                    </div>
                </div>
                <div class="flex flex-col justify-between items-start overflow-hidden">
                    <img id="preview" src="#"
                         alt="Preview"
                         class="max-h-20 w-full object-fill rounded border-gray-600 shadow"
                         style="display:none;"
                    />
                    <label for="image">Image</label>
                    <input id="image"
                           name="image"
                           type="file"
                           accept="image/*"
                           class="@error('image') is-invalid @enderror dark:bg-gray-900 dark:text-gray-300">
                    @error('image')
                    <x-error-message class="alert alert-danger">{{ $message }}</x-error-message>
                    @enderror
                </div>
                <div class="flex flex-col mt-3">
                    <x-primary-button type="submit" class="w-full h-10 justify-center rounded-md">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>
        </x-card>
    </x-container>

    @push('script')
       <script>
       </script>
    @endpush
</x-app-layout>

