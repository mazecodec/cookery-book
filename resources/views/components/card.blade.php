@props([
    'header' => null,
    'headerLink' => '#!',
    'body' => null,
    'footer' => null,
])

<article {{ $attributes->merge([
    'class' => 'flex flex-col overflow-hidden bg-white'
])}}>
    @if (isset($header))
        <header {{ $header->attributes->class(['relative flex items-center w-full overflow-hidden']) }}>
            @if($header->attributes->has('image'))
                <x-image :src="$header->attributes->get('image')"
                         class="w-full h-40 object-center object-cover bg-cover bg-no-repeat " />
            @endif

            <a href="{{ $headerLink }}">
                <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100"></div>
            </a>
        </header>
        {{ $header }}
    @endif

    @if(isset($body))
        <main {{ $body->attributes->class(['h-fit px-6 py-4 text-gray-700']) }}>
            {{$body}}
        </main>
    @endif

    @if(isset($footer))
        <footer {{ $footer->attributes->class(['px-6 py-4 text-gray-700']) }}>
            {{$footer}}
        </footer>
    @endif

    {{ $slot }}
</article>
