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
      "ScrollMagic": path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/ScrollMagic.js'),
      "animation.gsap": path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js'),
      "debug.addIndicators": path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js')
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