$(document).ready(function () {
  $('.dn').click(function () {
    $('html, body, header,.mainT').toggleClass('night');
    $('.btn').toggleClass('btnN');
    if ($('body').attr('class') == 'night') {
      $('.dn').attr('src', "/img/day.png");
          }
    else {
      $('.dn').attr('src', "/img/night.png");
     
    }
  });

  $('button.upd').click(function () {
    $('.updF').show();
    let id = $(this).val();
    $('.inpUpd').val(id);
  });
  $('#btn4').click(function () {
    $('.updF').hide();
  })

  $('ul li').click(function () {

    if ($(this).attr('class') == 'li0') {
      $('main > h3').text('Все рецепты');
      $('img.mainImg').hide().attr('src', './images/all.jpg').fadeIn(1500);
    }

    if ($(this).attr('class') == 'li1') {
      $('main > h3').text('Первые блюда');
      $('img.mainImg').hide().attr('src', './images/first.jpg').fadeIn(1500);
    }

    if ($(this).attr('class') == 'li2') {
      $('main > h3').text('Вторые блюда');
      $('img.mainImg').hide().attr('src', './images/second.jpg').fadeIn(1500);
    }
    if ($(this).attr('class') == 'li3') {
      $('main > h3').text('Салаты');
      $('img.mainImg').hide().attr('src', './images/salat.jpg').fadeIn(1500);
    }
    if ($(this).attr('class') == 'li4') {
      $('main > h3').text('Выпечка');
      $('img.mainImg').hide().attr('src', './images/cake.jpg').fadeIn(1500);
    }
    if ($(this).attr('class') == 'li5') {
      $('main > h3').text('Другие блюда');
      $('img.mainImg').hide().attr('src', './images/other.jpg').fadeIn(1500);
    }
  });

  $('#btn1').click(function () {
    $(this).hide();
    $('.add_form').show();

  });

  $('#btn2').click(function () {
    $('#btn1').show();
    $('.add_form').hide();
  });

  $('#btn3').click(function(){
$(this).hide();
$('.delF').show();
  });
$('#btn5').click(function(){
  $('.delF').hide();
  $('#btn3').show();
});

$('#login').click(function(){
$("#log").slideDown(600);
});

$("#otmena").click(function(){
$("#log").slideUp(600);
});

});




