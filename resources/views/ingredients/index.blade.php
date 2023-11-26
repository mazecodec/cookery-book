<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center" x-data>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ingredients') }}
            </h2>
            {{--            <x-primary-button type="button" @click="window.location='{{ route('ingredients.create') }}'">--}}
            {{--                {{ __('Add new ingredient') }}--}}
            {{--            </x-primary-button>--}}
        </div>
    </x-slot>

    <x-container>
        <div class="flex w-full">
            <div class="w-3/5 bg-sky-800 p-3">
                <h2>{{ __('List of ingredients') }}</h2>
                <table class="w-full table-fixed_ border border-gray-200 rounded my-3">
                    <thead>
                    <tr>
                        <th></th>
                        <th>{{ __('Name') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($ingredients))
                        @fragment('$ingredients')
                            @foreach($ingredients as $ingredient)
                                <tr>
                                    <td>{{$ingredient->emoji}}</td>
                                    <td>{{$ingredient->name}}</td>
                                    <td class="flex">
                                        <x-secondary-button type="button"
                                                          @click="window.location='{{ route('ingredients.update', $ingredient->id) }}'">
                                            {{ __('Edit') }}
                                        </x-secondary-button>
                                        <form method="POST"
                                              action="{{ route('ingredients.destroy', $ingredient) }}">
                                            @method('DELETE')
                                            @csrf
                                            <x-danger-button type="submit">
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endfragment
                    @endif
                    </tbody>
                </table>
                @if(isset($ingredients))
                    {{ $ingredients->links() }}
                @endif
            </div>
            <div class="w-2/5 bg-red-500">
                <h2>{{ __('Create Ingredient') }}</h2>
                <form method="POST" action="{{ route('ingredients.store') }}">
                    @csrf
                    <x-input-label for="name">{{ __('Name') }}</x-input-label>
                    <x-text-input name="name" id="name" :value="old('name')"/>

                    <x-input-label for="emoji">{{ __('Emoji') }}</x-input-label>
                    <x-text-input name="emoji" id="emoji" :value="old('emoji')"/>

                    <x-input-label for="image">{{ __('Image') }}</x-input-label>
                    <x-text-input name="image" id="image" :value="old('image')"/>

                    <x-primary-button type="submit">{{__('Create')}}</x-primary-button>
                </form>
                @fragment('filter_ingredients')
                    @if(isset($filterIngredients))
                        <div>
                            @foreach($filterIngredients as $ingredient)
                                <span
                                    class="badge badge-primary badge-pill">{{$ingredient->emoji}} {{$ingredient->name}}</span>
                            @endforeach
                        </div>
                    @endif
                @endfragment
            </div>
        </div>
    </x-container>
</x-app-layout>
