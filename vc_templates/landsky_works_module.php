<?php 
$args = array(
    'title1'           => '',
    'title2'           => '',
    'title_but'        => '',
);

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>


<!-- Начало Секция НАШИ РАБОТЫ -->
<section class="works" id="works">
    <div class="wrap_section">
        <h2><?php echo esc_html($title1); ?> <span><?php echo esc_html($title2); ?></span></h2>
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
        <a href="gallery.html" class="but_more"><?php echo esc_html($title_but); ?></a>
    </div>
</section>
<!-- КОНЕЦ Секция НАШИ работы -->