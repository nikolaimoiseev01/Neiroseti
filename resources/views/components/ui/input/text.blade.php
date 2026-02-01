@props([
    'label' => null,
    'color' => 'green',
    'id' => null,
])

@php
    $inputId = $id ?? $attributes->get('wire:model');
@endphp

<div
    {{ $attributes->merge([
    'class' =>
        'flex flex-col gap-1 w-full' ]) }}>
    @if($label)
        <label for="{{ $attributes->get('wire:model') }}" class="block text-sm text-gray-400 mb-2">
            {{ $label }}
        </label>
    @endif

    <input
        {{$attributes->thatStartWith('wire:model')}}
        {{$attributes->thatStartWith('x-model')}}
        {{$attributes->thatStartWith('placeholder')}}
        autocomplete="{{$inputId}}"
        {{$attributes->thatStartWith('type')}}
        type="text"
        id="{{ $inputId }}"
        name="{{ $attributes->get('wire:model') }}"
        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white
                               focus:border-purple-500/50 focus:ring-2 focus:ring-purple-500/20
                               placeholder:text-gray-600"
    />

    <x-ui.input.error :messages="$errors->get($attributes->get('wire:model'))" class="mt-2"/>

    {{--    @error($attributes->get('wire:model'))--}}
    {{--    <p class="text-sm text-red-500">{{ $message }}</p>--}}
    {{--    @enderror--}}
</div>
