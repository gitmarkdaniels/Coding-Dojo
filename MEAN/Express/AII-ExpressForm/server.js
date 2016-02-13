// REQUIRE, CREATE EXPRESS
var path = require('path');
var io = require('socket.io');
var express = require('express');
var app = express();

// SET VIEW, GET: route to render view
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');
app.get('/', function(req, res) {
	res.render('index');
});

// USE: CSS
app.use(express.static(path.join(__dirname, './static')));

// store app.listen
var server = app.listen(8000, function() {
	console.log('listening on port 8000');
});

// SOCKETS: listen
io = io.listen(server);

// connection (event is built-in)
io.sockets.on('connection', function (socket) {
	console.log('My socket ID: ' + socket.id);

	socket.on('posting_form', function (data) {
		// Data received from client
		data = JSON.stringify(data);
		console.log('Form data: ' + data);

		// Response to client
		var rand = Math.floor((Math.random() * 1000) + 1);
		socket.emit('server_response', rand);
	});
});