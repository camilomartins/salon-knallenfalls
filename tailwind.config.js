const _ = require("lodash");
const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

module.exports = {
    content: [
        './*/*.php',
        './**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './safelist.txt',
        "./src/**/*.{html,js}",
        "./node_modules/tw-elements/dist/js/**/*.js"
    ],
    theme: {
        borderWidth: {
            DEFAULT: '1px',
            '1': '1px',
        },
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
            fontSize: tailpress.fontSizeMapper(tailpress.theme('settings.typography.fontSizes', theme)),        
            animation: {
                'spin-slow': 'spin 10s ease-in-out infinite',
                'spin-normal': 'spin 2s ease-in-out infinite-scroll',
                'infinite-scroll-mobile': 'infinite-scroll 200s ease-in-out infinite',
                'infinite-scroll-desktop': 'infinite-scroll 300s linear infinite',                
              },
              keyframes: {
                'infinite-scroll': {
                  '0%': { transform: 'translateX(0)' },
                  '50%': { transform: 'translateX(-100%)' },
                  '100%': { transform: 'translateX(0)' },                  
                }
              }   
        },
        screens: {
            'xs': '480px',
            'sm': '600px',
            'md': '782px',
            'lg': tailpress.theme('settings.layout.contentSize', theme),
            'xl': tailpress.theme('settings.layout.wideSize', theme),
            '2xl': '1440px'
        },
        fontFamily: {
            'sans': ['ui-sans-serif', 'system-ui'],
            'serif': ['Courier Prime'],
            'mono': ['ui-monospace', 'SFMono-Regular'],
            'display': ['Courier Prime'],
            'body': ['"Open Sans"'],
        }

    },
    plugins: [
        tailpress.tailwind,
        require("tw-elements/dist/plugin")
    ]
};
