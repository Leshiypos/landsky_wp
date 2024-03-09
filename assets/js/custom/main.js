$(document).ready(function(){
  var defaultForm = $('#feedback').html(); //Получаем html дефолтной формы
  var winW = $(window).width();
    Fancybox.bind("[data-fancybox]", {
        // Your custom options
      });

    $(".owl-carousel").owlCarousel({
      items:  1,
      loop:   true,
      nav:    true,
      autoplay: true,
      navText: [
        '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none"><rect width="64" height="64" rx="10" transform="matrix(-1 0 0 1 64 0)" fill="#FFBF3F"/><path d="M17.8333 31.8848C17.8306 33.6554 18.5133 35.3354 19.7586 36.5941L30.2066 47.4768C30.468 47.7488 30.8173 47.8848 31.1666 47.8848C31.5 47.8848 31.8306 47.7621 32.092 47.5114C32.6226 47.0048 32.6386 46.1568 32.1293 45.6261L21.668 34.7301C21.2333 34.2901 20.916 33.7754 20.7213 33.2181H45.6667C46.4027 33.2181 47 32.6208 47 31.8848C47 31.1488 46.4027 30.5514 45.6667 30.5514L20.7373 30.5514C20.9373 29.9968 21.26 29.4901 21.692 29.0608L32.236 18.2634C32.7506 17.7381 32.74 16.8928 32.2146 16.3781C31.6866 15.8661 30.8413 15.8741 30.3293 16.4021L19.8013 27.1834C18.5506 28.4154 17.8466 30.1061 17.8333 31.8848Z" fill="#1E5A5D"/></svg>',
        '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none"><rect width="64" height="64" rx="10" fill="#FFBF3F"/><path d="M46.1667 31.8848C46.1694 33.6554 45.4867 35.3354 44.2414 36.5941L33.7934 47.4768C33.532 47.7488 33.1827 47.8848 32.8334 47.8848C32.5 47.8848 32.1694 47.7621 31.908 47.5114C31.3774 47.0048 31.3614 46.1568 31.8707 45.6261L42.332 34.7301C42.7667 34.2901 43.084 33.7754 43.2787 33.2181H18.3333C17.5973 33.2181 17 32.6208 17 31.8848C17 31.1488 17.5973 30.5514 18.3333 30.5514L43.2627 30.5514C43.0627 29.9968 42.74 29.4901 42.308 29.0608L31.764 18.2634C31.2494 17.7381 31.26 16.8928 31.7854 16.3781C32.3134 15.8661 33.1587 15.8741 33.6707 16.4021L44.1987 27.1834C45.4494 28.4154 46.1534 30.1061 46.1667 31.8848Z" fill="#1E5A5D"/></svg>'
      ]
    });

    $(".block_team").owlCarousel({
      loop:   true,
      autoplay: true,
      nav:  false,
      autoWidth: true,
    });

    if (winW < 767){
      $(".block_works").owlCarousel({
        items:  1,
        loop:   true,
        autoplay: true,
        nav:  false,
        autoWidth: true,
        margin : 10
      });

    }
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

//Кнопка закрытия формы через делегирование событий - тк форма периобмчески очищается
$('#feedback').on('click', '#close_pop', function(){
    $('#send_mail').removeClass('visible').fadeOut();
})


//Валидация формы
$('#feedback').validate({
  submitHandler: function(){send_form();},
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

//СТРАНИЦА GALLERY
  //СТРАНИЦА GALLERY
  Fancybox.bind("[data-fancybox]", {  // Подключаем фенсибокс для главного окна Наши работы
    // Your custom options
  });

// Инициализация карусели myCarouselWorksпроисходит из файла ajax.php

//Поключаем основную карусель
var ax = (winW>640)?'y':'x';

    const containerMiniat = document.getElementById("miniature");
    const optionsMiniat = {
        infinite: true,
        axis: ax,
        Navigation : true,
        Dots : false
     };
    const sliderMiniat = new Carousel(containerMiniat, optionsMiniat);


    //Форма обратно связи

    function send_form(){
      var username=$('#name').val();
      var useremail=$('#email').val();
      var header = $('#theme').val();
      var usermessage = $('#message').val();
          var fomatData = {                                       //Компануем данные запроса ajax
            action : 'send_form',
            name : username,
            email : useremail,
            header : header,
            message : usermessage
          };
              $.ajax({                                            //Делаем запрос ajax
                url : myajax.url, // обработчик, // обработчик
                data : fomatData, // данные
                type : 'POST', // тип запроса
                success : function( data ){
                  $('#feedback').html(data);
                  setTimeout(closePopUp,1000);
                  setTimeout(setDefaultForm,2000);
                }
              }); 
    }

    //Функция закрытия окна POPup 
    function closePopUp(){
      $('#send_mail').removeClass('visible').fadeOut();
    }
    //Функция обносления формы после закоытия 
    function setDefaultForm(){
      $('#feedback').html(defaultForm);
    }

})