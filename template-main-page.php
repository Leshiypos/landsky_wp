<?php
/**
* Template name: Главная страница
* Template Post Type: page
*/
?>
<?php get_header(); ?>
<?php while(have_posts(  )) : the_post(); the_content();?>
<!-- Начало Секция Услуги -->
<?php
    $service = get_field('service'); //Массив переменных УСЛУГИ
    $works = get_field('works'); //Массив переменных НАШИ РАБОТЫ
    $best = get_field('best'); //Массив переменных Почему лучшие
    $best_single = get_field('best_single'); //Массив переменных Почему лучшие

    $reviews_1 = get_field('reviews_1'); //Массив переменных отзыв 1
    $reviews_2 = get_field('reviews_2'); //Массив переменных отзыв 2
    $reviews_3 = get_field('reviews_3'); //Массив переменных отзыв 3
    
    $team = get_field('team'); //Массив переменных Наша команда
    $howtowork_title = get_field('howtowork_title'); //Массив переменных Наша команда
    $howtowork = get_field('howtowork'); //Повторитель раздела КАК ЗАКАЗАТЬ
    $about = get_field('about'); //Повторитель раздела о нас

?> 
<section class="services" id="services">
    <div class="wrap_section">
    <?php if ($service) {?> 
        <h2><?php echo esc_html($service['title_1']); ?> <span><?php echo esc_html( $service['title_2']); ?></span></h2>
    <?php } ?>
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
    <?php if ($works) {?> 
        <h2><?php echo esc_html($works['title_1']); ?> <span><?php echo esc_html($works['title_2']); ?></span></h2>
    <?php } ?>
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
    <?php if ($works) {?>
        <a href="gallery.html" class="but_more"><?php echo esc_html($works['button']); ?></a>
    <?php } ?>
    </div>
</section>
<!-- КОНЕЦ Секция НАШИ работы -->

