module.exports = {
  "verbose": true,

  "moduleFileExtensions": [
    "js",
    "json",
    // tell Jest to handle `*.vue` files
    "vue"
  ],

  // "transformIgnorePatterns": ['/node_modules/(?!lib-to-transform|other-lib)']
  "transform": {
    // process `*.vue` files with `vue-jest`
    ".*\\.(vue)$": "vue-jest",
    ".*\\.(js)$": "babel-jest"
  },

  preset: '@vue/cli-plugin-unit-jest/presets/no-babel'
};
