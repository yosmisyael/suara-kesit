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
        }
    },
    plugins: [
        require('flowbite/plugin'),
    ],
}

