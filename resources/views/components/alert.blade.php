@props([
    'title' => null,
])
<div {{ $attributes->merge(['class' => 'bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4']) }} role="alert" x-data>
    @if(isset($title))
        <p class="font-bold">{{ $title }}</p>
    @endif
    <p>{{ $slot }}</p>
</div>
