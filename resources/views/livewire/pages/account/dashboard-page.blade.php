<div class="min-h-screen bg-black pt-24 pb-16 px-6">
    <div class="max-w-6xl mx-auto">

        {{-- Header --}}
        <div class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-5xl mb-4">
                        <span
                            class="bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent">
                            Мой аккаунт
                        </span>
                    </h1>
                    <p class="text-xl text-gray-400">
                        Доступ ко всем модулям и урокам
                    </p>
                </div>

                {{-- Access badge (DESKTOP ONLY) --}}
                <div class="block md:hidden">
                    @if($isPaid)
                        <div
                            class="flex items-center gap-3 px-6 py-3 bg-green-500/20 border border-green-500/50 rounded-xl">
                            <span class="text-green-400">✔</span>
                            <div>
                                <div class="text-sm text-green-400">Полный доступ</div>
                                <div class="text-xs text-gray-500">Все модули открыты</div>
                            </div>
                        </div>
                    @else
                        <div
                            class="flex items-center gap-3 px-6 py-3 bg-orange-500/20 border border-orange-500/50 rounded-xl">
                            <span class="text-orange-400">🔒</span>
                            <div>
                                <div class="text-sm text-orange-400">Ограниченный доступ</div>
                                <div class="text-xs text-gray-500">Требуется оплата</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-4 md:grid-cols-2 gap-4">
                @foreach($stats as $stat)
                    <div class="p-4 rounded-xl bg-white/5 border border-white/10">
                        <div class="text-3xl {{$stat['color']}}  mb-1">{{$stat['value']}}</div>
                        <div class="text-sm text-gray-500">{{$stat['name']}}</div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Modules --}}
        <div class="space-y-6">
            @foreach($modules as $module)
                <div
                    x-data="{ open: false }"
                    class="rounded-2xl bg-white/5 border border-white/10 overflow-hidden"
                >

                    {{-- Module header --}}
                    <button
                        @click="open = !open"
                        class="w-full p-6 flex items-center gap-4 hover:bg-white/5 transition-colors"
                    >
                        <div
                            class="w-14 h-14 rounded-xl flex items-center justify-center text-2xl flex-shrink-0 bg-gradient-to-br from-cyan-500 to-blue-600">
                            📚
                        </div>

                        <div class="flex-1 text-left">
                            <h3 class="text-2xl mb-1 text-white">{{ $module['name'] }}</h3>
                            <p class="text-sm text-gray-400">{{ $module['description'] }}</p>

                            <div class="flex items-center gap-4 mt-2">
                    <span class="text-xs text-gray-500">
                        {{ count($module['lessons']) }} уроков
                    </span>

                                @unless($isPaid)
                                    <span class="text-xs text-orange-400 flex items-center gap-1">
                            🔒 Требуется оплата
                        </span>
                                @endunless
                            </div>
                        </div>

                        {{-- Arrow --}}
                        <div class="text-gray-400 text-xl transition-transform"
                             :class="open ? 'rotate-90' : ''">
                            ›
                        </div>
                    </button>

                    {{-- Lessons --}}
                    <div
                        x-show="open"
                        x-transition
                        x-collapse
                        class="border-t border-white/10"
                    >
                        @foreach($module->lessons as $i => $lesson)
                            <a href="{{route('account.lesson', $lesson['id'])}}" class="border-b border-white/5 last:border-b-0">
                                <button
                                    wire:click="openLesson('{{ $module['id'] }}', '{{ $lesson['id'] }}')"
                                    class="w-full p-6 pl-20 flex items-center gap-4 hover:bg-white/5 transition-colors"
                                >
                                    <div class="w-10 h-10 rounded-lg flex items-center justify-center
                            {{ $isPaid
                                ? 'bg-cyan-500/20 border border-cyan-500/50'
                                : 'bg-white/5 border border-white/10' }}">
                                        <x-bi-lock class="w-4 h-4 text-cyan-500/50" />
                                    </div>

                                    <div class="flex-1 text-left">
                                        <span class="text-sm text-gray-500">Урок {{ $i + 1 }}</span>
                                        <h4 class="text-lg text-white">{{ $lesson['title'] }}</h4>
                                        <p class="text-sm text-gray-400">{{ $lesson['description'] }}</p>
                                    </div>

                                    <div class="text-sm text-gray-500 flex gap-2 items-center">
                                        <x-bi-clock class="w-4 h-4"/> 10
                                    </div>
                                </button>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>

        {{-- CTA --}}
        @unless($isPaid)
            <div class="mt-12 p-8 rounded-2xl bg-gradient-to-br from-cyan-500/10 to-purple-500/10
                        border border-cyan-500/30 text-center">
                <h3 class="text-3xl mb-4 text-white">Получите полный доступ</h3>
                <p class="text-gray-400 mb-6 max-w-2xl mx-auto">
                    Разблокируйте 10 уроков
                    за <span class="text-cyan-400 text-2xl">100 ₽</span>
                </p>

                <button
                    wire:click="goToPayment"
                    class="px-8 py-4 bg-gradient-to-r from-cyan-500 to-purple-600
                           rounded-xl text-lg hover:scale-105 transition-transform"
                >
                    Оплатить сейчас
                </button>
            </div>
        @endunless
    </div>
</div>
