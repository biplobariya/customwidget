const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "../widgets/**/*.php",
    "../inc/**/*.php",
    
  ],
  darkMode: ['class', '[data-mode="dark"]'],
  corePlugins: {
    preflight: false
  },
  theme: {
    fontFamily: {
      sans: ["'Josefin Sans'", ...defaultTheme.fontFamily.sans],
      cursive: ["'Julyit'"],
    },
    screens: {
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
      '2xl': '1336px',
    },
    container:{
      center: true,
      padding: '16px'
    },
    extend: {
      colors: {
        'primary': "rgb( var(--primary) / <alpha-value> )",
        'primary-midum': "rgb( var(--primary-midum) / <alpha-value> )",
        'primary-light': "rgb( var(--primary-light) / <alpha-value> )",
        'secondary': "rgb( var(--secondary) / <alpha-value> )",
        'secondary-midum': "rgb( var(--secondary-midum) / <alpha-value> )",
        'secondary-light': "rgb( var(--secondary-light) / <alpha-value> )",
        'tertiary': "rgb( var(--tertiary) / <alpha-value> )",
        'tertiary-midum': "rgb( var(--tertiary-midum) / <alpha-value> )",
        'tertiary-light': "rgb( var(--tertiary-light) / <alpha-value> )",
        'title': "rgb( var(--title) / <alpha-value> )",
        'paragraph': "rgb( var(--paragraph) / <alpha-value> )",
        'snow': "rgb( var(--snow) / <alpha-value> )",
        'dark-card-bg': "rgb( var(--dark-card-bg) / <alpha-value> )",
        'white-light': "rgb( var(--white-light) / <alpha-value> )",
        'bdr-clr': "rgb( var(--bdr-clr) / <alpha-value> )",
        'bdr-clr-drk': "rgb( var(--bdr-clr-drk) / <alpha-value> )",
        'dark-secondary': "rgb( var(--dark-secondary) / <alpha-value> )",
      },
    },
  },
  plugins: [],
}
