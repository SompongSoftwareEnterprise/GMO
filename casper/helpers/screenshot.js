

var screenshot = { }

screenshot.path = '/vagrant/capture/screenshot.png'
screenshot.capture = function(casper) {
	casper.capture(screenshot.path)
}

module.exports = screenshot
