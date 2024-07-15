module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        khand: ["Khand", "sans-serif"],
        pop: ["Poppins", "sans-serif"],
      }
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
  darkMode: 'class',
}