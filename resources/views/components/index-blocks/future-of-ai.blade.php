<section
    class="relative py-32 px-6 bg-black overflow-hidden min-h-screen flex items-center"
>
    <!-- background pulses -->
    <div class="absolute inset-0 pointer-events-none">
        <div
            class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500 rounded-full blur-[150px] opacity-20 animate-pulse"
            style="animation-duration: 4s"
        ></div>

        <div
            class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500 rounded-full blur-[150px] opacity-20 animate-pulse"
            style="animation-duration: 6s; animation-delay: 1s"
        ></div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto text-center">

        <!-- title -->
        <div
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 100)"
            x-show="show"
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 translate-y-12"
            x-transition:enter-end="opacity-100 translate-y-0"
        >
            <h2 class="text-8xl lg:text-6xl sm:!text-5xl mb-8 leading-tight">
                <span class="bg-gradient-to-r from-cyan-400 via-purple-500 to-pink-500 bg-clip-text text-transparent">
                    Будущее ИИ
                </span>
            </h2>
        </div>

        <!-- subtitle -->
        <p
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 300)"
            x-show="show"
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 translate-y-8"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="text-3xl lg:text-2xl sm:text-xl text-gray-300 mb-12 max-w-3xl mx-auto leading-relaxed"
        >
            Мы не знаем точно, куда идёт искусственный интеллект.
            <br />
            <span class="text-cyan-400">
                Но мы знаем, как он работает сегодня.
            </span>
        </p>

        <!-- body -->
        <div
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 500)"
            x-show="show"
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 translate-y-8"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="space-y-6 max-w-2xl mx-auto"
        >
            <p class="text-lg text-gray-400 leading-relaxed">
                Понимание фундаментальных принципов позволяет вам не просто использовать ИИ,
                но и предвидеть его развитие, участвовать в его создании,
                критически оценивать его ограничения.
            </p>

            <p class="text-lg text-gray-400 leading-relaxed">
                Это не хайп. Это перспектива.
            </p>
        </div>

        <!-- price -->
        <div
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 700)"
            x-show="show"
            x-transition:enter="transition ease-out duration-800"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            class="mt-16"
        >
            <div
                class="inline-block p-1 rounded-2xl
                       bg-gradient-to-r from-cyan-500 via-purple-500 to-pink-500"
            >
                <div class="px-12 py-6 bg-black rounded-xl">
                    <p class="text-sm text-gray-400 mb-2">
                        Начните понимать ИИ сегодня
                    </p>
                    <p class="text-5xl sm:text-4xl">
                        <span class="text-gray-400">всего</span>
                        <span class="bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent">
                            100 ₽
                        </span>
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>
