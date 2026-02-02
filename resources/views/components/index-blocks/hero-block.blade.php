<section
    x-data="heroNetwork()"
    x-init="init()"
    class="relative min-h-screen flex items-center justify-center overflow-hidden bg-black"
>
    <!-- DESKTOP canvas -->
    <canvas
        x-ref="canvas"
        x-show="isDesktop"
        class="absolute inset-0 w-full h-full"
    ></canvas>

    <!-- MOBILE gradient -->
    <div x-show="!isDesktop" class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/20 via-blue-500/10 to-purple-600/20 bg-200 animate-gradient"></div>

        <div class="absolute -top-24 -left-24 w-96 h-96 bg-cyan-500/30 rounded-full blur-[120px] animate-float"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-500/30 rounded-full blur-[140px] animate-float-slow"></div>
    </div>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/30 to-black"></div>


    <!-- Content -->
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">

        <!-- Title -->
        <div
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 200)"
            x-show="show"
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 translate-y-8"
            x-transition:enter-end="opacity-100 translate-y-0"
        >
            <h1 class="mb-6 tracking-tight">
        <span
            class="md:!text-6xl lg:text-7xl text-8xl  bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent">
          Этот сайт создал ИИ
        </span>
                <br/>
                <span class="md:!text-4xl lg:text-5xl text-7xl  text-white mt-4 block">
          Теперь твоя очередь <br>понять его
        </span>
            </h1>
        </div>

        <!-- Subtitle -->
        <p
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 400)"
            x-show="show"
            x-transition
            class="md:text-xl text-2xl text-gray-300 mb-4 max-w-3xl mx-auto"
        >
            Структурированная система знаний об ИИ: нейросети, модели и концепции —
            всё в одном месте, всего за
            <span class="text-cyan-400 font-semibold">100 рублей</span>
        </p>

        <!-- Description -->
        <p
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 600)"
            x-show="show"
            x-transition
            class="md:text-sm text-base text-gray-500 mb-12"
        >
            Десятки уроков. Ясные объяснения. Никакого информационного шума.
        </p>

        <!-- Buttons -->
        <div
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 800)"
            x-show="show"
            x-transition
            class="flex md:flex-col gap-4 justify-center items-center"
        >
            <a href="/#modules"
                class="group relative px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-lg overflow-hidden transition-all hover:scale-105"
            >
                <div
                    class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <span class="relative text-lg font-semibold text-white">
          Изучить модули
        </span>
            </a>

            <a href="{{route('portal.payment')}}" wire:navigate
                class="group relative px-8 py-4 border-2 border-purple-500 rounded-lg overflow-hidden transition-all hover:scale-105"
            >
                <div
                    class="absolute inset-0 bg-purple-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <span class="relative text-lg font-semibold text-white">
          Получить доступ за 100 ₽
        </span>
            </a>
        </div>
    </div>
</section>

<script>
    function heroNetwork() {
        return {
            isDesktop: false,
            canvas: null,
            ctx: null,
            nodes: [],
            rafId: null,

            init() {
                this.isDesktop = window.innerWidth > 1023

                window.addEventListener('resize', () => {
                    const next = window.innerWidth > 1023
                    if (next !== this.isDesktop) {
                        this.isDesktop = next
                        next ? this.startCanvas() : this.stopCanvas()
                    }
                })

                if (this.isDesktop) {
                    this.startCanvas()
                }
            },

            startCanvas() {
                this.canvas = this.$refs.canvas
                this.ctx = this.canvas.getContext('2d')
                this.resize()

                this.nodes = Array.from({length: 50}).map(() => ({
                    x: Math.random() * this.canvas.width,
                    y: Math.random() * this.canvas.height,
                    vx: (Math.random() - 0.5) * 0.5,
                    vy: (Math.random() - 0.5) * 0.5
                }))

                this.animate()
            },

            stopCanvas() {
                cancelAnimationFrame(this.rafId)
                if (this.ctx) {
                    this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height)
                }
            },

            resize() {
                this.canvas.width = window.innerWidth
                this.canvas.height = window.innerHeight
            },

            animate() {
                const ctx = this.ctx
                const canvas = this.canvas

                ctx.fillStyle = 'rgba(0,0,0,0.05)'
                ctx.fillRect(0, 0, canvas.width, canvas.height)

                this.nodes.forEach((n, i) => {
                    n.x += n.vx
                    n.y += n.vy

                    if (n.x < 0 || n.x > canvas.width) n.vx *= -1
                    if (n.y < 0 || n.y > canvas.height) n.vy *= -1

                    this.nodes.forEach((o, j) => {
                        if (i === j) return
                        const d = Math.hypot(n.x - o.x, n.y - o.y)
                        if (d < 150) {
                            ctx.strokeStyle = `rgba(0,217,255,${(1 - d / 150) * 0.25})`
                            ctx.beginPath()
                            ctx.moveTo(n.x, n.y)
                            ctx.lineTo(o.x, o.y)
                            ctx.stroke()
                        }
                    })

                    ctx.fillStyle = '#00D9FF'
                    ctx.beginPath()
                    ctx.arc(n.x, n.y, 2, 0, Math.PI * 2)
                    ctx.fill()
                })

                this.rafId = requestAnimationFrame(() => this.animate())
            }
        }
    }
</script>