<!-- КОНЕЦ Секция ОТЗЫВЫ -->
<section class="reviews" id="reviews">
    <div class="wrap_section">
    <?php if ($best) {?> 
        <h2><?php echo esc_html($best['title_1']); ?> <span><?php echo esc_html( $best['title_2']); ?></span></h2>
    <?php } ?>
    
        <!-- Почему мы лучшие -->
        <div class="block_best">
            <?php
            $i = 1;
            if ($best_single) {
                foreach ($best_single as $best_one){
            ?>
            <div class="single">
                <div class="num"> <?php echo $i; ++$i; ?> </div>
                <div class="content">
                    <h4><?php echo esc_html( $best_one['title']); ?></h4>
                    <p><?php echo esc_html( $best_one['desc']); ?></p>
                </div>
            </div>
            <?php 
                }
            }
             ?>
        <!-- КОНЕЦ Почему мы лучшие -->

        <!-- Отзывы -->
        <div class="block_reviews">
            <div class="single-rev">
                <img src="<?php echo esc_attr( wp_get_attachment_image_url($reviews_1['im_works'],'rev_img')); ?>" alt="">
                <span class="date"><?php echo $reviews_1['date'].' ,'.$reviews_1['cyty'] ?></span>
                <h4><?php echo esc_html($reviews_1['titlle']); ?></h4>
                <p><?php echo esc_html($reviews_1['desc']); ?></p>
                
                <div class="client">
                    <img src="<?php echo esc_attr( wp_get_attachment_image_url($reviews_1['avatar'],'avatar')); ?>" alt="">
                    <p><?php echo esc_html($reviews_1['name']); ?></p>
                </div>
            </div>
            <div class="single-rev">
                <img src="<?php echo esc_attr( wp_get_attachment_image_url($reviews_2['im_works'],'rev_img')); ?>" alt="">
                <span class="date"><?php echo $reviews_2['date'].' ,'.$reviews_2['cyty'] ?></span>
                <h4><?php echo esc_html($reviews_2['titlle']); ?></h4>
                <p><?php echo esc_html($reviews_2['desc']); ?></p>
                
                <div class="client">
                    <img src="<?php echo esc_attr( wp_get_attachment_image_url($reviews_2['avatar'],'avatar')); ?>" alt="">
                    <p><?php echo esc_html($reviews_2['name']); ?></p>
                </div>
            </div>
            <div class="single-rev">
                <img src="<?php echo esc_attr( wp_get_attachment_image_url($reviews_3['im_works'],'rev_img')); ?>" alt="">
                <span class="date"><?php echo $reviews_3['date'].' ,'.$reviews_3['cyty'] ?></span>
                <h4><?php echo esc_html($reviews_3['titlle']); ?></h4>
                <p><?php echo esc_html($reviews_3['desc']); ?></p>
                
                <div class="client">
                    <img src="<?php echo esc_attr( wp_get_attachment_image_url($reviews_3['avatar'],'avatar')); ?>" alt="">
                    <p><?php echo esc_html($reviews_3['name']); ?></p>
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
<!-- Начало цикла постов Партнеры-->
            <?php  
                                    // параметры по умолчанию
                $my_posts = get_posts( array(
                    'numberposts' => -1,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'post_type'   => 'partners',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                global $post;
                foreach( $my_posts as $post ){
                    setup_postdata( $post );
            ?>
                <div class="slide">
                    <img src="<?php esc_attr(the_post_thumbnail_url( 'parthners_thumb' ));?>" alt="">
                    <div class="content">
                            <h3 class="slide__title"> <?php esc_html(the_title()); ?> </h3>
                            <?php esc_html(the_content()); ?>
                    </div>
                </div>
            <?php
                }
                wp_reset_postdata(); // сброс 
            ?> 
<!-- Окончание цикла постов Партнеры-->
          </div>
    </div>
    <div class="bottom"></div>
</section>
<!-- КОНЕЦ Секция Партнеры -->

<!-- НАЧАЛО Секция КОМАНДА -->
<section class="team" id="team">
    <div class="wrap_section">
    <?php if ($team) {?> 
        <h2><?php echo esc_html($team['title_1']); ?> <span><?php echo esc_html( $team['title_2']); ?></span></h2>
    <?php } ?>
        <div class="block_team">
<!-- Начало цикла постов Партнеры-->
            <?php  
                                    // параметры по умолчанию
                $my_posts = get_posts( array(
                    'numberposts' => -1,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'post_type'   => 'team',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );
                global $post;
                foreach( $my_posts as $post ){
                    setup_postdata( $post );
            ?>
                <!-- НАЧАЛО single -->
                <div class="single">
                    <img src="<?php esc_attr(the_post_thumbnail_url( 'team_avatar' ));?>" class="avatar" alt="">
                    <h4 class="name"> <?php the_title(); ?> </h4>
                    <p class="job_title">
                    <?php
                        $terms = get_the_terms($post->ID, 'profession');
                        if ($terms) {
                            foreach ($terms as $term){
                                echo '<p>'.$term->name.'</p>';
                            }
                        }
                    ?>
                    </p>
                </div>
                <!-- КОНЕЦ single -->
            <?php
                }
                wp_reset_postdata(); // сброс 
            ?> 
        </div>
    </div>
</section>
<!-- Конец Секция КОМАНДА -->


<!-- НАчало Секция Как заказать -->
<section class="haw_order" id="haw_order">
    <div class="wrap_section">
    <?php if ($works) {?> 
        <h2><?php echo esc_html($howtowork_title['title_1']); ?> <span><?php echo esc_html($howtowork_title['title_2']); ?></span></h2>
    <?php } ?>


        <?php 
            $count = count($howtowork);
            $i = 0;
            if ($howtowork){
                foreach ($howtowork as $work){
                    ++$i;
        ?>
        <!-- Начало блока -->
            <div class="block">
                <img src="<?php echo esc_attr( wp_get_attachment_image_url($work['icon'],'icon_howtowork')); ?>" alt="">
                <div class="content">
                    <h4> <?php echo esc_html($work['title']); ?> </h4>
                    <p> <?php echo esc_html( $work['disc']); ?> </p>
                </div>
            </div>
        <?php if ($i != $count){ ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_down.png" alt="">
        <?php } ?>
        <!-- КОНЕЦ блока -->
        <?php 
                }
        } ?>
    </div>
</section>
<!-- КОНЕЦ Секция Как заказать -->

<!-- НАЧАЛО Секция О нас -->
<section class="about_as" id="about_as">
    <div class="wrap_section">
        <img src="<?php echo esc_attr( wp_get_attachment_image_url($about['img'],'about_img')); ?>" alt="">
        <div class="content">
            <h2><?php echo $about['title']; ?></h2>
            <?php echo $about['desc']; ?>
        </div>
    </div>
</section>
<!-- КОНЕЦ Секция О нас -->

<?php endwhile; ?>
<?php get_footer(); ?>