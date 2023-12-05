@php
    $sortField = request('sort_field');
    $sortDir = request('sort_dir', 'asc') === 'ASC' ? 'DESC' : 'ASC';
    $sortIcon = fn($field) => $sortField === $field ? ($sortDir === 'ASC' ? '↑' : '↓') : '';
    $hxGetUrl = fn($field) => request()->fullUrlWithQuery([
            'sort_field' => $field,
            'sort_dir' => $sortDir
        ]);
@endphp

@if(!isset($recipes))
    @php return; @endphp
@endif

<table id="results-table" class="table-fixed w-full">
    <thead>
    <tr>
        <th></th>
        <th class='px-4 py-2 text-left cursor-pointer
        hover:text-blue-900 hover:underline'
            hx-get="{{ $hxGetUrl('title') }}"
            hx-trigger='click'
            hx-swap='innerHTML'
            hx-replace-url='false'
            hx-target='#results-table-container'>
            Name
            <span class="ml-1" role="img">{{ $sortIcon('title') }}</span>
        </th>

        <th class="px-4 py-2 text-left">Actions</th>
    </tr>
    </thead>

    <tbody id="results-table-body">
        @include('dashboard.partials.table-body', [ 'recipes' => $recipes ])
    </tbody>
</table>

<div id="pagination-links"
     class="p-3"
     hx-boost="true"
     hx-swap='innerHTML'
     hx-target="#results-table-container"
>
    {{ $recipes->links() }}
</div>

