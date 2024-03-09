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