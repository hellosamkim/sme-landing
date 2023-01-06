module.exports = {
  mode: "jit",
  purge: {
    content: [
      "./src/js/**/*.js",
      "./src/js/*.js",
      "./src/**/*.{html,js}",
      "./node_modules/tw-elements/dist/js/**/*.js",
      "./template-parts/**/**/*.php",
      "./template-parts/**/*.php",
      "./template-parts/*.php",
      "./woocommerce/**/*.php",
      "./woocommerce/*.php",
      "./inc/*.php",
      "./blocks/*.php",
      "./inc/**/*.php",
      "./*.php",
      "*.php",
    ],
    safelist: ["-rotate-180"],
  },
  theme: {
    container: {
      center: true,
      padding: "15px",
    },
    screens: {
      sm: "640px",
      md: "768px",
      lg: "1025px",
      xl: "1280px",
    },
    extend: {
      fontFamily: {
        body: ["PublicSans", "sans-serif"],
      },
      colors: {
        dark: {
          DEFAULT: "#0A0000",
          body: "#6C6D6D",
        },
        primary: {
          DEFAULT: "#FE4812",
          hover: "#D83E13",
        },
        indigo: {
          DEFUALT: "#0D3163",
        },
        forest: {
          DEFUALT: "#005753",
        },
        gray: {
          DEFAULT: "#6D6D6D",
          dark: "#4D5961",
          text: "#AAAAAA",
          background: "#F8FAFB",
          topbar: "#F0F3F5",
          hr: "#D9D9D9",
          light: "#f7f9fa",
          lighter: "#fafafa",
        },
        header: {
          topbar: "#F0F3F5",
        },
        footer: {
          background: "#4F4E4E",
          text: "#EEF1F4",
          border: "#707070",
          search: "#605f5f",
        },
      },
    },
  },
  variants: {
    extend: {
      inset: ["hover", "focus"],
    },
  },
  plugins: [
    require("@tailwindcss/forms")({
      strategy: "class",
    }),
    require("tw-elements/dist/plugin"),
    require("@tailwindcss/aspect-ratio"),
    require("@tailwindcss/line-clamp"),
    require("@tailwindcss/typography"),
  ],
};
