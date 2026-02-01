<section
    x-data="heroNetwork()"
    x-init="init()"
    class="relative min-h-screen flex items-center justify-center overflow-hidden bg-black"
>
    <!-- Canvas -->
    <canvas
        x-ref="canvas"
        class="absolute inset-0 w-full h-full"
    ></canvas>

    <!-- Overlay gradient -->
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/20 to-black pointer-events-none"></div>

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
            <h1 class="md:!text-6xl lg:text-7xl text-8xl mb-6 tracking-tight">
        <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent">
          Этот сайт создал ИИ
        </span>
                <br />
                <span class="text-white mt-4 block">
          Теперь твоя очередь понять его
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
            <button
                class="group relative px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-lg overflow-hidden transition-all hover:scale-105"
            >
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <span class="relative text-lg font-semibold text-white">
          Изучить модули
        </span>
            </button>

            <button
                class="group relative px-8 py-4 border-2 border-purple-500 rounded-lg overflow-hidden transition-all hover:scale-105"
            >
                <div class="absolute inset-0 bg-purple-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <span class="relative text-lg font-semibold text-white">
          Получить доступ за 100 ₽
        </span>
            </button>
        </div>
    </div>
</section>

<script>
    function heroNetwork() {
        return {
            canvas: null,
            ctx: null,
            nodes: [],

            init() {
                this.canvas = this.$refs.canvas;
                this.ctx = this.canvas.getContext('2d');

                this.resize();
                window.addEventListener('resize', () => this.resize());

                for (let i = 0; i < 50; i++) {
                    this.nodes.push({
                        x: Math.random() * this.canvas.width,
                        y: Math.random() * this.canvas.height,
                        vx: (Math.random() - 0.5) * 0.5,
                        vy: (Math.random() - 0.5) * 0.5
                    });
                }

                requestAnimationFrame(() => this.animate());
            },

            resize() {
                this.canvas.width = window.innerWidth;
                this.canvas.height = window.innerHeight;
            },

            animate() {
                const ctx = this.ctx;
                const canvas = this.canvas;

                ctx.fillStyle = 'rgba(0,0,0,0.05)';
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                this.nodes.forEach((node, i) => {
                    node.x += node.vx;
                    node.y += node.vy;

                    if (node.x < 0 || node.x > canvas.width) node.vx *= -1;
                    if (node.y < 0 || node.y > canvas.height) node.vy *= -1;

                    this.nodes.forEach((other, j) => {
                        if (i === j) return;

                        const dx = node.x - other.x;
                        const dy = node.y - other.y;
                        const dist = Math.sqrt(dx * dx + dy * dy);

                        if (dist < 150) {
                            ctx.strokeStyle = `rgba(0,217,255,${(1 - dist / 150) * 0.3})`;
                            ctx.lineWidth = 1;
                            ctx.beginPath();
                            ctx.moveTo(node.x, node.y);
                            ctx.lineTo(other.x, other.y);
                            ctx.stroke();
                        }
                    });

                    ctx.fillStyle = '#00D9FF';
                    ctx.shadowBlur = 10;
                    ctx.shadowColor = '#00D9FF';
                    ctx.beginPath();
                    ctx.arc(node.x, node.y, 2, 0, Math.PI * 2);
                    ctx.fill();
                    ctx.shadowBlur = 0;
                });

                requestAnimationFrame(() => this.animate());
            }
        };
    }
</script>

