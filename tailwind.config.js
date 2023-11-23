/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  darkMode: 'class',
  theme: {
    extend: {},
    fontFamily: {
      'poppins': ['Poppins', 'sans-serif']
    },
    color: {
      'primary': '#172554',
    }
  },
  plugins: [],
}

