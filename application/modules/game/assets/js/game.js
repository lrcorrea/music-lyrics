$(document).ready(function() {
    var xhr = false,
        duration,
        music = document.getElementById('song'),
        $lyrics = $('.lyrics .content'),
        time = 0,
        currentTimeFormated = 0,
        trecho = 1;

    music.addEventListener("timeupdate", timeUpdate, false);

    $('.init').on('click', function(event) {
        music.play();
        console.log('asd');
    });

    function timeUpdate() {
        currentTimeFormated = parseInt(music.currentTime);

        console.log(currentTimeFormated, trecho, music.currentTime);
        $('#input input').prop('disabled', true);
        //trecho 1
        if(currentTimeFormated == 43 && trecho == 1){
            console.log('pause' + music.currentTime);
            music.pause();
            $('#input input').focus().prop('disabled', false).attr('disabled', false);
            $('#input input').focus();
        }

        //trecho 2
        if(currentTimeFormated == 47 && music.currentTime > 47.58 && trecho == 2){
        // if(currentTimeFormated == 45 && music.currentTime > 45.5 && trecho == 2){
            console.log('pause' + music.currentTime);
            music.pause();
            $('#input input').focus().prop('disabled', false).attr('disabled', false);
        }

        //trecho 3
        if(currentTimeFormated == 57 && music.currentTime > 57.5 && trecho == 3){
            console.log('pause' + music.currentTime);
            music.pause();
            $('#input input').focus().prop('disabled', false).attr('disabled', false);
        }

        var playPercent = 100 * (music.currentTime / duration);
        if(music.currentTime < 35){
            time = time+2;
            // time = music.currentTime*10;
        }else if(music.currentTime > 35 && music.currentTime < 40){
            time = time+.6;
        }else{
            time = time+3.5;
        }

        $lyrics.css({"transform":"translateY(-"+(time)+"px)"});
        // console.log(playPercent);
    }

    // Gets audio file duration
    music.addEventListener("canplaythrough", function () {
        duration = music.duration;
    }, false);

    $('form').on('submit', function(event) {
        event.preventDefault();

        if($('#input input').attr('disabled')){
            return false;
        }

        if(xhr) return false;

        xhr = $.ajax({
            url: base_url + 'game/verify_word',
            type: 'POST',
            dataType: 'json',
            data: {res: $('#input input').val(), trecho: trecho},
            beforeSend: function(){
                // $('.form .submit').addClass('loading');
            },
            complete: function(){
                xhr = false;
                // $('.form .submit').removeClass('loading');
            },
            success: function(data){
                if(data.status){
                    $('.trecho' + trecho).html(data.word);
                    if(data.is_valid){
                        $('.trecho' + trecho).addClass('correct');
                    }else{
                        $('.trecho' + trecho).addClass('incorrect');
                    }
                    // if(trecho == 1){
                    //     $('.trecho' + trecho).html(data.word);
                    // } else if(trecho == 2){
                    //     $('.lyrics .content span:eq('+trecho+')').html(data.word);
                    // }else if(trecho == 2){
                    //     $('.lyrics .content span:eq('+trecho+')').html(data.word);
                    // }
                    $('#input input').val('');
                    trecho++;
                    music.play();
                }else{
                }
            },
            error: function(){
                console.log('error');
            },
        });
    });
});







var colors = new Array(
  [62,35,255],
  [60,255,60],
  [255,35,98],
  [45,175,230],
  [255,0,255],
  [255,128,0]);

var step = 0;
//color table indices for:
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

//transition speed
var gradientSpeed = 0.002;

function updateGradient()
{

  if ( $===undefined ) return;

var c0_0 = colors[colorIndices[0]];
var c0_1 = colors[colorIndices[1]];
var c1_0 = colors[colorIndices[2]];
var c1_1 = colors[colorIndices[3]];

var istep = 1 - step;
var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
var color1 = "rgb("+r1+","+g1+","+b1+")";

var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
var color2 = "rgb("+r2+","+g2+","+b2+")"; 

 $('#gradient').css({
   background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});

  step += gradientSpeed;
  if ( step >= 1 )
  {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}

setInterval(updateGradient,10);