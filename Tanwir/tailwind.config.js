/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily:{
        khand: ["Khand", "sans-serif"],
        pop: ["Poppins", "sans-serif"],
      }
    },
  },
  plugins: [],
}