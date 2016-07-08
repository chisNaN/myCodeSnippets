var http = require('http');

exports.handler = function(event, context) {
	http.get('http://httpbin.org/get', function(res) {
		var body = '';
		res.on('data', function(chunk) {
			body += chunk;
		});
		
		res.on('end', function() {
			console.info(body);
			context.done(null);
		});
	}).on('error', function(e) {
		console.error(e.message);
		context.fail(null);
	});
};
