<footer
    x-data="footerParticles()"
    x-init="init()"
    class="relative bg-black border-t border-white/10 overflow-hidden"
>
    <!-- canvas -->
    <canvas
        x-ref="canvas"
        class="absolute inset-0 w-full h-full opacity-30"
    ></canvas>

    <div class="relative z-10 max-w-7xl mx-auto px-6 py-16">

        <!-- heading -->
        <div
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 100)"
            x-show="show && !$store.user.is_full_access"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 translate-y-6"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="text-center mb-12"
        >
            <h3 class="text-4xl lg:text-3xl sm:text-2xl mb-4 bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent">
                Готовы понять ИИ?
            </h3>
            <p class="text-gray-400 text-lg sm:text-base">
                Структурированные знания. Чистая информация. Один клик.
            </p>
        </div>

        <!-- CTA -->
        <div
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 250)"
            x-show="show && !$store.user.is_full_access"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 translate-y-6"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="flex justify-center mb-12"
        >
            <a
                href="{{route('portal.payment')}}" wire:navigate
                class="
                    px-12 py-5 rounded-xl text-xl sm:text-lg
                    bg-gradient-to-r from-cyan-500 to-purple-600
                    hover:scale-105 transition-transform
                    shadow-2xl shadow-purple-500/50
                "
            >
                Начать за 100 ₽
            </a>
        </div>

        <!-- bottom -->
        <div
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 550)"
            x-show="show"
            x-transition.opacity.duration-700
            class="pt-8 border-t border-white/10 text-center"
        >
            <p class="text-gray-600 text-sm">
                © 2026 AI Нейросети-просто. Все права защищены, а данные взяты из открытых источников.
            </p>
            <div class="flex gap-2 mx-auto text-center justify-center">
                <a download href="/fixed/contacts-public.pdf" class="text-gray-700 text-sm mt-2">
                    Контактные данные и реквизиты
                </a>
                <a download href="/fixed/oferta-public.pdf" class="text-gray-700 text-sm mt-2">
                    Публичная оферта
                </a>
            </div>
        </div>

    </div>
</footer>


<script>
    function footerParticles() {
        return {
            canvas: null,
            ctx: null,
            particles: [],

            init() {
                this.canvas = this.$refs.canvas;
                this.ctx = this.canvas.getContext('2d');

                this.resize();
                window.addEventListener('resize', () => this.resize());

                for (let i = 0; i < 30; i++) {
                    this.particles.push({
                        x: Math.random() * this.canvas.width,
                        y: Math.random() * this.canvas.height,
                        vx: (Math.random() - 0.5) * 0.3,
                        vy: (Math.random() - 0.5) * 0.3,
                        r: Math.random() * 2 + 1,
                    });
                }

                requestAnimationFrame(() => this.animate());
            },

            resize() {
                this.canvas.width = window.innerWidth;
                this.canvas.height = 400;
            },

            animate() {
                const ctx = this.ctx;
                const c = this.canvas;

                ctx.fillStyle = 'rgba(0,0,0,0.1)';
                ctx.fillRect(0, 0, c.width, c.height);

                this.particles.forEach(p => {
                    p.x += p.vx;
                    p.y += p.vy;

                    if (p.x < 0 || p.x > c.width) p.vx *= -1;
                    if (p.y < 0 || p.y > c.height) p.vy *= -1;

                    ctx.fillStyle = 'rgba(168,85,247,0.3)';
                    ctx.shadowBlur = 5;
                    ctx.shadowColor = 'rgba(168,85,247,0.5)';
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                    ctx.fill();
                    ctx.shadowBlur = 0;
                });

                requestAnimationFrame(() => this.animate());
            }
        }
    }
</script>

