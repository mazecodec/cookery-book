@fragment('$ingredients')
    @foreach($ingredients ?? [] as $ingredient)
        <tr>
            <td class="">{{ $ingredient->emoji }}</td>
            <td class="">{{ $ingredient->name }}</td>
            <td class="flex justify-end gap-2">
                <x-secondary-button type="button"
                                    @click="window.location='{{ route('ingredients.edit', $ingredient->id) }}'">
                    {{ __('Edit') }}
                </x-secondary-button>
                <form method="POST"
                      hx-delete="{{ route('ingredients.destroy', $ingredient) }}"
                      hx-trigger="submit"
                      hx-target='#ingredients-table-container'
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
