/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        clinic: {
          50: '#f2f7f7',
          100: '#dcebea',
          200: '#b9d7d5',
          300: '#8bbcb9',
          400: '#5c9e9a',
          500: '#3d827e',
          600: '#2f6966',
          700: '#285553',
          800: '#234645',
          900: '#1c3837',
        },
        ink: '#1f2a37',
      },
    },
  },
  plugins: [],
}