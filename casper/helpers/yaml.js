

/*global jsyaml*/

require('./../vendor/js-yaml.min.js')
var fs = require('fs')

module.exports = function load(filename) {
	var fileData = fs.read(filename)
	return jsyaml.load(fileData)
}

module.exports.testdata = function(name) {
	return module.exports('testdata/' + name + '.yml')
}


