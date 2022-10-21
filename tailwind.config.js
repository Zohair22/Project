/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./app/nested/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [require('@tailwindcss/forms')],
}
