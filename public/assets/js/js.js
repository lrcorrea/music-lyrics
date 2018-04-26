var socket = io();
$(document).ready(function(){
    $("#msj").live('keyup', function(){
        socket.emit('keyup', username);
    });
    $("form").submit(function(){
        var mes = $("#msj").val();
        var username = $("#username").val();
        if(username!=''){
            $("#username").prop("disabled", true);
        }
        if(mes==''){
            return false;
        }

        socket.emit('message', mes, username);
        $("#msj").val('').focus();
        return false;
    });

});
socket.on('message', function(msg,username){
    msg = msg.replace(/(<([^>]+)>)/ig,"");
    var myDate = new Date();
    nowDate = (myDate.toLocaleString());
    $("#message").append('<li class="new"><span>['+nowDate+']</span> - '+username+': '+msg+'</li>')
    var wrapUl = $(".body_msg ul");
    $("li.new:last").slideDown('slow', 'easeOutBounce');
    $('.body_msg').animate({
        scrollTop: wrapUl.height()
    }, 500);
});
    /*
    dia = data.getDate(),
    mes = data.getMonth() + 1,
    ano = data.getFullYear(),
    hora = data.getHours(),
    minutos = data.getMinutes(),
    segundos = data.getSeconds();
    */