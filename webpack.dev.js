const path = require('path');
const common = require('./webpack.common');
const { merge } = require('webpack-merge');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

// change these variables to fit your project
const outputPath = 'dist';
const localDomain = 'http://localhost:3000/wordpress/';

module.exports = merge(common, {
  mode: 'development',

  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'dist'),
  },

  plugins: [
    new MiniCssExtractPlugin({
      filename: 'style.css',
    }),
    new CleanWebpackPlugin(),

    // Uncomment this if you want to use CSS Live reload
    new BrowserSyncPlugin(
      {
        proxy: localDomain,
        files: [outputPath + '/*.css'],
        injectCss: true,
      },
      { reload: false }
    ),
  ],
  module: {
    rules: [
      {
        test: /\.(s[ac]|c)ss$/i,
        use: [
          MiniCssExtractPlugin.loader, //3. Extract css into files
          { loader: 'css-loader', options: { sourceMap: true } },
          { loader: 'postcss-loader', options: { sourceMap: true } },
          { loader: 'sass-loader', options: { sourceMap: true } },
        ],
      },

      {
        test: /\.(jpg|jpeg|png|gif|woff|woff2|eot|ttf|svg)$/i,
        use: 'url-loader?limit=1024',
      },
    ],
  },
});
