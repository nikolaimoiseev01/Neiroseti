<section class="relative py-32 px-6 bg-gradient-to-b from-black via-gray-900 to-black overflow-hidden">

    <!-- background glow -->
    <div class="absolute inset-0 opacity-20 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500 rounded-full blur-[120px]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto">

        <!-- heading -->
        <div class="text-center mb-20">
            <h2 class="text-5xl xl:text-5xl lg:text-4xl sm:text-3xl mb-6 text-white">
                Почему эта платформа?
            </h2>
            <p class="text-xl lg:text-lg sm:text-base text-gray-400 max-w-2xl mx-auto">
                Метафора: сжатые данные → чистая система
            </p>
        </div>

        <!-- cards -->
        <div
            x-data="whyPlatform()"
            class="
                grid grid-cols-4
                lg:grid-cols-2
                sm:!grid-cols-1
                gap-6
            "
        >
            <template x-for="(feature, index) in features" :key="feature.title">
                <div
                    x-data="{ show: false }"
                    x-init="setTimeout(() => show = true, index * 120)"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 translate-y-8"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="
                        group relative p-8 rounded-2xl
                        bg-white/5 backdrop-blur-sm
                        border border-white/10
                        hover:border-cyan-500/50
                        transition-all duration-300
                        hover:-translate-y-1.5
                    "
                >
                    <!-- hover gradient -->
                    <div
                        class="absolute inset-0 rounded-2xl
                               bg-gradient-to-br from-cyan-500/10 to-purple-500/10
                               opacity-0 group-hover:opacity-100
                               transition-opacity duration-300"
                    ></div>

                    <div class="relative">
                        <!-- icon -->
                        <div
                            class="w-12 h-12 mb-6 rounded-lg
                                   bg-gradient-to-br from-cyan-500 to-blue-600
                                   flex items-center justify-center"
                            x-html="feature.icon"
                        ></div>

                        <h3 class="text-xl mb-3 text-white" x-text="feature.title"></h3>

                        <p class="text-gray-400 text-sm leading-relaxed"
                           x-text="feature.description"></p>
                    </div>
                </div>
            </template>
        </div>

    </div>
</section>

<script>
    function whyPlatform() {
        return {
            features: [
                {
                    title: 'Всё структурировано',
                    description: 'Знания организованы в логичную систему, а не хаотичный набор статей',
                    icon: `
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <rect x="3" y="3" width="18" height="7" rx="2"/>
                    <rect x="3" y="14" width="18" height="7" rx="2"/>
                </svg>`
                },
                {
                    title: 'Курируется и дистиллируется',
                    description: 'Только суть, без воды. Каждый урок проверен и оптимизирован',
                    icon: `
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 3l3 6 6 3-6 3-3 6-3-6-6-3 6-3z"/>
                </svg>`
                },
                {
                    title: 'Никакого шума',
                    description: 'Никаких случайных статей, никакого хаоса — только чистая информация',
                    icon: `
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 3l7 4v6c0 5-3.5 7.5-7 9-3.5-1.5-7-4-7-9V7l7-4z"/>
                </svg>`
                },
                {
                    title: 'Сотни источников в одном',
                    description: 'Знания, обычно разбросанные по сотням источников, собраны здесь',
                    icon: `
                <svg xmlns="http://www.w3.org/200/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M13 2L3 14h7l-1 8 10-12h-7l1-8z"/>
                </svg>`
                }
            ]
        }
    }
</script>
