import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    safelist: [
        'bg-gradient-to-br',
        'from-indigo-500',
        'to-purple-600',
        'from-cyan-500',
        'to-blue-600',
        'from-pink-500',
        'to-rose-600',
        'from-emerald-500',
        'to-teal-600',
        'from-amber-500',
        'to-orange-600',
        'from-slate-600',
        'to-gray-800',
    ],
    theme: {
        extend: {
            backgroundSize: {
                '200': '200% 200%',
            },
            keyframes: {
                gradient: {
                    '0%, 100%': { 'background-position': '0% 50%' },
                    '50%': { 'background-position': '100% 50%' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-30px)' },
                },
            },
            animation: {
                gradient: 'gradient 12s ease infinite',
                float: 'float 8s ease-in-out infinite',
                'float-slow': 'float 14s ease-in-out infinite',
            },
            fontFamily: {
                sans: ['Onest', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                main_bg: '#ECEBF3',
                teal: {
                    300: '#34CBC9'
                },
                dark: {
                    300: '#262626'
                }
            },
            screens: {
                '2xl': {'max': '1535px'}, // => @media (max-width: 1535px) { ... }
                'xl': {'max': '1279px'}, // => @media (max-width: 1279px) { ... }
                'lg': {'max': '1023px'}, // => @media (max-width: 1023px) { ... }
                'md': {'max': '767px'}, // => @media (max-width: 767px) { ... }
                'sm': {'max': '639px'}, // => @media (max-width: 639px) { ... }
            },
        },
    },
    plugins: [forms, typography],
};
