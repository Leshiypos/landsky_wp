<?php
//Services Shortcode
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Landsky_Services_Module extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => 'Наши услуги',
        'base'                    => 'landsky_services_module',
        'category'                => 'Landsky',
        'description'             => 'Ведите данные об услугах',
        'show_settings_on_create' => true,
        'icon'                    => '',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => "Заголовок 1",
                "param_name"  => "title1",
                "value"       => 'Не зависимо от погодных условий оказываем',
                "description" => 'Основная часть заголовка'
            ),
            array(
                "type"        => "textfield",
                "heading"     => "Заголовок 2",
                "param_name"  => "title2",
                "value"       => 'услуги',
                "description" => 'Выделеная часть заголовка'
            ),
        )
    ) );
}

//Works Shortcode
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Landsky_Works_Module extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => 'Наши Работы',
        'base'                    => 'landsky_works_module',
        'category'                => 'Landsky',
        'description'             => 'Ведите данные о наших работе',
        'show_settings_on_create' => true,
        'icon'                    => '',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => "Заголовок 1",
                "param_name"  => "title1",
                "value"       => 'Посмотрите на наши',
                "description" => 'Основная часть заголовка'
            ),
            array(
                "type"        => "textfield",
                "heading"     => "Заголовок 2",
                "param_name"  => "title2",
                "value"       => 'работы',
                "description" => 'Выделеная часть заголовка'
            ),
            array(
                "type"        => "textfield",
                "heading"     => "Заголовок кнопки",
                "param_name"  => "title_but",
                "value"       => 'Больше рабор',
                "description" => 'Ведите название кнопки'
            ),
        )
    ) );
}

//Why the best Slider Extension
if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Landsky_Best_Slider extends WPBakeryShortCodesContainer {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        "name"                    => 'Почему мы лучшие',
        "base"                    => "landsky_best_slider",
        "as_parent"               => array( 'only' => 'landsky_best_slider_item','cont2'=> 'landsky_testimoniaks_item' ),
        'description'             => 'Описание для модуля',
        "content_element"         => true,
        "category"                => 'Landsky',
        "icon"                    => '',
        "show_settings_on_create" => false,
        "params"                  => array(
            array(
                "type"        => "textfield",
                "heading"     => "Заголовок 1",
                "param_name"  => "title1",
                "value"       => 'Чем мы отличаемся от остальных,',
                "description" => 'Основная часть заголовка'
            ),
            array(
                "type"        => "textfield",
                "heading"     => "Заголовок 2",
                "param_name"  => "title2",
                "value"       => 'почему мы лучшие?',
                "description" => 'Выделеная часть заголовка'
            ),
        ),
        "js_view"                 => 'VcColumnView'
    ) );
}
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Landsky_Best_Slider_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => 'Лучшее качество',
        'base'                    => 'landsky_best_slider_item',
        'category'                => 'Landsky',
        'description'             => 'Опишите лучшее качество',
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'landsky_best_slider'),
        'icon'                    => '',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => 'Позиция',
                "param_name"  => "number",
                "value"       => '',
                "description" => 'Введите номер позиции'
            ),
            array(
                "type"        => "textfield",
                "heading"     => 'Заголовок',
                "param_name"  => "title3",
                "value"       => '',
                "description" => 'Введите заголовок качества'
            ),
            array(
                "type"        => "textarea",
                "heading"     => 'Описание',
                "param_name"  => "desc",
                "value"       => '',
                "description" => 'Введите описание качества'
            ),
        )
    ) );
}

if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Landsky_Testimoniaks_Item extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => 'Отзывы',
        'base'                    => 'landsky_testimoniaks_item',
        'category'                => 'Landsky',
        'description'             => 'Опишите лучшее качество',
        'show_settings_on_create' => true,
        "as_child"                => array('only' => 'landsky_best_slider'),
        'icon'                    => '',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => 'Позиция',
                "param_name"  => "number",
                "value"       => '',
                "description" => 'Введите номер позиции'
            ),
            array(
                "type"        => "textfield",
                "heading"     => 'Заголовок',
                "param_name"  => "title3",
                "value"       => '',
                "description" => 'Введите заголовок качества'
            ),
            array(
                "type"        => "textarea",
                "heading"     => 'Описание',
                "param_name"  => "desc",
                "value"       => '',
                "description" => 'Введите описание качества'
            ),
        )
    ) );
}
//Partners Shortcode
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Landsky_Partners_Module extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => 'Наши партнеры',
        'base'                    => 'landsky_partners_module',
        'category'                => 'Landsky',
        'description'             => 'Ведите данные раздела Партнеры',
        'show_settings_on_create' => true,
        'icon'                    => '',
        'weight'                  => - 5,
        'params'                  => array(),
    ) );
}

//Team Shortcode
if ( class_exists( "WPBakeryShortCode" ) ) {
    class WPBakeryShortCode_Landsky_Team_Module extends WPBakeryShortCode {}
}
if(function_exists('vc_map')) {
    vc_map( array(
        'name'                    => 'Наша команда',
        'base'                    => 'landsky_team_module',
        'category'                => 'Landsky',
        'description'             => 'Ведите данные раздела Наша команда',
        'show_settings_on_create' => true,
        'icon'                    => '',
        'weight'                  => - 5,
        'params'                  => array(
            array(
                "type"        => "textfield",
                "heading"     => "Заголовок 1",
                "param_name"  => "title1",
                "value"       => 'Познакомьтесь с потрясающей',
                "description" => 'Основная часть заголовка'
            ),
            array(
                "type"        => "textfield",
                "heading"     => "Заголовок 2",
                "param_name"  => "title2",
                "value"       => 'командой',
                "description" => 'Выделеная часть заголовка'
            ),
        )
    ) );
}



?>

