

var screenshot = { }

screenshot.capture = function(casper) {
	casper.capture('/vagrant/capture/screenshot.png')
}

module.exports = screenshot
