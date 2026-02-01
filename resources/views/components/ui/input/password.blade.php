@props([
    'name',          // имя поля (обязательное)
    'label' => null, // подпись над полем
])

<div class="flex flex-col gap-1 w-full" x-data="{show: false}">
    @if($label)
        <label for="{{ $name }}" class="block text-sm text-gray-400 mb-2">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        <input
            :type="show ? 'text' : 'password'"
            id="{{ $name }}"
            name="{{ $name }}"
            autocomplete="{{$name}}"
            {{ $attributes->merge([
                'class' =>
                    'w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white
                               focus:border-purple-500/50 focus:ring-2 focus:ring-purple-500/20
                               placeholder:text-gray-600 ' .
                    ($errors->has($name) ? 'border-red-500' : 'border-gray-300')
            ]) }}
        />
        <div
            class="!absolute top-1/2 -translate-y-1/2 right-4"
            @click="show = !show" x-show="!show" text="Показать пароль">
            <x-bi-eye
                class="w-6 h-auto text-green-500 cursor-pointer transition hover:scale-110"/>
        </div>
        <div
            class="!absolute top-1/2 -translate-y-1/2 right-4"
            @click="show = !show" x-show="show" text="Скрыть пароль">
            <x-bi-eye-slash
                class="w-6 h-auto text-green-500 cursor-pointer transition hover:scale-110"/>
        </div>
    </div>
    <x-ui.input.error :messages="$errors->get($name)" class="mt-2"/>


    {{--    @error($name)--}}
    {{--    <p class="text-sm text-red-500">{{ $message }}</p>--}}
    {{--    @enderror--}}
</div>
