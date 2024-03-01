import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        colors:{
            primary: '#BA181B',
            lightprimary: '#E84545',
            lightgray: '#F8F8FB',
            subheading: '#737373',
            darkgray: '#454141',
            darkblue: '#2B2E4A',
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                inter: ['Inter', ...defaultTheme.fontFamily.sans],
                'nunito': ['Nunito', 'sans-serif'],
            },
        },
    },

    plugins: [forms, typography, require('flowbite/plugin')],
};
