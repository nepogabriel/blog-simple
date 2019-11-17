<!-- Chamar header.php -->
<?php get_header(); ?>

      <!-- FEED DE POSTS -->
      <div class="row">
        <div class="col-md-8 col-sm-12">

          <!-- Verificar se tem post e mostrar na página inicial -->
          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

            <!-- chamando post -->
            <?php get_template_part('content', get_post_format()); ?>

          <!-- fechamento do while -->
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