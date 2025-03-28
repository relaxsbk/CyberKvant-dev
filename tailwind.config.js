import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {

        extend: {
            screens: {
                'xs': '320px',
                ...defaultTheme.screens,
            },
            colors: {
                'primary-purple': '#9701FE',
                'secondary-purple': '#CA7FFE',
                'white-purple': '#F3E5FE',
                'dark-purple': '#7500C5',
                '': '',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
};
