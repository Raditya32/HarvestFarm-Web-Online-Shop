// tailwind.config.js
const defaultTheme = require('tailwindcss/defaultTheme'); // Jika Anda menggunakan defaultTheme

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans], // Atau font lain yang Anda gunakan seperti 'Poppins'
            },
            colors: {
                'custom-green': {
                    DEFAULT: '#1F5233',        // Untuk bg-custom-green
                    dark: '#174026',           // Untuk hover:bg-custom-green-dark
                    light: '#2d7349',          // Untuk focus:ring-custom-green-light
                    lighter: '#e8f5ec',
                },
                'custom-text': '#333333',
                'custom-gray': {
                    DEFAULT: '#f5f5f5',
                    dark: '#e0e0e0',
                },
                'custom-red': '#d32f2f',
                'custom-yellow': '#ffd600',
                'custom-yellow-dark': '#e6bf00'
            },
        },
    },
    plugins: [require('@tailwindcss/forms')],
};