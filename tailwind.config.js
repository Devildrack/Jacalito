const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'im1': "url('/images/comida1.jpg')",
                'im2': "url('/images/comida2.jpg')",
                'im3': "url('/images/comida3.jpg')",
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
