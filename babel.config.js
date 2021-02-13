module.exports = function (api) {
  api.cache(true);

  const presets = [
    ['@babel/preset-env'],
    ['@vue/cli-plugin-babel/preset']
  ];
  const plugins = ['@babel/plugin-syntax-dynamic-import'];

  return {
    presets,
    plugins
  };
}

// module.exports = {
//   presets: [
//     '@vue/cli-plugin-babel/preset'
//   ]
// }
