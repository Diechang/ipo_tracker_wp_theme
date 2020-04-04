const path = require('path');

module.exports = ( env, argv ) => ({
  entry: './src/entry.js',
  output: {
    filename: 'app.js',
    path: path.resolve(__dirname, 'js')
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        use: [
          {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env']
            }
          }
        ],
        exclude: /node_modules/,
      }
    ]
  }
});