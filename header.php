<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <!-- Required meta tags -->
    <meta <?php bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">

    <?php wp_head(); ?>
  </head>

  <body>
    <!-- ESTRUTURA COMPLETA -->
    <div class="container">

      <!-- HEADER -->
      <div class="row my-5 align-items-center">

        <!-- LOGO -->
        <div class="col-md-6 col-sm-12">

          <?php //logo em imagem
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

            if(has_custom_logo()) {
              echo '<img src="' . esc_url($logo[0]) . '" class="img-fluid mb-2">';
            } else {
              echo '<h1 class="text-dark">' . get_bloginfo('name') . '</h1>';
              echo '<p class="lead text-success">' . get_bloginfo('description') . '</p>';
            }
          ?>

        </div>

        <!-- Campo de Busca -->
        <div class="col-md-4 offset-md-2 col-sm-12">
          <?php //Adicionao formulário de busca
            dynamic_sidebar('Busca');
          ?>
        </div>
        
      </div>

      <!-- MENU -->
      <div class="row">
        <div class="col mb-5">

          <nav class="navbar navbar-expand-lg navbar-dark bg-success rounded" role="navigation">
            <div class="container">
            <!-- Menu do tema -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
              <?php
              wp_nav_menu( array(
                'theme_location'    => 'principal',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
              ) );
              ?>
            </div>
          </nav>

        </div>
      </div>