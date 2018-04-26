var express = require('express'),
	app = express(),
    path = require('path'),
	server = require('http').createServer(app),
	io = require('socket.io')(server),
	nicknames = [];

server.listen((process.env.PORT || 3000), function(){
  console.log('listening on *:3000');
});

// app.get('/', function(req, res){
// 	res.sendFile(__dirname + '/index.html');
// });

// Express Middleware for serving static files
// app.use(express.static(path.join(__dirname, 'template')));
// app.use(express.static(path.join(__dirname, 'assets')));
app.use(express.static(__dirname + '/public/template'));
app.use(express.static(__dirname + '/public/assets'));

app.get('/', function(req, res) {
    res.redirect('index.html');
});

app.get('/test',function(req,res){
    res.sendFile('/test.html');
});

io.on('connection', function(socket){
	var data = new Date();
	var hora = data.getHours()-2;
	var minutos = data.getMinutes();
	var segundos = data.getSeconds();
	console.log('id: '+socket.id+" - Horário "+hora+":"+minutos+":"+segundos);
console.log(socket.id);
    nicknames = socket.id;

	socket.on('message', function(msg,username){
		io.emit('message', msg, username);
		var data = new Date();
		var dia = data.getDate();
		var mes = data.getMonth() + 1;
		var ano = data.getFullYear();
		var hora = data.getHours()-2;
		var minutos = data.getMinutes();
		var segundos = data.getSeconds();
		console.log("Id: "+socket.id+" ["+dia+"/"+mes+"/"+ano+" - Horário: "+hora+":"+minutos+":"+segundos+"] - "+username+": "+msg);
	});
	socket.on('disconnect', function(e){
		console.log('Disconnect: '+socket.id);
	});
});

//console.log('Logado em '+port);
