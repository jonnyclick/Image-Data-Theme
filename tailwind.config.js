module.exports = {
  purge: [],
  content: [
    './**/*.{php}',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily:{
        'HelveticaNeue' : ['HelveticaNeue','sans-serif'],
        'HelveticaNeueBold' : ['HelveticaNeueBold','sans-serif'],
        'HelveticaNeueBoldItalic' : ['HelveticaNeueBoldItalic','sans-serif'],
        'HelveticaNeueCondensedBlack' : ['HelveticaNeueCondensedBlack','sans-serif'],
        'HelveticaNeueCondensedBold' : ['HelveticaNeueCondensedBold','sans-serif'],
        'HelveticaNeueItalic' : ['HelveticaNeueItalic','sans-serif'],
        'HelveticaNeueLight' : ['HelveticaNeueLight','sans-serif'],
        'HelveticaNeueLightItalic' : ['HelveticaNeueLightItalic','sans-serif'],
        'HelveticaNeueMedium' : ['HelveticaNeueMedium','sans-serif'],
        'HelveticaNeueMediumItalic' : ['HelveticaNeueMediumItalic','sans-serif'],
        'HelveticaNeueThin' : ['HelveticaNeueThin','sans-serif'],
        'HelveticaNeueThinItalic' : ['HelveticaNeueThinItalic','sans-serif'],
        'HelveticaNeueUltraLight' : ['HelveticaNeueUltraLight','sans-serif'],
        'HelveticaNeueUltraLightItalic' : ['HelveticaNeueUltraLigtItalic','sans-serif'],

      },
      fontSize:{
        '2.5' : '2.5rem'
      },
      minHeight:{
        '3.5' : '3.5rem'
      },
      backgroundImage:{
        'footer':'url(assets/images/footer-bg.png)'
      },
      margin:{
        '186vw' : '186vw'
      },
      colors:{
        'light-grey' : '#A29E9D',
        'dark-grey' : '#161615',
        'border-grey' : '#707070',
        'site-blue' : '#0090DF',
        'site-pink' : '#D8006B',
        'site-yellow' : '#FFE800',
        'slider-grey-arrow' : 'rgba(162,158,157,0.85)',
        'footer-black' : 'rgba(0,0,0,0.25)'
      },
      width:{
        '3/100' : '3%',
        '97/100' : '97%'

      },
      height:{
        'viewport-80' : '80vh',
        'viewport-60' : '60vh',
        'viewport-vw-18' : '18vw',
        '100-plus-3' : 'calc(100% + 3rem)',
        'viewport-47' : '47vh',
        'viewport-67' : '67vh',
        'viewport-65' : '65vh',
        '200' : '200px',
        '230' : '230px'
      },
      maxHeight:{
        '595' : '595px',
        '792' : '792px'
      },
      maxWidth:{
        '1687' : '1687px',
        '1644' : '1644px',
        '1642' : '1642px',
        '1532' : '1532px',
        '1397' : '1397px',
        '1352' : '1352px',
        '1234' : '1234px',
        '1226' : '1226px',
        '1088' : '1088px',
        '957' : '957px',
        '15' : '15rem',
        '4.5' : '4.5rem',
        '90' : '90%',
        '525' : '525px'
      },
      lineHeight: {
        '2.7' : '2.7rem',
        '2.6' : '2.6rem',
        '4.4' : '4.4rem'
      },
      inset: {
        '-21' : '-5.6rem',
        '40.8' : '10.8rem',
        '-45vw' : '-45vw'
      },
      scale:{
        '101' : '-1'
      }

    },
  },
  variants: {
    extend: {},
  },
  plugins: [
      require('tailwindcss-pseudo-elements')({
        customPseudoClasses: [],
        customPseudoElements: [],
        contentUtilities: false,
        emptyContent: false,
        classNameReplacer: {

        }
      })
  ],
}
