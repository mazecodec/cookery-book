@fragment('$ingredients')
    @foreach($recipes ?? [] as $recipe)
        <tr>
            <td class="">{{ $recipe->title }}</td>
            <td class="">{{ $recipe->description }}</td>
            <td class="flex justify-end gap-2">
                <x-secondary-button type="button"
                                    @click="window.location='{{ route('recipes.edit', $recipe->id) }}'">
                    {{ __('Edit') }}
                </x-secondary-button>
                <form method="POST"
                      hx-delete="{{ route('recipes.destroy', $recipe) }}"
                      hx-trigger="submit"
                      hx-target='#results-table-container'
                      hx-confirm="Are you sure you wish to delete this ingredient?"
                >
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
