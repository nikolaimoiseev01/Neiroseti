<div
    x-data="paymentComponent()"
    class="min-h-screen bg-black pt-24 pb-16 px-6"
>
    <div class="max-w-4xl mx-auto">

        <!-- ВАРИАНТ 1: НЕТ ПОЛНОГО ДОСТУПА (твой текущий экран оплаты) -->
        <template x-if="!$store.user.is_full_access">
            <div>
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
                                        {{ \App\Models\Transaction::FULL_ACCESS_PRICE }}
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
                                wire:click="createPayment()"
                                class="cursor-pointer w-full py-4 rounded-xl text-lg
                                       bg-gradient-to-r from-cyan-500 to-purple-600
                                       hover:scale-105 transition-transform
                                       shadow-2xl shadow-purple-500/30
                                       flex items-center justify-center gap-2
                                       disabled:opacity-50 disabled:cursor-not-allowed text-white"
                            >
                                <x-bi-lock class="w-5 h-5" />
                                <span>
                                    Оплатить {{ \App\Models\Transaction::FULL_ACCESS_PRICE }} ₽
                                </span>
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
                                <div>
                                    <h3 class="text-xl mb-2 text-white">Максимальная ценность</h3>
                                    <p class="text-gray-400 text-sm leading-relaxed">
                                        Знания, собранные из сотен источников, систематизированные и
                                        объяснённые — всё это обычно стоит тысячи рублей.
                                    </p>
                                </div>
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
                                <div>
                                    <h3 class="text-xl mb-2 text-white">Не просто курс</h3>
                                    <p class="text-gray-400 text-sm leading-relaxed">
                                        Это структурированная база знаний, к которой вы сможете
                                        возвращаться снова и снова.
                                    </p>
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
        </template>

        <!-- ВАРИАНТ 2: ПОЛНЫЙ ДОСТУП УЖЕ ЕСТЬ -->
        <template x-if="$store.user.is_full_access">
            <div>
                <!-- Header -->
                <div class="text-center mb-12">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                               bg-emerald-500/15 border border-emerald-400/60 mb-6"
                    >
                        ✅
                        <span class="text-sm text-emerald-300">
                            Доступ уже открыт
                        </span>
                    </div>

                    <h1 class="text-5xl mb-4">
                        <span
                            class="bg-gradient-to-r from-emerald-400 to-cyan-400
                                   bg-clip-text text-transparent"
                        >
                            У вас уже есть полный доступ
                        </span>
                    </h1>

                    <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                        Все модули, уроки и материалы уже разблокированы.
                        Можно просто продолжать учиться.
                    </p>
                </div>

                <!-- Content -->
                <div class="grid grid-cols-2 md:grid-cols-1 gap-8">

                    <!-- Краткое резюме доступа -->
                    <div>
                        <div
                            class="p-8 rounded-2xl
                                   bg-gradient-to-br from-emerald-500/15 via-emerald-500/5 to-transparent
                                   border border-emerald-400/40 relative overflow-hidden"
                        >
                            <div class="absolute -right-6 -top-6 w-24 h-24 rounded-full bg-emerald-500/10 blur-2xl"></div>
                            <div class="absolute -left-10 bottom-0 w-40 h-40 rounded-full bg-cyan-500/10 blur-3xl"></div>

                            <div class="relative">
                                <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-emerald-500/20 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                             height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="lucide lucide-badge-check w-6 h-6 text-emerald-300">
                                            <path d="M15 7 9 17l-3-5" />
                                            <path
                                                d="M16 3h-8l-2.5 4.33v4.34L8 20h8l2.5-4.33v-4.34z" />
                                        </svg>
                                    </div>
                                    <div class="text-left">
                                        <div class="text-sm text-emerald-300/90">
                                            Премиум-статус активен
                                        </div>
                                        <div class="text-lg text-white font-semibold">
                                            Полный доступ ко всем материалам
                                        </div>
                                    </div>
                                </div>

                                <p class="text-gray-300 text-sm leading-relaxed mb-6">
                                    Вы уже оплатили доступ к платформе.
                                    Больше никаких платежей и подписок — просто заходите и продолжайте обучение.
                                </p>

                                <div class="space-y-3 text-sm text-gray-300 mb-8">
                                    <div class="flex items-center gap-2">
                                        <span class="text-emerald-300">✔</span>
                                        <span>Все модули и уроки доступны без ограничений</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-emerald-300">✔</span>
                                        <span>Обновления платформы — бесплатно</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-emerald-300">✔</span>
                                        <span>Можно возвращаться в любое время</span>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-3">
                                    <a
                                        wire:navigate
                                        href="{{ route('account.dashboard') }}"
                                        class="w-full py-3 rounded-xl text-base font-medium
                                               bg-emerald-500/90 hover:bg-emerald-400
                                               transition-colors
                                               shadow-lg shadow-emerald-500/30
                                               flex items-center justify-center gap-2 text-black"
                                    >
                                        <x-bi-play-fill class="w-5 h-5" />
                                        <span>Перейти к обучению</span>
                                    </a>

                                    <button
                                        @click="back()"
                                        class="w-full py-3 rounded-xl text-sm
                                               border border-white/15
                                               text-gray-300 hover:text-white
                                               hover:bg-white/5 transition-colors"
                                    >
                                        Вернуться назад
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ценность + статистика -->
                    <div class="space-y-6">

                        <div
                            class="p-6 rounded-2xl
                                   bg-gradient-to-br from-cyan-500/10 to-transparent
                                   border border-cyan-500/30"
                        >
                            <h3 class="text-xl mb-3 text-white">
                                Ваш прогресс — ваша инвестиция
                            </h3>
                            <p class="text-gray-400 text-sm leading-relaxed">
                                Деньги уже потрачены — теперь самое выгодное, что можно сделать, —
                                максимально использовать этот доступ: проходить модули, пробовать
                                инструменты и внедрять их в свои проекты.
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div
                                class="p-4 rounded-2xl
                                       bg-gradient-to-br from-purple-500/10 to-transparent
                                       border border-purple-500/30"
                            >
                                <div class="text-xs text-gray-400 mb-1">
                                    Доступные модули
                                </div>
                                <div class="text-3xl text-white font-semibold">
                                    {{ $modules }}
                                </div>
                                <div class="text-xs text-gray-500 mt-1">
                                    от основ до продвинутых тем
                                </div>
                            </div>

                            <div
                                class="p-4 rounded-2xl
                                       bg-gradient-to-br from-blue-500/10 to-transparent
                                       border border-blue-500/30"
                            >
                                <div class="text-xs text-gray-400 mb-1">
                                    Уроков в библиотеке
                                </div>
                                <div class="text-3xl text-white font-semibold">
                                    {{ $totalLessons }}
                                </div>
                                <div class="text-xs text-gray-500 mt-1">
                                    можно проходить в своём темпе
                                </div>
                            </div>
                        </div>

                        <div
                            class="p-6 rounded-2xl
                                   bg-gradient-to-br from-white/5 to-transparent
                                   border border-white/10"
                        >
                            <div class="flex items-start gap-3">
                                <div class="text-2xl">💡</div>
                                <div>
                                    <h3 class="text-base mb-1 text-white">
                                        Не нужно ничего доплачивать
                                    </h3>
                                    <p class="text-gray-400 text-sm leading-relaxed">
                                        Просто заходите в личный кабинет, выбирайте модуль
                                        и продолжайте обучение. Весь контент уже ваш.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Низ страницы -->
                <div class="mt-12 pt-8 border-t border-white/10">
                    <div class="text-center text-sm text-gray-400">
                        Спасибо за доверие к платформе. Теперь самое главное — применять знания на практике ⚡
                    </div>
                </div>
            </div>
        </template>
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
