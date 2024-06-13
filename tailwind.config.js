/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    darkMode: 'class',
    theme: {
        extend: {},
        fontFamily: {
            'body': [
                'Inter var',
            ],
            'sans': [
                'Inter var',
            ]
        },
        colors: {
            primary: '#3226AE',
            contrary: '#FF392C',
            secondary: '#01C5F9',
            complementary: '#FFC006',
        }
    },
    plugins: [
        require('flowbite/plugin'),
    ],
}

