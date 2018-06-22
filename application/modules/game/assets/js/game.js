$(document).ready(function() {
    var xhr = false,
        duration,
        music = document.getElementById('song'),
        $lyrics = $('.lyrics .content');

    music.addEventListener("timeupdate", timeUpdate, false);

    function timeUpdate() {
        console.log(music.currentTime);
        if(music.currentTime > 3 && music.currentTime < 4){
            console.log('pause' + music.currentTime);
            music.pause();
        }

        var playPercent = 100 * (music.currentTime / duration);
        $lyrics.css({"transform":"translateY(-"+playPercent+"%)"});
        // console.log(playPercent);
    }

    // Gets audio file duration
    music.addEventListener("canplaythrough", function () {
        duration = music.duration;
    }, false);

    $('form').on('submit', function(event) {
        event.preventDefault();

        if(xhr) return false;

        xhr = $.ajax({
            url: base_url + 'game/verify_word',
            type: 'POST',
            dataType: 'json',
            data: $('.form').serialize(),
            beforeSend: function(){
                // $('.form .submit').addClass('loading');
            },
            complete: function(){
                // $('.form .submit').removeClass('loading');
            },
            success: function(data){
                if(data.status && data.is_valid){
                    music.play();
                }
            },
            error: function(){
                console.log('error');
            },
        });
    });
});