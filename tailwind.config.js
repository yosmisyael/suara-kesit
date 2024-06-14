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
            primary: '#636D79',
            contrary: '#4D4E8E',
            secondary: '#8BB6A2',
            complementary: '#E8D4A2',
            base: '#F2F2F2',
        }
    },
    plugins: [
        require('flowbite/plugin'),
    ],
}

