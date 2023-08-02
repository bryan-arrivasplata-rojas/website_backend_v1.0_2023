$('.sidebar').toggle();
$('.button-sidebar').on('click', function() {
  if($('.sidebar').is(':hidden')){
    $('.content').animate({
      marginLeft: '200px'
    }, 300);
  }else{
    $('.content').animate({
      marginLeft: '0px'
    }, 300);
  }
  $('.sidebar').animate({
    width: 'toggle'
  }, 300);
});
$('#sidebar-opciones').on('click', function(){
  if($('#sidebar').hasClass('active')){
    $('#sidebar').show('normal');
  }else{
    $('#sidebar').hide('normal');
  }
  $('#sidebar').toggleClass('active');
});
$('.sidebar-list li').on('click', function(e){
  $(this).find('a')[0].click();
});

$('ul.sidebar-list li.opciones').hover(function(){
  if($(this).children('a.list-menu').children('span').text()=='+'){
    $(this).children('a.list-menu').children('span').text('-');
  }else{
    $(this).children('a.list-menu').children('span').text('+');
  }

  if ($(this).children('ul.opciones-list-menu').hasClass('active')){
    $(this).children('ul.opciones-list-menu').show('normal');
  }else{
    $(this).children('ul.opciones-list-menu').hide();
  }
  $(this).children('ul.opciones-list-menu').toggleClass('active');
});
/*$('ul.sidebar-list li.opciones').hover(function(){
  if ($(this).children('ul').is(':hidden')){
    $(this).children('ul').show('normal');
  }else{
    $(this).children('ul').hide('normal');
  }
});
//ul.sidebar-list li.list a.list-menu span.cambiar-combo
/*$('ul.sidebar-list li.opciones').on('click',function(){
  if($(this).children('a.list-menu').children('span').text()=='+'){
    $(this).children('a.list-menu').children('span').text('-');
  }else{
    $(this).children('a.list-menu').children('span').text('+');
  }
  
  if ($(this).children('ul.opciones-list-menu').hasClass('active')){
    $(this).children('ul.opciones-list-menu').show('normal');
    $(this).children('ul.opciones-list-menu').removeClass("active");
  }else{
    $(this).children('ul.opciones-list-menu').hide('normal');
    $(this).children('ul.opciones-list-menu').addClass('active');
  }
});*/