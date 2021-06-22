const path = require('path');
const loader = require('sass-loader');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = {
  entry: {
    main: './src/index.js',
    vendor: './src/vendor.js',
  },
};
