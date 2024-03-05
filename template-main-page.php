<?php
/**
* Template name: Главная страница
* Template Post Type: page
*/
?>
<?php get_header(); ?>
<!-- Начало Секция Услуги -->
<section class="services" id="services">
    <div class="wrap_section">
        <h2>Не зависимо от погодных условий оказываем <span>услуги</span></h2>
        <ul class="block_services">
<!-- Начало цикла постов Сервисы-->
            <?php  
                                    // параметры по умолчанию
                $my_posts = get_posts( array(
                    'numberposts' => -1,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'post_type'   => 'services',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                global $post;
                foreach( $my_posts as $post ){
                    setup_postdata( $post );
            ?>
                <li>
                    <div class="img"><img src="<?php echo the_post_thumbnail_url( 'service_icon' ); ?>" alt=""></div>
                    <div class="content">
                        <h3> <?php esc_html( the_title() ); ?> </h3>
                        <?php esc_html(the_excerpt(  )); ?>
                    </div>
                    <div class="cap"></div>
                </li>
            <?php
                }
                wp_reset_postdata(); // сброс 
            ?> 
<!-- Окончание цикла постов Сервисы-->
        </ul>
    </div>
</section>
<!-- КОНЕЦ Секция Услуги -->

<!-- Начало Секция НАШИ РАБОТЫ -->
<section class="works" id="works">
    <div class="wrap_section">
        <h2>Посмотрите на наши <span>работы</span></h2>
        <div class="block_works">
<!-- Начало цикла НАШИ РАББОТЫ-->
            <?php
            $i = 1; //Счетчик для определения размера 
            $size = '';

                $my_posts = get_posts(array(
                    'numberposts' => 6,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_type' => 'works',
                    'location_works' => 'main_page',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ));
                global $post;
                foreach($my_posts as $post){
                    setup_postdata($post);
                    if ($i == 1 or $i == 6){$size = 'works_thumb_w';} else {$size = 'works_thumb';};
                    ++$i;
            ?>
                <div>
                    <a href="<?php the_post_thumbnail_url('full'); ?>" data-fancybox="gallery" data-caption="Caption #1">
                        <img src="<?php the_post_thumbnail_url($size); ?>" />
                    </a>
                </div>  
            <?php }
                wp_reset_postdata();// сброс 
            ?>
<!-- КОНЕЦ цикла НАШИ РАББОТЫ-->
        </div>
        <a href="gallery.html" class="but_more">Больше работ</a>
    </div>
</section>
<!-- КОНЕЦ Секция НАШИ работы -->

<!-- КОНЕЦ Секция ОТЗЫВЫ -->
<section class="reviews" id="reviews">
    <div class="wrap_section">
        <h2>Чем мы отличаемся от остальных, <span>почему мы лучшие?</span> </h2>
        <!-- Почему мы лучшие -->
        <div class="block_best">
            <div class="single">
                <div class="num">1</div>
                <div class="content">
                    <h4>Качественный сервис</h4>
                    <p>Наши услуги по благоустройству вашей территории и уходу за газонами всегда на высшем уровне. Мы готовы приступить уже сегодня</p>
                </div>
            </div>
            <div class="single">
                <div class="num">2</div>
                <div class="content">
                    <h4>Наша  100% гарантия</h4>
                    <p>Мы предлагаем гарантию 10 лет в сфере ландшафтного дизайна и садоводства</p>
                </div>
            </div>
            <div class="single">
                <div class="num">3</div>
                <div class="content">
                    <h4>Довольные клиенты</h4>
                    <p>У нас уже более 80 довольных клиентов, которые работаю с нами на постоянно основе</p>
                </div>
            </div>
            <div class="single">
                <div class="num">4</div>
                <div class="content">
                    <h4>Всегда выслушаем</h4>
                    <p>Мы учитываем ваши потребности, желания и возможности</p>
                </div>
            </div>
            <div class="single">
                <div class="num">5</div>
                <div class="content">
                    <h4>Качественные материалы</h4>
                    <p>Мы сотрудничаем с проверенными поставщиками. На каждый материал имеется сертификат качества</p>
                </div>
            </div>
            <div class="single">
                <div class="num">6</div>
                <div class="content">
                    <h4>Опыт</h4>
                    <p>Мы занимаемся любим делом уже 11 лет</p>
                </div>
            </div>
        </div>
        <!-- КОНЕЦ Почему мы лучшие -->

        <!-- Отзывы -->
        <div class="block_reviews">
            <div class="single-rev">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/reviuws_1.jpg" alt="">
                <span class="date">22 августа 2024, г.Минск</span>
                <h4>Хорошая работа, как всегда</h4>
                <p>Рад, что довелось поработать с командой профессионалов из LandSky. Отзывлчивые и приветливые, всегда готовы подсказать. Работают быстро, чисто и качественно. Рекомендую.</p>
                
                <div class="client">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/client_1.jpg" alt="">
                    <p>Рикки Мартин</p>
                </div>
            </div>
            <div class="single-rev">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/reviuws_2.jpg" alt="">
                <span class="date">22 августа 2024, г.Минск</span>
                <h4>Рад был поработать, обращусь еще</h4>
                <p>Рад, что довелось поработать с командой профессионалов из LandSky. Отзывлчивые и приветливые, всегда готовы подсказать. Работают быстро, чисто и качественно. Рекомендую.</p>
                
                <div class="client">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/client_2.jpg" alt="">
                    <p>Арнольд Шварцнегер</p>
                </div>
            </div>
            <div class="single-rev">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/reviuws_3.jpg" alt="">
                <span class="date">22 августа 2024, г.Минск</span>
                <h4>Мой дом стал лучше и чище благодаря ребятам</h4>
                <p>Рад, что довелось поработать с командой профессионалов из LandSky. Отзывлчивые и приветливые, всегда готовы подсказать. Работают быстро, чисто и качественно. Рекомендую.</p>
                
                <div class="client">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/client_3.jpg" alt="">
                    <p>Том Круз</p>
                </div>
            </div>
        </div>
        <!-- КОНЕЦОтзывы -->
    </div>
</section>
<!-- КОНЕЦ Секция ОТЗЫВЫ -->

<!-- Начало Секция Партнеры -->
<section class="partners" id="partners">
    <div class="top"></div>
    <div class="wrap_section">
        <div class="owl-carousel ">
            <!-- start item -->
            <div class="slide">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slidet_part_1.png" alt="">
                <div class="content">
                        <h3 class="slide__title">Мы работаем с лучшими поставщиками </h3>
                        <p>«Королевский Сад» - с 2007 года является первым импортером натурального камня из России, Украины, Польши и Казахстана. Огромный ассартимент камня на любой вкус.</p>
                </div>
            </div>
            <!-- end item -->
            <!-- start item -->
            <div class="slide">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slidet_part_1.png" alt="">
                <div class="content">
                        <h3 class="slide__title">Мы работаем с лучшими поставщиками </h3>
                        <p>«Королевский Сад» - с 2007 года является первым импортером натурального камня из России, Украины, Польши и Казахстана. Огромный ассартимент камня на любой вкус.</p>
                </div>
            </div>
            <!-- end item -->
            <!-- start item -->
            <div class="slide">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slidet_part_1.png" alt="">
                <div class="content">
                        <h3 class="slide__title">Мы работаем с лучшими поставщиками </h3>
                        <p>«Королевский Сад» - с 2007 года является первым импортером натурального камня из России, Украины, Польши и Казахстана. Огромный ассартимент камня на любой вкус.</p>
                </div>
            </div>
            <!-- end item -->
            <!-- start item -->
            <div class="slide">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slidet_part_1.png" alt="">
                <div class="content">
                        <h3 class="slide__title">Мы работаем с лучшими поставщиками </h3>
                        <p>«Королевский Сад» - с 2007 года является первым импортером натурального камня из России, Украины, Польши и Казахстана. Огромный ассартимент камня на любой вкус.</p>
                </div>
            </div>
            <!-- end item -->
            <!-- start item -->
            <div class="slide">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slidet_part_1.png" alt="">
                <div class="content">
                        <h3 class="slide__title">Мы работаем с лучшими поставщиками </h3>
                        <p>«Королевский Сад» - с 2007 года является первым импортером натурального камня из России, Украины, Польши и Казахстана. Огромный ассартимент камня на любой вкус.</p>
                </div>
            </div>
            <!-- end item -->
            <!-- start item -->
            <div class="slide">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slidet_part_1.png" alt="">
                <div class="content">
                        <h3 class="slide__title">Мы работаем с лучшими поставщиками </h3>
                        <p>«Королевский Сад» - с 2007 года является первым импортером натурального камня из России, Украины, Польши и Казахстана. Огромный ассартимент камня на любой вкус.</p>
                </div>
            </div>
            <!-- end item -->
            <!-- start item -->
            <div class="slide">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slidet_part_1.png" alt="">
                <div class="content">
                        <h3 class="slide__title">Мы работаем с лучшими поставщиками </h3>
                        <p>«Королевский Сад» - с 2007 года является первым импортером натурального камня из России, Украины, Польши и Казахстана. Огромный ассартимент камня на любой вкус.</p>
                </div>
            </div>
            <!-- end item -->
          </div>
    </div>
    <div class="bottom"></div>
</section>
<!-- КОНЕЦ Секция Партнеры -->

<!-- НАЧАЛО Секция КОМАНДА -->
<section class="team" id="team">
    <div class="wrap_section">
        <h2>Познакомьтесь с потрясающей <span>командой</span></h2>
        <div class="block_team">
            <!-- НАЧАЛО single -->
            <div class="single">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar_1.png" class="avatar" alt="">
                <h4 class="name">Оптимус Прайм</h4>
                <p class="job_title">Директор</p>
            </div>
            <!-- КОНЕЦ single -->
            <!-- НАЧАЛО single -->
            <div class="single">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar_2.png" class="avatar" alt="">
                <h4 class="name">Наталья Орейра</h4>
                <p class="job_title">3D визуализатор</p>
            </div>
            <!-- КОНЕЦ single --> 
            <!-- НАЧАЛО single -->
            <div class="single">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar_3.png" class="avatar" alt="">
                <h4 class="name">Эдвард Руки-ножницы</h4>
                <p class="job_title">Стрижка газона</p>
            </div>
            <!-- КОНЕЦ single --> 
            <!-- НАЧАЛО single -->
            <div class="single">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar_4.png" class="avatar" alt="">
                <h4 class="name">Джон Сноу</h4>
                <p class="job_title">Специалист по уборке снега</p>
            </div>
            <!-- КОНЕЦ single -->       
        </div>
    </div>
</section>
<!-- Конец Секция КОМАНДА -->

<!-- НАчало Секция Как заказать -->
<section class="haw_order" id="haw_order">
    <div class="wrap_section">
        <h2>Как заказать у нас ландшафтный <span>дизайн?</span></h2>
        <!-- Начало блока -->
        <div class="block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/order_1.png" alt="">
            <div class="content">
                <h4>Позвоните и мы выслушаем</h4>
                <p>Позвоните или <a href="#">сделайте заявку</a> на ландшафтный дизайн прямо на сайте. Выслушаем Вашу мечту по облагораживанию участка и посоветуем, как ее лучше воплотить в реальность</p>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_down.png" alt="">
        <!-- КОНЕЦ блока -->
        <!-- Начало блока -->
        <div class="block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/order_2.png" alt="">
            <div class="content">
                <h4>Приедем и замерим</h4>
                <p>Выедим на место будущих работ, зделаем предварительный план участка с расположением построек</p>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_down.png" alt="">
        <!-- КОНЕЦ блока -->
        <!-- Начало блока -->
        <div class="block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/order_3.png" alt="">
            <div class="content">
                <h4>Заключим договор</h4>
                <p>Заключаем честный договор на оказание услуг по ландшафтному дизайну</p>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_down.png" alt="">
        <!-- КОНЕЦ блока -->
        <!-- Начало блока -->
        <div class="block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/order_4.png" alt="">
            <div class="content">
                <h4>Составим проект</h4>
                <p>В проект на оказание услуг по ландшафтному дизайну входи расчёт материалов, дендроплан, план посадочного материала, смета на материалы и работы, 3D модель и визуализация Вашей мечты, сроки исполнения</p>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_down.png" alt="">
        <!-- КОНЕЦ блока -->
        <!-- Начало блока -->
        <div class="block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/order_5.png" alt="">
            <div class="content">
                <h4>Приступим  к работе</h4>
                <p>После разработки проекта по ландшафтному дизайну Вашего участка мы приступаем к выполнению работ. Работаем быстро, качественно и аккуратно и не доставляем вам беспокойства.</p>
            </div>
        </div>
        <!-- КОНЕЦ блока -->
    </div>
</section>
<!-- КОНЕЦ Секция Как заказать -->

<!-- НАЧАЛО Секция О нас -->
<section class="about_as" id="about_as">
    <div class="wrap_section">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about_as.png" alt="">
        <div class="content">
            <h2>Мы <span>LandSky</span> - компания по созданию ландшафтному дизайну</h2>
            <p>Являемся профессиональной командой экспертов с 2012 года, специализирующихся на создании ландшафтных решений.</p>
            <p>Внимательны к деталям, создаем уникальные, тщательно спланированные проекты, которые превосходят ожидания наших клиентов.</p>
            <p>Наша компания предлагает полный спектр услуг по ландшафтному дизайну. </p>
            <p>Разрабатываем индивидуальные проекты, учитывая ваши пожелания и потребности. Наша команда опытных проведет вас по </p>
        </div>
    </div>
</section>
<!-- КОНЕЦ Секция О нас -->
<?php get_footer(); ?>