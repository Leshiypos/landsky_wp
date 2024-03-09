<?php 
$args = array(
    'title1'           => '',
    'title2'           => '',
);

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>

<!-- НАЧАЛО Секция КОМАНДА -->
<section class="team" id="team">
    <div class="wrap_section">
        <h2><?php echo esc_html($title1); ?> <span><?php echo esc_html($title2); ?></span></h2>
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