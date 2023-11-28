<form method="POST"
      hx-post="{{ route('ingredients.store') }}"
      hx-trigger="submit"
      hx-target="#ingredient-list">
    @csrf
    <x-input-label for="name">{{ __('Name') }}</x-input-label>
    <x-text-input name="name"
                  id="name"
                  :value="old('name')"
                  {{--                  hx-get="{{ route('ingredients.finder') }}"--}}
                  hx-boost="true"
                  hx-trigger="keyup changed"
                  hx-target="#filter_ingredients"
                  hx-swap="innerHTML"
                  autofocus/>


    <x-input-label for="emoji">{{ __('Emoji') }}</x-input-label>
    <x-text-input name="emoji" id="emoji" :value="old('emoji')"/>

    <x-input-label for="image">{{ __('Image') }}</x-input-label>
    <x-text-input name="image" id="image" :value="old('image')"/>

    <x-primary-button type="submit">{{__('Create')}}</x-primary-button>
</form>

@fragment('filter_ingredients')
    <div id="filter_ingredients" class="block">
        @foreach($filterIngredients ?? [] as $ingredient)
            <small
                class="bg-sky-200 hover:bg-sky-800 border border-sky-900 font-light px-1 mr-2 my-4 rounded text-white w-fit">{{$ingredient->emoji}} {{$ingredient->name}}</small>
        @endforeach
    </div>
@endfragment
