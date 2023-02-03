/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{php,js}"],
  theme: {

    extend: {},

  },
  daisyui: {
    themes: [
      {
        mytheme: {

          "primary": "#151D48",

          "secondary": "#567AE5",

          "accent": "#37CDBE",

          "neutral": "#3D4451",

          "base-100": "#FFFFFF",

          "info": "#3ABFF8",

          "success": "#36D399",

          "warning": "#FBBD23",

          "error": "#F87272",
        },
      },
    ],
  },
  plugins: [require("daisyui")],
}