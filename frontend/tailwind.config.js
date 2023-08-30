/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
    extend: {
        width: {
            '96': '24rem',
            '800': '800px',
            '850': '850px'
        },
        height: {
            '450':'450px'
        },  
    },

  plugins: [
    require('flowbite/plugin'),
  ],
}

