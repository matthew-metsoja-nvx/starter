const path = require('path');
const common = require('./webpack.common');
const { merge } = require('webpack-merge');
// const {CleanWebpackPlugin} = require("clean-webpack-plugin");
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require('terser-webpack-plugin'); // this one is part of node modules so no need to install.
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = merge(common, {
  mode: 'production',

  output: {
    filename: '[name].bundled.js',
    path: path.resolve(__dirname, 'dist'),
  },

  optimization: {
    minimizer: [
      new CssMinimizerPlugin({
        minimizerOptions: {
          preset: [
            'default',
            {
              discardComments: { removeAll: true },
            },
          ],
        },
      }),

      new TerserPlugin(), // this is needed to compile the js as the css minifier overrides the default setting
    ],
  },

  plugins: [
    new MiniCssExtractPlugin({
      filename: 'style.bundled.css',
    }),
    // new CleanWebpackPlugin(),
  ],

  module: {
    rules: [
      {
        test: /\.(s[ac]|c)ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          { loader: 'css-loader', options: { sourceMap: true } },
          { loader: 'postcss-loader', options: { sourceMap: true } },
          { loader: 'sass-loader', options: { sourceMap: true } },
        ],
      },

      {
        test: /\.js$/,
        exclude: /(node_modules)/,
        use: {
          loader: 'babel-loader',
        },
      },

      {
        test: /\.(jpg|jpeg|png|gif|woff|woff2|eot|ttf|svg)$/i,
        use: 'url-loader?limit=1024',
      },
    ],
  },
});
