

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

// module.exports.all = function(filename) {
// 	var fileData = fs.read(filename)
// 	var output = [ ]
// 	jsyaml.loadAll(fileData, function(doc) {
// 		output.push(doc)
// 	})
// }
// module.exports.fixture = function(name) {
// 	return module.exports.all('fixtures/' + name + '.yml')
// }
