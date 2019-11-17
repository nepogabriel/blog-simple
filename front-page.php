<!-- Chamar header.php -->
<?php get_header(); ?>

      <!-- MINI POSTS -->
      <div class="row">

        <!-- Definindo os 3 posts no top -->
        <!-- Pode usar tag ao invés de categoria (olhar na documentação wordpress) -->
        <?php
        // args
        $my_args = array(
          'post_type' => 'post',
          'posts_per_page' => 3,
          'category_name' => 'Destaque'
        );

        // query
        $my_query = new WP_Query ( $my_args );
        ?>

        <?php if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post(); ?>
 
        <!-- POST 1 -->
        <div class="col-md-4 col-sm-12 mb-5">
          <div class="card">
            <!-- imagem destaque dinâmica -->
            <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid card-img-top')); ?>
            <div class="card-body">
              <?php the_title(); ?>
              <hr class="mb-0 mt-3 border-success"><br>
              <a href="<?php the_permalink(); ?>"><button class="btn btn-outline-success">Leia mais</button></a>
            </div>
          </div>
        </div>

        <!-- Fechando While e if -->
        <?php endwhile; endif; ?>

        <!-- Reseta a query para o feed de post aparecer normalmente -->
        <?php wp_reset_query(); ?>

      </div>

      <!-- FEED DE POSTS -->
      <div class="row">
        <div class="col-md-8 col-sm-12">

          <!-- Verificar se tem post e mostrar na página inicial -->
          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

            <!-- chamando post -->
            <?php get_template_part('content', get_post_format()); ?>

          <!-- Navegação do feed de post -->
          <?php endwhile; ?>

          <!-- Página não existente -->
          <?php else : get_404_template(); endif; ?>

          <!-- Navegação Posts -->
          <div class="blog-pag mt-5 mb-3">
            <?php next_posts_link( 'Mais novos' ); ?>
            <?php previous_posts_link( 'Mais antigos' ); ?>
          </div>

        </div>

        <!-- Chamar sidebar.php -->
        <?php get_sidebar(); ?>
      </div>
      
    </div>

<!-- Chamar footer.php -->
<?php get_footer(); ?>