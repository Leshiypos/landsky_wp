<?php 
$args = array(
    'title1'           => '',
    'title2'           => '',
);

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>

<!-- КОНЕЦ Секция ОТЗЫВЫ -->
<section class="reviews" id="reviews">
    <div class="wrap_section">
        <h2><?php echo esc_html($title1); ?> <span><?php echo esc_html($title2); ?></span> </h2>
        <!-- Почему мы лучшие -->
        <div class="block_best">
            <?php echo do_shortcode($content); ?>
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