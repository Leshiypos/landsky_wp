<?php 
//Определяем переменную для адреса к ajax обработчику
add_action( 'wp_enqueue_scripts', 'myajax_data', 99 );

function myajax_data(){
	wp_localize_script( 'landsky-main-js', 'myajax',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );
}

//Обработчик НАШИ РАБОТЫ

//Подключаем скрипт для формирования работ
add_action( 'wp_footer', 'ajax_works_load', 99 );

function ajax_works_load(){ ?>
<script>
    $(document).ready(function(){
        //Поключаем основную карусель
                const containerWorks = document.getElementById("myCarouselWorks");
                const optionsWorks = {
                    infinite: (carousel) => {
                        return carousel.pages.length > 2;
                    },
                    transition : "slide",
                    Navigation: {
                        prevTpl: '<svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="17.5" cy="17.5" r="17.5" transform="matrix(-1 0 0 1 35 0)" fill="#FFFCFC" fill-opacity="0.7"/><path d="M18.045 26.8262L20.6963 24.1737L14.5225 18L20.6963 11.8262L18.045 9.17374L11.4288 15.79C11.1385 16.0802 10.9083 16.4247 10.7512 16.8039C10.5941 17.1831 10.5132 17.5895 10.5132 18C10.5132 18.4104 10.5941 18.8169 10.7512 19.1961C10.9083 19.5753 11.1385 19.9198 11.4288 20.21L18.045 26.8262Z" fill="#A7A4A4"/></svg>',
                        nextTpl: '<svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="17.5" cy="17.5" r="17.5" fill="#FFFCFC" fill-opacity="0.7"/><path d="M16.955 26.8262L14.3037 24.1737L20.4775 18L14.3037 11.8262L16.955 9.17374L23.5712 15.79C23.8615 16.0802 24.0917 16.4247 24.2488 16.8039C24.4059 17.1831 24.4868 17.5895 24.4868 18C24.4868 18.4104 24.4059 18.8169 24.2488 19.1961C24.0917 19.5753 23.8615 19.9198 23.5712 20.21L16.955 26.8262Z" fill="#A7A4A4"/></svg>',
                    }
                };
                sliderWorks = new Carousel(containerWorks, optionsWorks);
    // КОНЕЦ Поключаем основную карусель


        $('.min_click').click(function(){
            var $this = $(this);    
            var id = $this.find('img').attr('data-id');
            var fomatData = {
                action : 'get_data_post',
                id_post : id,
            }
            $.ajax({                                                    //Делаем запрос ajax
                url : myajax.url, // обработчик
                data : fomatData, // данные
                type : 'POST', // тип запроса
                success : function( answer ){
                    $('#title_gallery').html(answer.post_title);
                    $('#content_gallery').html(answer.post_content);
                    $('#myCarouselWorks').html(answer.gallery);
                    sliderWorks.destroy();
                    sliderWorks = new Carousel(containerWorks, optionsWorks);
                    }
                });
        })//Конец Click
    }) //Конец READY
</script>
<?php }

/*
* Связываем обработчик и ajax запрос
*/
if( wp_doing_ajax() ){                                               //Подключаем AJAX только когда в этом есть смысл
    add_action( 'wp_ajax_get_data_post', 'get_data_post' );
    add_action( 'wp_ajax_nopriv_get_data_post', 'get_data_post' );
}

/*
* Обработчик AJAX НАШИ РАБОТЫ PHP
*/
function get_data_post(){
    $answer = array(); //Массив для ответа

    $post_id = sanitize_text_field( $_POST['id_post'] ); //Получаем ID миниатюры
    $my_post = get_post($post_id);                      //Получаем пост согласно ID миниатюры
    
    
    //Формируем вывод галереи
    $gallery = get_field('gallery', $post_id);
    $gall_data='';      // HTML раздела галереи
    foreach ($gallery as $img) { 
        $gall_data.='<div class="f-carousel__slide">';
        $gall_data.='<a href="'.esc_attr( wp_get_attachment_image_url($img,'full')).'" data-fancybox="gallery" data-caption="Caption #1">';
        $gall_data.='<img src="'.esc_attr( wp_get_attachment_image_url($img,'works_thumb_w')).'" /></a></div>';
     } 

    $answer['post_title']=$my_post->post_title;
    $answer['post_content']=$my_post->post_content;
    $answer['gallery']=$gall_data;

    
    wp_send_json($answer); //Отправляем ответ в формате JASON
    wp_die();
}

/*
* Отправка формы
*/
if( wp_doing_ajax() ){                                               //Подключаем AJAX только когда в этом есть смысл
    add_action( 'wp_ajax_send_form', 'send_form' );
    add_action( 'wp_ajax_nopriv__send_form', 'send_form' );
}

function send_form(){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $header = $_POST['header'];
    $message = $_POST['message'];
    $headerinmail = "Заявка с сайта LandSky по теме $header";
    $email_in = get_option('admin_email');
    
    // Формируем сообщение для отправки, в нём мы соберём всё, что ввели в форме
    $mes = "Имя: $name \nE-mail: $email \nТема: $header \nТекст: $message";
    // Пытаемся отправить письмо по заданному адресу
    // Если нужно, чтобы письма всё время уходили на ваш адрес — замените первую переменную $email на свой адрес электронной почты
    $send = wp_mail($email_in, $headerinmail, $mes, "Content-type:text/plain; charset = UTF-8\r\nFrom: landsky.by <info@landsky.by>");
    // Если отправка прошла успешно — так и пишем
    if ($send == 'true') {
        echo '<h5>Мы получили ваше сообщение и вернемся с ответом в ближайшее время</h5>';
    }
    // Если письмо не ушло — выводим сообщение об ошибке
    else {echo "<h5>Ой, что-то пошло не так</h5>";}
    wp_die();

}