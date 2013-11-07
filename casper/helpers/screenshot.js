

var screenshot = { }

screenshot.basePath = '/vagrant/capture/screenshot'
screenshot.path = screenshot.basePath + '.png'
screenshot.capture = function(casper) {
	screenshot.path = screenshot.basePath + new Date().getTime() + '.png'
	casper.capture(screenshot.path)
}

module.exports = screenshot
