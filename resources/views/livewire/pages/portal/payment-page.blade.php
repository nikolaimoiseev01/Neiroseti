<div
    x-data="paymentComponent()"
    class="min-h-screen bg-black pt-24 pb-16 px-6"
>
    <div class="max-w-4xl mx-auto">

        <!-- Header -->
        <div class="text-center mb-12">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                       bg-purple-500/20 border border-purple-500/50 mb-6"
            >
                ✨
                <span class="text-sm text-purple-300">Специальное предложение</span>
            </div>

            <h1 class="text-5xl mb-4">
                <span
                    class="bg-gradient-to-r from-cyan-400 to-purple-500
                           bg-clip-text text-transparent"
                >
                    Получите полный доступ
                </span>
            </h1>

            <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                Разблокируйте все знания об искусственном интеллекте
            </p>
        </div>

        <!-- Content -->
        <div class="grid grid-cols-2 md:grid-cols-1 gap-8">

            <!-- Pricing -->
            <div class="">
                <div
                    class="p-8 rounded-2xl
                           bg-gradient-to-br from-white/10 to-white/5
                           border border-white/20"
                >
                    <div class="mb-8">
                        <div class="text-sm text-gray-400 mb-2">
                            Единоразовый платёж
                        </div>

                        <div class="flex items-baseline gap-2">
                            <span
                                class="text-6xl bg-gradient-to-r
                                       from-cyan-400 to-purple-500
                                       bg-clip-text text-transparent"
                            >
                                100
                            </span>
                            <span class="text-2xl text-gray-400">₽</span>
                        </div>

                        <div class="text-sm text-gray-500 mt-2">
                            Пожизненный доступ
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="space-y-4 mb-8">
                        <template x-for="feature in features" :key="feature">
                            <div class="flex items-start gap-3">
                                <span class="text-cyan-400 mt-0.5">✔</span>
                                <span class="text-gray-300" x-text="feature"></span>
                            </div>
                        </template>
                    </div>

                    <!-- Pay button -->
                    <a
                        href="{{route('account.dashboard')}}"
                        wire:navigate
                        class="w-full py-4 rounded-xl text-lg
                               bg-gradient-to-r from-cyan-500 to-purple-600
                               hover:scale-105 transition-transform
                               shadow-2xl shadow-purple-500/30
                               flex items-center justify-center gap-2
                               disabled:opacity-50 disabled:cursor-not-allowed text-white"
                    >
                        <x-bi-lock class="w-5 h-5 "/>
                        <span x-show="!loading">
                            Оплатить 100 ₽</span>
                        <span x-show="loading">Оплата…</span>
                    </a>

                    <div class="mt-4 text-center text-xs text-gray-500">
                        Безопасная оплата • Возврат в течение 14 дней
                    </div>
                </div>
            </div>

            <!-- Value -->
            <div class="space-y-6">

                <div
                    class="p-6 rounded-2xl
                           bg-gradient-to-br from-cyan-500/10 to-transparent
                           border border-cyan-500/30"
                >
                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 rounded-lg bg-cyan-500/20 flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="lucide lucide-zap w-6 h-6 text-cyan-400" aria-hidden="true">
                                <path
                                    d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>
                            </svg>
                        </div>
                        <div><h3 class="text-xl mb-2 text-white">Абсурдная ценность</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">Знания, собранные из
                                сотен источников, систематизированные и объяснённые — всё это обычно
                                стоит тысячи рублей.</p></div>
                    </div>
                </div>

                <div
                    class="p-6 rounded-2xl
                           bg-gradient-to-br from-purple-500/10 to-transparent
                           border border-purple-500/30"
                >
                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 rounded-lg bg-purple-500/20 flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="lucide lucide-sparkles w-6 h-6 text-purple-400"
                                 aria-hidden="true">
                                <path
                                    d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path>
                                <path d="M20 2v4"></path>
                                <path d="M22 4h-4"></path>
                                <circle cx="4" cy="20" r="2"></circle>
                            </svg>
                        </div>
                        <div><h3 class="text-xl mb-2 text-white">Не просто курс</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">Это структурированная
                                база знаний, к которой вы сможете возвращаться снова и снова.</p>
                        </div>
                    </div>
                </div>

                <div
                    class="p-6 rounded-2xl
                           bg-gradient-to-br from-blue-500/10 to-transparent
                           border border-blue-500/30"
                >
                    <h3 class="text-xl mb-3 text-white">Что вы получите:</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li>• {{ $modules }} полноценных модулей</li>
                        <li>• {{ $totalLessons }} подробных уроков</li>
                        <li>• Визуальные схемы и объяснения</li>
                        <li>• Понятную структуру без воды</li>
                        <li>• Доступ навсегда, без подписки</li>
                    </ul>
                </div>

                <button
                    @click="back()"
                    class="text-gray-400 hover:text-white transition-colors text-sm"
                >
                    ← Вернуться назад
                </button>
            </div>
        </div>

        <!-- Trust -->
        <div class="mt-12 pt-8 border-t border-white/10">
            <div class="grid grid-cols-3 md:grid-cols-1 gap-8 text-center">
                <div>
                    <div class="text-3xl mb-2">🔒</div>
                    <div class="text-sm text-gray-400">Безопасная оплата</div>
                </div>
                <div>
                    <div class="text-3xl mb-2">♾️</div>
                    <div class="text-sm text-gray-400">Доступ навсегда</div>
                </div>
                <div>
                    <div class="text-3xl mb-2">⚡</div>
                    <div class="text-sm text-gray-400">Мгновенный доступ</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function paymentComponent() {
        return {
            loading: false,

            features: [
                'Полный доступ ко всем модулям',
                '{{ $totalLessons }} уроков без ограничений',
                'Структурированная программа обучения',
                'Визуальные объяснения и диаграммы',
                'Пожизненный доступ к материалам',
                'Обновления контента бесплатно'
            ],

            pay() {
                if (this.loading) return

                this.loading = true

                // 🔧 тут потом реальная оплата
                setTimeout(() => {
                    window.location.hash = 'account'
                }, 1000)
            },

            back() {
                window.history.back()
            }
        }
    }
</script>
