@props([
    'title' => null,
])
<p {{ $attributes->merge(['class' => 'border-l-1 text-red-700 text-sm']) }} x-data>
    {{ $slot }}
</p>
