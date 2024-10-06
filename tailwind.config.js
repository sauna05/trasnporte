// /** @type {import('tailwindcss').Config} */
// export default {
//   content: [],
//   theme: {
//     extend: {},
//   },
//   plugins: [],
// }





/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',

  ],
  theme: {
    extend: {

      colors:{
        "fondo": ["#F5F5F5"],
        "azul-principal": ["#003366"],
        "naranja": ["#FF6600"]
      },
      
      fontFamily: {
        sans: ['Nunito Sans', 'sans-serif'],  // Agrega tu fuente aquí
      },
    },
  },
  plugins: [],
}
