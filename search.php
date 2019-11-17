<!-- Chamar header.php -->
<?php get_header(); ?>

      <!-- MENSAGEM DE ERRO -->
      <div class="row">
        <div class="col-md-8 col-sm-12">

          <?php //Se houver resultados exibe o conteúdo, senão exibe um formulário de buscas
          if (is_search()) :
            $total_results = $wp_query->found_posts;

            echo "<h3 class='mb-3'>" . sprintf(__('%s resultado(s) para "%s"', 'Blog Simple'), $total_results, get_search_query()) . "</h3>";

          endif;
          ?>

          <!-- Verificar se tem post e mostrar na página inicial -->
          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

            <!-- chamando post -->
            <?php get_template_part('content', get_post_format()); ?>

          <!-- fechamento do while -->
          <?php endwhile; ?>

          <!-- Se não encontrar nada na busca -->
          <?php else :

            echo "<p> Sua busca não econtrou resultados. Use o campo de pesquisa abaixo para refazer a busca. </p>";
            get_search_form();

          endif; ?>

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