// module.exports = {
//     plugins: [
//         require('postcss-nesting'),      // ✅ 放在最前面
//         require('tailwindcss'),
//         require('autoprefixer'),
//     ]
// }
module.exports = {
    plugins: [
        require('postcss-nesting'),
        require('tailwindcss'),
        require('autoprefixer'),
    ],
};
