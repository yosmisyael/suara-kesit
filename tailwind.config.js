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
        extend: {
            colors: {
                primary: {"50":"#fff1f2","100":"#ffe4e6","200":"#fecdd3","300":"#fda4af","400":"#fb7185","500":"#f43f5e","600":"#e11d48","700":"#be123c","800":"#9f1239","900":"#881337","950":"#4c0519"}
            }
        },
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

