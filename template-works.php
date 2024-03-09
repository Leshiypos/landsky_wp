<?php
/**
* Template name: Наши работы
* Template Post Type: page
*/
?>
<!-- Получение данных одного поста-->
<?php  
                                    // параметры по умолчанию
                $post_one = get_posts( array(
                    'numberposts' => 1,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'post_type'   => 'works',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                $post_id = $post_one[0]->ID;
                $post_title = $post_one[0]->post_title;
                $post_cont = $post_one[0]->post_content;
                $gallery = get_field('gallery', $post_id);
            ?>
<?php get_header(); ?>
<?php while(have_posts(  )) : the_post(); the_content();?>
<!-- Начало Хлебные крошки -->
<div class="bread-crumbs">
    <?php get_breadcrumb(); ?>
</div>
<!-- КОНЕЦ Хлебные крошки -->

<!-- Начало Секция Галереи -->
<section class="gallery_section" id="gallery">
    <div class="wrap_section">
        <h1> <?php the_title(); ?> </h1>
        <div class="main_screen">
            <div class="gallery_block">
                <div class="f-carousel images_block_works" id="myCarouselWorks">
                <?php foreach ($gallery as $img) { ?>
                    <!-- Начала эдемента -->
                    <div class="f-carousel__slide">
                        <a href="<?php echo esc_attr( wp_get_attachment_image_url($img,'full')); ?>" data-fancybox="gallery" data-caption="Caption #1">
                            <img src="<?php echo esc_attr( wp_get_attachment_image_url($img,'works_thumb_w')); ?>" />
                        </a>
                    </div>
                    <!-- Конец элемента -->
                <?php } ?>
                </div>
            </div>
            <!-- Конец Галереи -->
            <div class="wrap_miniature">
                <div id="miniature" class="f-carousel">
    <!-- Начало цикла МИНИАТЮР-->
            <?php  
                                    // параметры по умолчанию
                $my_posts = get_posts( array(
                    'numberposts' => -1,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'post_type'   => 'works',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );
                global $post;
                foreach( $my_posts as $post ){
                    setup_postdata( $post );
            ?>
                <div class="f-carousel__slide min_click"><img src="<?php echo the_post_thumbnail_url( 'miniature_works' ); ?>" alt="<?php the_title(); ?>" data-fancyboxMini="miniature" data-id="<?php echo get_the_ID(); ?>"></div>
            <?php
                }
                wp_reset_postdata(); // сброс 
            ?> 
    <!-- Окончание цикла МИНИАТЮР-->
                </div>
            </div>
            <div class="discription">
                <h2 id="title_gallery"> <?php echo esc_html($post_title) ?> </h2>
                <p id="content_gallery"> <?php echo $post_cont; ?></p>
            </div>
        </div>
    </div>
</section>
<!-- КОНЕЦ Секция Галерея -->



<?php endwhile; ?>
<?php get_footer(); ?>