<?php

function blogsimple_customize_register($wp_customize) {

    //Footer
    $wp_customize -> add_section('footer', array(
        'title' => __('Rodapé', 'Blog Simple'),
        'description' => sprintf(__('Opções para o rodapé', 'Blog Simple')),
        'priority' => 20
    ));

    $wp_customize -> add_setting('footer_title', array(
        'default' => _x('Blog Simple - Version Beta 0.1', 'Blog Simple'),
        'type' => 'theme_mod'
    ));

    $wp_customize -> add_control('footer_title', array(
        'label' => __('Título do rodapé', 'Blog Simple'),
        'section' => 'footer',
        'priority' => 1
    ));


    $wp_customize -> add_setting('footer_text', array(
        'default' => _x('© Todos os direitos reservados.', 'Blog Simple'),
        'type' => 'theme_mod'
    ));

    $wp_customize -> add_control('footer_text', array(
        'label' => __('Texto do rodapé', 'Blog Simple'),
        'section' => 'footer',
        'priority' => 2
    ));
}
add_action('customize_register', 'blogsimple_customize_register');