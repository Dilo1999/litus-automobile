/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                navy: {
                    DEFAULT: '#00105B',
                    light: '#001a7a',
                    band: '#0a2a8a',
                },
                litus: {
                    red: '#C41E3A',
                    'red-dark': '#a01830',
                    bg: '#F4F4F4',
                    card: '#EBEBEB',
                    dark: '#1a1a1a',
                    muted: '#57534e',
                    product: '#0a0a0f',
                    'product-footer': '#05070d',
                    'product-overlay': '#050a18',
                },
            },
            fontFamily: {
                sans: ['Figtree', 'system-ui', 'sans-serif'],
                serif: ['"Playfair Display"', 'Georgia', 'serif'],
                script: ['Pacifico', 'cursive'],
            },
        },
    },
    plugins: [],
};
