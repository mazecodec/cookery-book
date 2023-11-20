@php use Illuminate\Support\Str; @endphp
@props([
    'src' => '#',
    'title' => ''
])
@php
    $src = Str::startsWith($src, 'http') ? $src : 'storage/images/' . $src
@endphp

<img src="{{ asset($src) }}" alt="{{$title}}" {{$attributes->merge(['class' => 'object-cover', 'loading' => 'lazy'])}} />
