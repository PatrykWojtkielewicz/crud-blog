const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'custom': '#ffffff',
                'beige': {
                    DEFAULT: '#E3E7D3',
                    '50': '#FFFFFF',
                    '100': '#FFFFFF',
                    '200': '#FFFFFF',
                    '300': '#FFFFFF',
                    '400': '#F4F5ED',
                    '500': '#E3E7D3',
                    '600': '#CCD3AF',
                    '700': '#B5BF8A',
                    '800': '#9EAC66',
                    '900': '#808D4D'
                },
                'silver': {
                    DEFAULT: '#BDC2BF',
                    '50': '#FFFFFF',
                    '100': '#FFFFFF',
                    '200': '#FDFDFD',
                    '300': '#E7E9E8',
                    '400': '#D2D6D4',
                    '500': '#BDC2BF',
                    '600': '#A0A7A3',
                    '700': '#838C86',
                    '800': '#67706B',
                    '900': '#4C524F'
                },
                'grey': {
                    DEFAULT: '#989C94',
                    '50': '#F4F4F3',
                    '100': '#EAEAE9',
                    '200': '#D5D7D4',
                    '300': '#C1C3BE',
                    '400': '#ACB0A9',
                    '500': '#989C94',
                    '600': '#7C8177',
                    '700': '#60645C',
                    '800': '#444641',
                    '900': '#282926'
                },
                'pine': {
                    DEFAULT: '#25291C',
                    '50': '#879667',
                    '100': '#7D8A5E',
                    '200': '#67724E',
                    '300': '#51593D',
                    '400': '#3B412D',
                    '500': '#25291C',
                    '600': '#070805',
                    '700': '#000000',
                    '800': '#000000',
                    '900': '#000000'
                },
                'yellow': {
                    DEFAULT: '#E6E49F',
                    '50': '#FFFFFF',
                    '100': '#FFFFFF',
                    '200': '#FFFFFF',
                    '300': '#F7F6E0',
                    '400': '#EEEDBF',
                    '500': '#E6E49F',
                    '600': '#DAD772',
                    '700': '#CFCB46',
                    '800': '#AFAB2E',
                    '900': '#838022'
                  },
            },
        },  
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
