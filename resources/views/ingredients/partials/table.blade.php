@php
    $sortField = request('sort_field');
    $sortDir = request('sort_dir', 'asc') === 'ASC' ? 'DESC' : 'ASC';
    $sortIcon = fn($field) => $sortField === $field ? ($sortDir === 'ASC' ? '↑' : '↓') : '';
    $hxGetUrl = fn($field) => request()->fullUrlWithQuery([
            'sort_field' => $field,
            'sort_dir' => $sortDir
        ]);
@endphp

<table id="ingredients-table" class="table-fixed w-full">
    <thead>
    <tr>
        <th></th>
        <th class='px-4 py-2 text-left cursor-pointer
        hover:text-blue-900 hover:underline'
            hx-get="{{ $hxGetUrl('name') }}"
            hx-trigger='click'
            hx-swap='innerHTML'
            hx-replace-url='false'
            hx-target='#ingredients-table-container'>
            Name
            <span class="ml-1" role="img">{{ $sortIcon('name') }}</span>
        </th>

        <th class="px-4 py-2 text-left">Actions</th>
    </tr>
    </thead>

    <tbody id="ingredients-table-body">
    @include('ingredients.partials.table-body', [ 'ingredients' => $ingredients ])
    </tbody>
</table>

<div id="pagination-links"
     class="p-3"
     hx-boost="true"
     hx-swap='innerHTML'
     hx-target="#ingredients-table-container"
     >
    {{ $ingredients->links() }}
</div>

