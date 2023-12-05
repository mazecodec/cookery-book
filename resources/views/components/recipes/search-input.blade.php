@props([
    'route',
    'target',
    'name' => 'q',
    'value' => request('q'),
    'swap' => 'innerHTML',
    'trigger'=> 'keyup changed delay:500ms, search',
    'placeholder' => 'Search...'
])

@php
    $errors = [];
    if(!isset($target)) $errors[] = 'Target is required';
    if(!isset($target)) $errors[] = 'Route endpoint is required';
@endphp

<x-input-error :messages="$errors" class="mt-2"/>

@empty($errors)
    <x-text-input
        {{ $attributes->merge([
            'class' => 'w-full rounded-full border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
        ]) }}
        type="search"
        :name="$name"
        :value="$value"
        :placeholder="$placeholder"
        aria-label="Search field"
        :hx-get="$route"
        :hx-target="$target"
        :hx-swap='$swap'
        :hx-trigger="$trigger"
        hx-replace-url='false'
    />
@endempty
