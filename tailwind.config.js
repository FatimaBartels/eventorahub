import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                heading: ["Syne", "sans-serif"],
                body: ["DM Sans", "sans-serif"],
                admin: ["IBM Plex Sans", "sans-serif"], 
            },
            colors: {
                primary: "#4F46E5",
                "primary-hover": "#4338CA",
                accent: "#10B981",
                background: "#F9FAFB",
                "text-dark": "#111827",
                "text-light": "#6B7280",
                danger: "#EF4444",
                footer: "#0F172A",
            },
        },
    },

    plugins: [forms],
};
