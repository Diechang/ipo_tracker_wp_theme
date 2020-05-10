const path = require("path");
const webpack = require("webpack");
const MiniCssExtractPlugin = require("mini-css-extract-plugin"); // CSSを分離
const TerserPlugin = require("terser-webpack-plugin"); // JSを圧縮
const FixStyleOnlyEntries = require("webpack-fix-style-only-entries"); // [style].jsを出力しない

module.exports = (env, argv) => ({
	entry: {
		app: "./src/js/app.js",
		style: "./src/sass/style.scss",
		"editor-style": "./src/sass/editor-style.scss",
	},
	output: {
		filename: "[name].js",
		path: path.resolve(__dirname, "js"),
	},
	// devtool: false,
	module: {
		rules: [
			// babel
			{
				test: /\.js$/,
				use: [
					{
						loader: "babel-loader",
						options: {
							presets: ["@babel/preset-env"],
						},
					},
				],
				exclude: /node_modules/,
			},
			// sass
			{
				test: /\.(sa|sc|c)ss$/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: "css-loader",
						options: {
							url: false,
						},
					},
					{
						loader: "postcss-loader",
						options: {
							plugins: function () {
								return [require("autoprefixer")];
							},
						},
					},
					{
						loader: "sass-loader",
						options: {
							sassOptions: {
								outputStyle: "compact",
							},
						},
					},
				],
			},
			// expose jQuery
			{
				test: require.resolve("jquery"),
				use: [
					{
						loader: "expose-loader",
						options: "jQuery",
					},
					{
						loader: "expose-loader",
						options: "$",
					},
				],
			},
		],
	},
	plugins: [
		new webpack.ProvidePlugin({
			$: "jquery",
			jQuery: "jquery",
			"window.jQuery": "jquery",
		}),
		new FixStyleOnlyEntries(),
		new MiniCssExtractPlugin({
			filename: "../[name].css",
			allChunks: false,
		}),
	],
	// 最適化オプション
	optimization: {
		minimizer: [new TerserPlugin({})],
	},
});
