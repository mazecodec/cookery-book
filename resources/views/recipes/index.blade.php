@php use Illuminate\Support\Str; @endphp
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center" x-data>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Recipes') }}
            </h2>
            <x-primary-button type="button"
                              @click="window.location='{{ route('recipes.create') }}'">
                {{ __('Add new recipe') }}
            </x-primary-button>
        </div>
    </x-slot>

    <x-container x-data="searchForm()" class="px-4 sm:px-0">
        <div class="flex justify-between items-center">
            <form class="flex justify-start items-center" action="{{ route('recipes.index') }}">
                <p x-model="message"></p>
                <div class="fle_">
                    <label for="filter[title]" class="block">Search</label>
                    <input type="text" id="filter[title]" name="filter[title]"
                           class="px-4 py-2 rounded border border-gray-200"
                           x-model="filter.title"/>
                    <x-secondary-button type="button" x-on:click.prevent="submit()">
                        GO
                    </x-secondary-button>
                </div>
                <div class="flex_">
                    <label for="sort[title]" class="block">Order</label>
                    ASC <input type="radio"
                               id="sort[title]"
                               name="sort[title]"
                               value="asc"
                               {{ isset($request['sort']['title']) && $request['sort']['title'] === 'asc' ? 'checked' : '' }}
                               x-model="sort.title">
                    DESC <input type="radio"
                                id="sort[title]"
                                name="sort[title]"
                                value="desc"
                                {{ isset($request['sort']['title']) && $request['sort']['title'] === 'desc' ? 'checked' : '' }}
                                x-model="sort.title">
                </div>
            </form>
            <div x-show="loading">loading...</div>
        </div>
    </x-container>

    <x-container>
        @fragment('recipes-list')
            <div class="grid gap-2 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-4">
                @foreach ($recipes as $recipe)
                    <x-card
                            class="shadow-md hover:shadow-lg rounded border border-gray-200 h-auto mx-3 sm:px-0 transition-ease-in-out duration-300"
                            :headerLink="route('recipes.show', $recipe)">
                        <x-slot name="header" :image="$recipe->image">
                        </x-slot>

                        <x-slot name="body">
                            <a class="text-lg font-semibold text-gray-800 dark:text-gray-200"
                               href="{{ route('recipes.show', $recipe) }}">
                                {{ $recipe->title }}
                            </a>
                            <article>
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
                @endforeach
            </div>
        @endfragment
    </x-container>

    <x-container>
        {{ $recipes->onEachSide(2)->links() }}
    </x-container>

    @push('script')
        <script>
          function searchForm(event) {
            return {
              filter: {
                title: "{{ $request['filter']['title'] ?? '' }}"
              },
              sort: {
                title: "{{ $request['sort']['title'] ?? 'asc' }}"
              },
              message: '',
              loading: false,

              submit() {
                this.loading = true

                // if (this.filter.title === '') {
                //   this.loading = false
                //   this.message = 'Please enter a title';
                //   return false
                // }

                // if (this.filter.title) {
                  setTimeout(() => {
                    this.$event.target.form.submit()
                  }, 500)
                // }
              }
            }
          }
        </script>
    @endpush
</x-app-layout>
