@props(['name',
'type' => 'text',
'width',
'placeholder',
'value',
])
<div class="my-5 w-full">
    <label for="{{ $name }}" class="block mb-2 ">{{ $slot }} : </label>
    <input type="{{ $type == 'text' ? 'text' : $type }}" name="{{ $name }}" id="{{ $name }}"
        class="p-2  input-bordered  @error($name) border-red-500 @enderror {{   $width ?? 'w-full' }} placeholder:text-gray-500 bg-white border border-slate-400 @if($type === 'file') py-1.5 @endif"
        400 placeholder="{{ $placeholder }}" value="{{ $value ?? '' }}">
    @error($name)
    <div class="text-sm text-red-600">{{ $message }}</div>
    @enderror
</div>