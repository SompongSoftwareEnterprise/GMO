

var yaml = require('./../vendor/js-yaml.min.js')
var fs = require('fs')

module.exports = function load(filename) {
	var fileData = fs.read(filename)
	return jsyaml.load(fileData)
}


