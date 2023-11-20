const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                // primary: "#c8c6c6",
                // secondary: "#4c6687",
                // tertiary: "f0e5cf",
                "pewter-blue": "#81ADC8",
                "alice-blue": "#EDF3F7",
                "davys-grey": "#4D4D4D",
                vermillion: "#CD4631",
                champagne: "#F7EDE8",
                white: "#FFFFFF",
                black: "#000000",
            },
            boxShadow: {
                "3xl": "4px 4px 0px #81ADC8",
                "4xl": "9px 9px 0px #CD4631",
            },
            fontFamily: {
                sans: [
                    "Montserrat",
                    "Poppins",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
