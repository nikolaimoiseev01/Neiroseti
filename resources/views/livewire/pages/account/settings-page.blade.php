<div
    x-data="{
        editing: false,
        saved: false,
        init() {
            Livewire.on('profile-saved', () => {
                this.saved = true
                this.editing = false
                setTimeout(() => this.saved = false, 3000)
            })
        }
    }"
    class="min-h-screen bg-black pt-24 pb-16 px-6"
>
    <div class="max-w-6xl mx-auto">

        {{-- Header --}}
        <div class="mb-12">
            <div class="flex items-center gap-3 mb-4">
                <h1 class="text-5xl bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent">
                    Настройки
                </h1>
            </div>
            <p class="text-xl text-gray-400">Управление профилем и транзакциями</p>
        </div>

        <div class="grid grid-cols-3 md:grid-cols-1 gap-8">

            {{-- PROFILE --}}
            <div class="col-span-2 md:col-span-1 space-y-6">

                <div class="p-8 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-xl">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl text-white">Профиль</h2>

                        <button
                            x-show="!editing"
                            @click="editing = true"
                            class="px-4 py-2 bg-cyan-500/20 border border-cyan-500/50 rounded-lg text-sm text-cyan-400 hover:bg-cyan-500/30 transition"
                        >
                            Редактировать
                        </button>
                    </div>

                    {{-- Name --}}
                    <div class="mb-6">
                        <label class="text-sm text-gray-400 mb-2 block">Имя</label>
                        <input
                            type="text"
                            wire:model.defer="name"
                            :disabled="!editing"
                            class="w-full px-4 py-3 bg-white/5 border rounded-xl transition
                                border-white/10 text-white
                                focus:outline-none focus:ring-2 focus:ring-cyan-500/20"
                        />
                    </div>

                    {{-- Email --}}
                    <div class="mb-6">
                        <label class="text-sm text-gray-400 mb-2 block">Email</label>
                        <input
                            type="email"
                            wire:model.defer="email"
                            :disabled="!editing"
                            class="w-full px-4 py-3 bg-white/5 border rounded-xl transition
                                border-white/10 text-white
                                focus:outline-none focus:ring-2 focus:ring-cyan-500/20"
                        />
                    </div>

                    {{-- Actions --}}
                    <div x-show="editing" x-transition class="flex gap-3">
                        <button
                            wire:click="save"
                            class="flex-1 px-6 py-3 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-xl text-white hover:scale-105 transition"
                        >
                            Сохранить
                        </button>

                        <button
                            @click="editing = false"
                            class="px-6 py-3 bg-white/5 border border-white/10 rounded-xl text-gray-300 hover:bg-white/10"
                        >
                            Отмена
                        </button>
                    </div>

                    {{-- Saved --}}
                    <div
                        x-show="saved"
                        x-transition
                        class="mt-4 px-4 py-3 bg-green-500/20 border border-green-500/50 rounded-xl text-green-400 text-sm"
                    >
                        Изменения сохранены
                    </div>
                </div>

                {{-- TRANSACTIONS --}}
                <div class="p-8 rounded-2xl bg-white/5 border border-white/10">
                    <h2 class="text-2xl text-white mb-6">История транзакций</h2>

                    @if(count($transactions))
                        <div class="space-y-4">
                            @foreach($transactions as $tx)
                                <div class="p-6 rounded-xl bg-white/5 border border-white/10">
                                    <div class="flex justify-between">
                                        <div>
                                            <div class="text-lg text-white">{{ $tx['description'] }}</div>
                                            <div class="text-sm text-gray-400">{{ $tx['date'] }}</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-xl text-cyan-400">{{ $tx['amount'] }}</div>
                                            <div class="text-xs text-green-400">Завершено</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center text-gray-500 py-12">
                            Нет транзакций
                        </div>
                    @endif
                </div>
            </div>

            {{-- SIDEBAR --}}
            <div class="space-y-6">
                <div class="p-6 rounded-2xl bg-white/5 border border-white/10">
                    <h3 class="text-lg text-white mb-4">Статус аккаунта</h3>

                    @if($isPaid)
                        <div class="p-4 bg-green-500/20 border border-green-500/50 rounded-xl text-green-400">
                            Полный доступ
                        </div>
                    @else
                        <div class="p-4 bg-orange-500/20 border border-orange-500/50 rounded-xl text-orange-400">
                            Бесплатный
                        </div>
                    @endif
                </div>

                <div class="p-6 rounded-2xl bg-gradient-to-br from-cyan-500/10 to-purple-500/10 border border-cyan-500/30">
                    <h3 class="text-lg mb-3 text-white">💡 Совет</h3>
                    <p class="text-sm text-gray-400">
                        Держите профиль актуальным для получения уведомлений
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
