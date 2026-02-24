<div
    x-data="authComponent()"
    x-init="initCanvas()"
    class="min-h-screen bg-black pt-32 pb-16 px-6 flex items-center justify-center"
>

    <!-- Canvas background -->
    <canvas
        x-ref="canvas"
        class="absolute inset-0 w-full h-full"
    ></canvas>

    <!-- Gradient overlays -->
    <div
        class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 via-transparent to-purple-500/10 pointer-events-none"></div>
    <div
        class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500 rounded-full blur-[150px] opacity-20"></div>
    <div
        class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500 rounded-full blur-[150px] opacity-20"></div>


    <!-- Card -->
    <div class="relative z-10 w-full max-w-md">

        <!-- Auth card -->
        <div class="p-8 rounded-2xl bg-white/5 backdrop-blur-xl border border-white/10 shadow-2xl">
            <p class="text-gray-400  text-center mb-8"
               x-text="isLogin
                    ? 'Войдите, чтобы продолжить обучение'
                    : 'Начните своё путешествие в мир ИИ'">
            </p>
            <!-- Toggle -->
            <div class="flex mb-8 p-1 bg-white/5 rounded-xl border border-white/10">
                <button
                    @click="isLogin = true"
                    class="flex-1 py-3 rounded-lg relative transition-all"
                    :class="isLogin ? 'text-white' : 'text-gray-500'"
                >
                    <span
                        x-show="isLogin"
                        class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-lg"
                    ></span>
                    <span class="relative z-10">Вход</span>
                </button>

                <button
                    @click="isLogin = false"
                    class="flex-1 py-3 rounded-lg relative transition-all"
                    :class="!isLogin ? 'text-white' : 'text-gray-500'"
                >
                    <span
                        x-show="!isLogin"
                        class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-600 rounded-lg"
                    ></span>
                    <span class="relative z-10">Регистрация</span>
                </button>
            </div>

            <!-- Form -->
            <form @submit.prevent="submit()" class="space-y-5">

                <div x-show="!isLogin" x-transition>
                    <x-ui.input.text
                        name="name"
                        label="Имя"
                        autocomplete="name"
                        wire:model="name"
                    />
                </div>


                <x-ui.input.text
                    name="email"
                    label="Email"
                    id="email"
                    wire:model="email"
                />

                <x-ui.input.password
                    name="password"
                    label="Пароль"
                    autocomplete="password"
                    wire:model="password"
                />

                <div x-show="!isLogin" x-transition>
                    <x-ui.input.password
                        name="password_confirmation"
                        label="Пароль"
                        autocomplete="password_confirmation"
                        wire:model="password_confirmation"
                    />
                </div>

                <!-- Remember -->
                <div x-show="isLogin" class="flex justify-between text-sm">
                    <label class="flex items-center gap-2 text-gray-400">
                        <input type="checkbox" class="rounded bg-white/5 border-white/10">
                        Запомнить меня
                    </label>
                    <button type="button" class="text-cyan-400">Забыли пароль?</button>
                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full py-4 bg-gradient-to-r from-cyan-500 to-purple-600
                           rounded-xl hover:scale-105 transition-all shadow-lg"
                >
                    <span x-text="isLogin ? 'Войти' : 'Создать аккаунт'"></span>
                </button>
            </form>


            <!-- Hint -->
            <div x-show="!isLogin" x-transition
                 class="mt-6 p-4 rounded-xl bg-gradient-to-r from-cyan-500/10 to-purple-500/10
                        border border-cyan-500/30 text-sm text-gray-300">
                После регистрации вы получите бесплатные уроки.
                Полный доступ — <span class="text-cyan-400">100 ₽</span>
            </div>

            <!-- Switch -->
            <p class="text-center text-xs text-gray-600 mt-6">
                <span x-text="isLogin ? 'Нет аккаунта?' : 'Уже есть аккаунт?'"></span>
                <button
                    @click="isLogin = !isLogin"
                    class="text-cyan-400 ml-1"
                    x-text="isLogin ? 'Зарегистрируйтесь' : 'Войдите'"
                ></button>
            </p>

            @if ($errors->any())
                <div class="mt-4 p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-sm text-red-300">
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>


<script>
    function authComponent() {
        return {
            isLogin: true,
            email: '',
            password: '',
            name: '',

            submit() {
                if (this.isLogin) {
                    // Вход
                    this.$wire.login()
                } else {
                    // Регистрация
                    this.$wire.register()
                }
            },

            initCanvas() {
                const canvas = this.$refs.canvas
                const ctx = canvas.getContext('2d')

                const resize = () => {
                    canvas.width = window.innerWidth
                    canvas.height = window.innerHeight
                }
                resize()
                window.addEventListener('resize', resize)

                const particles = Array.from({length: 40}).map(() => ({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    vx: (Math.random() - 0.5) * 0.4,
                    vy: (Math.random() - 0.5) * 0.4,
                    r: Math.random() * 2 + 1,
                    hue: Math.random() * 60 + 180
                }))

                const animate = () => {
                    ctx.fillStyle = 'rgba(0,0,0,0.05)'
                    ctx.fillRect(0, 0, canvas.width, canvas.height)

                    particles.forEach((p, i) => {
                        p.x += p.vx
                        p.y += p.vy

                        if (p.x < 0 || p.x > canvas.width) p.vx *= -1
                        if (p.y < 0 || p.y > canvas.height) p.vy *= -1

                        particles.forEach((o, j) => {
                            if (i === j) return
                            const d = Math.hypot(p.x - o.x, p.y - o.y)
                            if (d < 120) {
                                ctx.strokeStyle = `hsla(${p.hue},100%,60%,${(1 - d / 120) * 0.3})`
                                ctx.beginPath()
                                ctx.moveTo(p.x, p.y)
                                ctx.lineTo(o.x, o.y)
                                ctx.stroke()
                            }
                        })

                        ctx.fillStyle = `hsl(${p.hue},100%,60%)`
                        ctx.beginPath()
                        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2)
                        ctx.fill()
                    })

                    requestAnimationFrame(animate)
                }

                animate()
            }
        }
    }
</script>
