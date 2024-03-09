<?php
$args = array(
    'number'         => '',
    'title3'         => '',
    'desc'           => '',
);

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>

<div class="single">
    <div class="num"><?php echo esc_html($number); ?></div>
    <div class="content">
        <h4><?php echo esc_html($title3); ?></h4>
        <p><?php echo esc_html($desc); ?></p>
    </div>
</div>