@props(['color','value'])

<a href="{{ $value }}" class="p-2 px-4  text-white shadow-lg bg-{{ $color }} ">
    {{ $slot }}
</a> 