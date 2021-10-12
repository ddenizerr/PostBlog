module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        backgroundImage:{
             'background-layouts': "url('/app/img/postbox.jpg')",
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
