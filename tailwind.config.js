// tailwind.config.js
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            margin: {
                '128': '32rem', // 512px
                '144': '36rem', // 576px
                '160': '40rem', // 640px
                '200': '50rem', // 800px
                '256': '64rem', // 1024px
            },
        },
    },
    plugins: [],
};

