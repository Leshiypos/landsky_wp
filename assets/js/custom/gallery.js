$(document).ready(function(){
    var winW = $(window).width();

  //Копка мобильного меню
  if (winW < 930){
  $('#but_menu').click(function(){
    $('.main_menu').slideToggle();
  })
  
  $(window).scroll(function(){
    $('.main_menu').slideUp();
  })
  
  $('.main_menu a').click(function(){
    $('.main_menu').slideUp();
  })
  }
  
  //Копка мобильного меню футер навигация
  if (winW < 767){
    $('#but_nav_footer').click(function(){
      $('.footer_menu').slideToggle();
      $('#Outline').toggleClass('down');
    })
    $('.footer_menu a').click(function(){
      $('.footer_menu').slideUp();
      $('#Outline').removeClass('down');
    })
  }
  
  //Центровка POPup по высоте
  if (winW <= 956) { $('#feedback').height($(window).height());}
  
  $('#but_order').click(function(evt){
    evt.preventDefault();
    $('#send_mail').fadeIn().addClass('visible');
  })
  
  $('#close_pop').click(function(){
    $('#send_mail').removeClass('visible').fadeOut();
  })
  
  //Валидация формы
  $('#feedback').validate({
    debug : true,
    rules:{
      name: "required",
      email:{
        required : true,
        email : true
      },
      theme : "required",
    },
    messages: {
      name : "Пожалуйста, введите cвое имя",
      email : {
        required : "Пожалуйста, введите свой E-mail",
        email : "Пожалуйсва, введите корректный E-mail"
      },
      theme : "Пожалуйста, введите тему сообщения",
    }
  });
  
  //Показ кнопки scroll-top
  var pageX = window.pageYOffset; // Определяем позицию окна относительно документа (отступ сверху)
  var heightDoc = $(document).height() - $(window).height();  //высоту документа за вычетам высоты окна
  var butTop = $('#scroll-top');                              //кнопка
  var link = butTop.find('a');                                // ссылка в кнопке
  if(pageX < 500) butTop.addClass('hide');                    //Определяем нужно ли показывать кнопку при первичной загрузке страницы
  
  $(window).scroll(function(){
    pageX = window.pageYOffset;
    if (pageX >=500) {butTop.removeClass('hide')}             //В вверзу страницы скрываем кнопку
    else {butTop.addClass('hide')};
  
    if (pageX < heightDoc/2){                                 //Если выше половины документа - поварачиваем кнопку на прокрутку вверх
      butTop.css('transform', 'rotate(180deg)');
      link.attr('href', '#footer');
  
    }
    if (pageX >= heightDoc/2){                                 //Если нижк половины документа - поварачиваем кнопку на прокрутку Вниз
      butTop.css('transform', 'rotate(0)');
      link.attr('href', '#top');
  
    }
  })
  



  
  })