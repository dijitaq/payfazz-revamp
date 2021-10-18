const path = require( 'path' ),
  webpack = require( 'webpack' );

module.exports = {
  mode: 'development',
  optimization: {
    minimize: false,
  },
  context: path.resolve( __dirname, 'assets' ),
  entry: {
    main: [ './main.js' ],
  },
  output: {
    path: path.resolve( __dirname, 'assets/js' ),
    filename: '[name].bundle.js',
  },
  externals: {
    jquery: 'jQuery'
  },
  resolve: {
    alias: {
      "ScrollMagic": path.resolve( 'node_modules', 'scrollmagic/scrollmagic/uncompressed/ScrollMagic.js' ),
      'debug.addIdicators': path.resolve( 'node_modules',  'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIdicators.js' )
    }
  },
  plugins: [
    new webpack.ProvidePlugin( {
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
    } ),
  ],
  devtool: 'source-map',
};