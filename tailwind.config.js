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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                border: '#e5e7eb', // Define a custom color if needed
                // background: 'oklch(0.145 0 0)', // Updated with the requested color
                foreground: 'oklch(0.985 0 0)',
            },
        },
    },

    plugins: [forms],
};
