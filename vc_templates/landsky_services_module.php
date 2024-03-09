<?php 
$args = array(
    'title1'           => '',
    'title2'           => '',
);

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>

<!-- Начало Секция Услуги -->
<section class="services" id="services">
    <div class="wrap_section">
        <h2><?php echo esc_html($title1); ?> <span><?php echo esc_html($title2); ?></span></h2>
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