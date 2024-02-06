const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                primary: colors.purple,
                secondary: colors.orange,
                tertiary: colors.cyan,
                success: colors.green,
                danger: colors.red,
                warning: colors.yellow,
                info: colors.cyan,
            },
            fontFamily: {
                sans: ['Work Sans', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    safelist: [
        {
            // Ensures dynamically generated utility classes are safely included in the compiled styles
            pattern: /(bg|border|text)-(primary|secondary|success|danger|warning|info)-(50|100|200|300|400|500|600|700|800|900|950)/,
        },
    ],

    plugins: [require('@tailwindcss/forms')],
};
