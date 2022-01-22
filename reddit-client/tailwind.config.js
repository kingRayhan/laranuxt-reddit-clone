module.exports = {
  content: [
    "./components/**/*.{js,vue,ts}",
    "./layouts/**/*.vue",
    "./pages/**/*.vue",
    "./plugins/**/*.{js,ts}",
    "./nuxt.config.{js,ts}",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#CEE3F8",
        primaryLight: "#EFF7FF",
        primaryDark: "#4f86b5",
        primaryDark2: "#4270a2",
      },
    },
  },
  plugins: [],
};
