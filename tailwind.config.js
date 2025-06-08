import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    safelist: [
        'animate_fade',
        'animate_btt',
        'animate_delay-2',
        'animate_delay-5',
        // Tambahkan semua class dynamic lainnya di sini
      ],

    theme: {
        extend: {
            colors: {
                primary: "#5D8736",
                cream: '#F2F0E4',
                orange1: '#F28705',
                orange2: '#F25C05',
                orange3: '#F24405',
                black: '#000000'
            },
            fontFamily: {
                poppins: ["Poppins"],
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],

                // sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                fade: {
                  '0%': { opacity: '0' },
                  '100%': { opacity: '1' },
                },
                btt: {
                  '0%': { transform: 'translateY(40px)', opacity: '0' },
                  '100%': { transform: 'translateY(0)', opacity: '1' },
                },
              },
              animation: {
                fade: 'fade 1s ease-in-out',
                btt: 'btt 0.8s ease-out',
                'delay-2': 'fade 1s ease-in-out 0.2s',
                'delay-5': 'fade 1s ease-in-out 0.5s',
              },
        },

    },

    plugins: [forms],
};
