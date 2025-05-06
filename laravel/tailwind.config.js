/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
        },
    },
    plugins: [],
}

// /** @type {import('tailwindcss').Config} */
// module.exports = {
//     content: [
//         "./resources/**/*.blade.php",
//         "./resources/**/*.js",
//         "./resources/**/*.vue",
//     ],
//     theme: {
//         extend: {},
//     },
//     plugins: [],
// }
