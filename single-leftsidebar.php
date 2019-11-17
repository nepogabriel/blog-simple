<?php /* Template name: Sidebar na esquerda */ ?>

<?php get_header(); ?>

        <!-- Página do artigo -->
        <div class="row">

        <?php get_sidebar(); ?>

            <div class="col-md-8 col-sm-12">
                
                <!-- Info acima da imagem destaque -->
                <div class="container">
                    <div class="row">
                        <p class="text-muted">
                            <strong>Publicado em</strong>
                            <span class="badge badge-success">
                                <?php echo get_the_date('d/m/y'); ?>
                            </span>
                        </p>
                        <p class="text-muted">&nbsp; |&nbsp;&nbsp;</p>
                        <p class="text-muted">
                            <span class="badge badge-success">Autor:</span>
                            <strong>Gabriel Nepomuceno</strong>
                        </p>
                        <p class="text-muted">&nbsp; |&nbsp;&nbsp;</p>
                        <p class="text-muted">
                            <span class="badge badge-success">Views:</span>
                            <strong>1280</strong>
                            <i class="far fa-eye"></i>
                        </p>
                    </div>
                </div>

                <!-- Verificar se tem post e mostrar -->
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

                 <!-- chamando post -->
                 <?php get_template_part('content', get_post_format()); ?>

                <!-- Num lembro o que é rs -->
                <?php endwhile; ?>
                
                <!-- Caso ñ tiver post mostrar erro -->
                <?php else : get_404_template(); endif; ?>

            </div>

        </div>


<?php get_footer(); ?>