import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            keyframes: {
                breathe: {
                    '0%, 100%': {
                        transform: 'scale(1)',
                        opacity: '1',
                    },
                    '50%': {
                        transform: 'scale(1.015)',
                        opacity: '1',
                    },
                },
                glow: {
                    '0%, 100%': {
                        boxShadow: '0 0 0 rgba(34,211,238,0)',
                    },
                    '50%': {
                        boxShadow: '0 0 60px rgba(34,211,238,0.15)',
                    },
                },
            },
            animation: {
                breathe: 'breathe 8s ease-in-out infinite',
                glow: 'glow 8s ease-in-out infinite',
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
    plugins: [forms],
};
