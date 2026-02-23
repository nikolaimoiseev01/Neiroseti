<section id="modules" class="relative py-32 px-6 bg-black overflow-hidden">
    <div class="max-w-7xl mx-auto">

        <!-- heading -->
        <div class="text-center mb-20">
            <h2 class="text-5xl xl:text-5xl lg:text-4xl sm:text-3xl mb-6 text-white">
                Модули обучения
            </h2>
            <p class="text-xl lg:text-lg sm:text-base text-gray-400 max-w-2xl mx-auto">
                Каждый модуль — это блок знаний в Вашей нейронной сети
            </p>
        </div>

        <!-- modules grid -->
        <div
            x-data="learningModules()"
            class="
                grid grid-cols-3
                lg:grid-cols-2
                sm:!grid-cols-1
                gap-6
            "
        >
            @foreach($modules as $module)

                <div
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = true, index * 120)"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 translate-y-8"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="group relative"
                >
                    <!-- hover glow -->
                    <div
                        class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-20 blur-xl transition-opacity {{$module['color']}}"
                    ></div>

                    <!-- card -->
                    <div
                        class="
                            relative p-8 rounded-2xl
                            bg-white/5 backdrop-blur-sm
                            border border-white/10
                            hover:border-white/20
                            transition-all duration-300
                            h-full flex flex-col
                        "
                    >
                        <!-- icon -->
                        <div
                            class="w-14 h-14 mb-6 rounded-xl
                                   flex items-center justify-center
                                   shadow-lg {{$module['color']}}"
                        >

                            {!! $module['icon'] !!}
                        </div>

                        <!-- title -->
                        <h3 class="text-2xl mb-3 text-white">{{$module['title']}}</h3>

                        <!-- description -->
                        <p class="text-gray-400 mb-6 flex-grow">{{$module['description']}}</p>

                        <!-- footer -->
                        <div
                            class="flex items-center justify-between pt-4 border-t border-white/10">
                            <span class="text-sm text-gray-500">
                                {{$module['lessons_count']}} уроков
                            </span>

                            <div
                                class="w-12 h-1 rounded-full opacity-50 {{$module['color']}}"
                            ></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- price block -->
        <div class="mt-16 text-center">
            <div
                x-data="{ show: false }"
                x-init="setTimeout(() => show = true, 800)"
                x-show="show"
                x-transition.opacity.duration-700
                class="
                    inline-block p-8 rounded-2xl
                    bg-gradient-to-r from-cyan-500/10 to-purple-500/10
                    border border-cyan-500/30
                "
            >
                <p class="text-2xl sm:text-xl mb-4">
                    <span class="text-gray-400">Полный доступ ко всем модулям:</span>
                    <span class="text-cyan-400 text-4xl sm:text-3xl">100 ₽</span>
                </p>
                <p class="text-gray-500">
                    Абсурдная ценность за минимальную цену
                </p>
            </div>
        </div>

    </div>
</section>

