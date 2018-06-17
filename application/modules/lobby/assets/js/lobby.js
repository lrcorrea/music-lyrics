$(document).ready(function() {
  $(".form input[name=pin]").keydown(function (e) {
      // Allow: backspace, delete, tab, escape, enter and .
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
           // Allow: Ctrl/cmd+A
          (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
           // Allow: Ctrl/cmd+C
          (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
           // Allow: Ctrl/cmd+X
          (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
           // Allow: home, end, left, right
          (e.keyCode >= 35 && e.keyCode <= 39)) {
               // let it happen, don't do anything
               return;
      }
      // Ensure that it is a number and stop the keypress
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
  });

  var xhr = false;

  $('.form').on('submit', function(e){
    e.preventDefault();

    if(xhr) xhr.abort();

    if($('.form input[name=pin]').val().length < 5){
      $('.form').addClass('error');
      return false;
    }

    $.ajax({
      url: base_url + 'home/verify_pin',
      type: 'POST',
      dataType: 'json',
      data: $('.form').serialize(),
      beforeSend: function(){
        $('.form .submit').addClass('loading');
      },
      complete: function(){
        $('.form .submit').removeClass('loading');
      },
      success: function(data){
        console.log(data);
        if(data.status && data.is_valid){
          $('.form').addClass('show-input');
          $('.form input[name=name]').attr('required', true);
          $('.form input[name=pin]').attr('readonly', true);
          $('.form input[name=pin]').attr('disabled', true);
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

//  $('#gradient').css({
//    background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
//     background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});

//   step += gradientSpeed;
//   if ( step >= 1 )
//   {
//     step %= 1;
//     colorIndices[0] = colorIndices[1];
//     colorIndices[2] = colorIndices[3];

//     //pick two new target color indices
//     //do not pick the same as the current one
//     colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
//     colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

//   }
// }

setInterval(updateGradient,10);