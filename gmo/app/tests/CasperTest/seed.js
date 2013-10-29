
var url = require('./url')

function seed(casper) {
	casper.thenOpen(url('/test/seed'), { method: 'POST' })
	casper.then(function() {
		this.echo('Database seeded')
	})
}

module.exports = seed

