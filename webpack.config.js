const path = require('path');

module.exports = {
  entry: './src/entry.js',
  output: {
    filename: 'app.js',
    path: path.resolve(__dirname, 'js')
  }
};