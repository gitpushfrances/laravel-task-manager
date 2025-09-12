/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Livewire/**/*.php",
    "./resources/views/livewire/**/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
