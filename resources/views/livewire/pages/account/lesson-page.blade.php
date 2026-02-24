<div
    x-data="lessonPage({
        isPaid: $store.user.is_full_access,
        module: @js($module),
        lesson: @js($lesson),
    })"
    class="min-h-screen bg-black pt-24 pb-16 px-6"
>
    <div class="max-w-4xl mx-auto">

        {{-- LOCKED --}}
        <template x-if="!isPaid">
            <div class="text-center py-20">
                <div class="w-24 h-24 mx-auto mb-8 rounded-2xl
                            bg-orange-500/20 border border-orange-500/50
                            flex items-center justify-center">
                    <svg class="w-12 h-12 text-orange-400" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor">
                        <path stroke-width="2" d="M12 17v-2m-3-4V7a3 3 0 016 0v4"/>
                        <rect x="5" y="11" width="14" height="10" rx="2"/>
                    </svg>
                </div>

                <h1 class="text-4xl mb-4">Этот урок заблокирован</h1>

                <p class="text-xl text-gray-400 mb-8">
                    Получите полный доступ ко всем урокам за {{\App\Models\Transaction::FULL_ACCESS_PRICE}} ₽
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a
                        wire:navigate
                        href="{{route('portal.payment')}}"
                        class="px-8 py-4 rounded-xl
                               bg-gradient-to-r from-teal-300 to-purple-500
                               hover:scale-105 transition-transform">
                        Получить доступ
                    </a>

                    <a wire:navigate
                        href="{{route('account.dashboard')}}"
                        class="px-8 py-4 rounded-xl border border-white/20
                               hover:bg-white/5 transition">
                        Вернуться назад
                    </a>
                </div>
            </div>
        </template>

        @if(Auth()->user()->is_full_access)
            {{-- CONTENT --}}
            <template x-if="isPaid">

                <div>

                    {{-- BACK --}}
                    <a
                        href="{{route('account.dashboard')}}" wire:navigate
                        class="flex items-center gap-2 text-gray-400 hover:text-white mb-8 transition"
                    >
                        ← Назад к модулям
                    </a>

                    {{-- MODULE TAG --}}
                    <div class="mb-6">
                        <div class="inline-flex px-4 py-2 rounded-lg border"
                             :class="module.color">
                            <span class="text-sm text-white" x-text="module.title"></span>
                        </div>
                    </div>

                    {{-- HEADER --}}
                    <div class="mb-12">
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                        <span>
                            Урок <span x-text="lessonIndex + 1"></span>
                            из <span x-text="module.lessons.length"></span>
                        </span>
                            <span>⏱ <span x-text="lesson.duration"></span></span>
                        </div>

                        <h1 class="text-4xl mb-4 text-white" x-text="lesson.title"></h1>
                        <p class="text-xl text-gray-400" x-text="lesson.description"></p>
                    </div>
                    <article
                        class="
        prose prose-lg prose-invert max-w-none
        prose-h2:text-2xl
        prose-h3:text-xl
        prose-h3:mt-10
        prose-h3:font-semibold
        prose-p:leading-relaxed
        prose-ul:my-6
        prose-li:my-2
        prose-pre:bg-gray-900
        prose-pre:rounded-xl
        prose-pre:p-5
        prose-pre:text-base
    "
                    >
                        {!! $lesson->content !!}
                    </article>
                </div>
            </template>
        @endif
    </div>
</div>


<script>
    function lessonPage({isPaid, module, lesson}) {
        return {
            isPaid,
            module,
            lesson,
            expandedQuiz: [],

            get lessonIndex() {
                return this.module.lessons.findIndex(l => l.id === this.lesson.id)
            },

            toggleQuiz(index) {
                this.expandedQuiz.includes(index)
                    ? this.expandedQuiz = this.expandedQuiz.filter(i => i !== index)
                    : this.expandedQuiz.push(index)
            }
        }
    }
</script>
