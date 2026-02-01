<!-- Header -->
<header
    x-data="header()"
    x-init="init()"
    :class="isScrolled
        ? 'bg-black/80 backdrop-blur-xl border-b border-white/10'
        : 'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
>
    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex items-center justify-between">

            <!-- Logo -->
            <a
                href="/"
                wire:navigate
                class="flex items-center gap-2 text-2xl"
            >
                <div
                    class="w-10 h-10 rounded-lg bg-gradient-to-br from-cyan-500 to-purple-600 flex items-center justify-center shadow-lg shadow-cyan-500/30"
                >
                    <span class="text-white text-xl">AI</span>
                </div>

                <span
                    class="sm:hidden inline bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent"
                >
                    ИИ по делу
                </span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="md:hidden flex items-center gap-8">
                <template x-for="item in navItems" :key="item.value">
                    <a
                        wire:navigate
                          @click="navigate(item.value)"
                        :href="item.href"
                        class="relative text-sm transition-colors"
                        :class="currentPage === item.value
                            ? 'text-cyan-400'
                            : 'text-gray-400 hover:text-white'"
                    >
                        <span x-text="item.label"></span>

                        <!-- Active underline -->
                        <span
                            x-show="currentPage === item.value"
                            class="absolute -bottom-1 left-0 right-0 h-0.5 bg-gradient-to-r from-cyan-500 to-purple-600"
                        ></span>
                    </a>
                </template>
            </nav>

            <!-- CTA + User -->
            <div class="flex items-center gap-4">

                <!-- Pay / Access -->
                <template x-if="!isPaid">
                    <a
                        wire:navigate
                        href="{{route('portal.payment')}}"
                        class="text-white sm:hidden flex items-center gap-2 px-6 py-2 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-lg text-sm transition-transform hover:scale-105 shadow-lg shadow-purple-500/30"
                    >
                        <x-bi-lock class="w-4 h-4 "/>
                        <span> Получить доступ</span>
                    </a>
                </template>

                <template x-if="isPaid">
                    <div
                        class="sm:hidden flex items-center gap-2 px-4 py-2 bg-green-500/20 border border-green-500/50 rounded-lg text-sm text-green-400"
                    >
                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                        Полный доступ
                    </div>
                </template>

                <!-- Account -->
                @auth()
                    <div
                        x-data="{ open: false }"
                        class="relative md:hidden"
                        @keydown.escape.window="open = false"
                    >
                        <!-- Account button -->
                        <button
                            @click="open = !open"
                            class="flex items-center gap-2 px-4 py-2 rounded-lg
               bg-white/5 border border-white/10
               hover:border-cyan-500/50 transition-colors"
                        >
                            <span class="text-sm text-gray-200">Аккаунт</span>
                            <svg
                                class="w-4 h-4 text-gray-400 transition-transform"
                                :class="open ? 'rotate-180' : ''"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <!-- Dropdown -->
                        <div
                            x-show="open"
                            x-transition.opacity.scale.origin.top.right
                            @click.outside="open = false"
                            class="absolute right-0 mt-2 w-48
               rounded-xl bg-black/90 backdrop-blur-xl
               border border-white/10 shadow-2xl
               z-50"
                        >
                            <div class="py-2">

                                <!-- Account -->
                                <a
                                    href="{{route('account.dashboard')}}"
                                    class="block px-4 py-2 text-sm text-gray-300
                       hover:bg-white/5 hover:text-white transition-colors"
                                >
                                    👤 Аккаунт
                                </a>

                                <!-- Settings -->
                                <!-- Settings -->
                                <a
                                    href="{{route('account.settings')}}"
                                    class="block px-4 py-2 text-sm text-gray-300
                       hover:bg-white/5 hover:text-white transition-colors"
                                >
                                    ⚙️ Настройки
                                </a>

                                <div class="my-1 h-px bg-white/10"></div>

                                <!-- Logout -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button
                                        type="submit"
                                        @click="open = false"
                                        class="w-full text-left px-4 py-2 text-sm text-red-400
               hover:bg-red-500/10 hover:text-red-300 transition-colors"
                                    >
                                        🚪 Выход
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth

                @guest
                    <a
                        wire:navigate
                        href="{{route('login')}}"
                        class="w-10 h-10 md:hidden rounded-lg bg-white/5 border border-white/10 hover:border-cyan-500/50 flex items-center justify-center transition-colors">
                        <x-bi-person class="w-4 h-4 text-white"/>
                    </a>
                @endguest

                <!-- Mobile menu button -->
                <button
                    @click="isMobileMenuOpen = !isMobileMenuOpen"
                    class="hidden w-10 h-10 rounded-lg bg-white/5 border border-white/10 md:flex items-center justify-center"
                >
                    <span x-show="!isMobileMenuOpen" class="text-white">☰</span>
                    <span x-show="isMobileMenuOpen" class="text-white">✕</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div
        x-show="isMobileMenuOpen"
        x-transition.opacity
        x-transition.duration.300ms
        class="hidden md:block bg-black/95 backdrop-blur-xl border-t border-white/10"
    >
        <div class="px-6 py-6 space-y-4">
            <template x-for="item in navItems" :key="item.value">
                <button
                    wire:navigate
                    :href="item.href"
                    class="block w-full text-left py-2 transition-colors"
                    :class="currentPage === item.value
                        ? 'text-cyan-400'
                        : 'text-gray-400'"
                    x-text="item.label"
                ></button>
            </template>

            <template x-if="!isPaid">
                <a
                    href="{{route('portal.payment')}}"
                    class="flex items-center justify-center gap-2 w-full px-6 py-3 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-lg text-sm"
                >
                    🔒 Получить доступ
                </a>
            </template>
        </div>
    </div>
</header>

<script>
    function header() {
        return {
            isScrolled: false,
            isMobileMenuOpen: false,
            isPaid: false,
            currentPage: null,

            navItems: [
                { label: 'Главная', href: '/', value: 'home' },
                { label: 'Модули', href: '/#modules', value: 'modules' },
                { label: 'Аккаунт', href: '/account/dashboard', value: 'account' },
            ],

            init() {
                // scroll
                window.addEventListener('scroll', () => {
                    this.isScrolled = window.scrollY > 20
                })

                // initial detect
                this.detectCurrentPage()

                // react to hash change (#modules)
                window.addEventListener('hashchange', () => {
                    this.detectCurrentPage()
                })

                // react to history navigation (Livewire / back / forward)
                window.addEventListener('popstate', () => {
                    this.detectCurrentPage()
                })
            },

            detectCurrentPage() {
                const path = window.location.pathname
                const hash = window.location.hash

                // Home
                if (path === '/' && !hash) {
                    this.currentPage = 'home'
                    return
                }

                // Modules via hash
                if (hash === '#modules') {
                    this.currentPage = 'modules'
                    return
                }

                // Account (all subpages)
                if (path.startsWith('/account')) {
                    this.currentPage = 'account'
                    return
                }

                // fallback
                this.currentPage = null
            },
        }
    }
</script>
