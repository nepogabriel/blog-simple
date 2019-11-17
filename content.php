<?php if( is_single() ) : ?>

<!-- Imagem destaque do post -->
<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid rounded')); ?>

<!-- Título do post -->
<h2 class="mb-3 mt-4 pt-3 border-top border-success">
    <?php the_title(); ?>
</h2>

<!-- Exibir conteúdo -->
<?php the_content(); ?>

<hr class="border-success">

<!-- Campo de comentário -->
<?php comments_template(); ?>

<?php else : ?>

        <!-- POST 1 -->
        <div class="blog-post">
            <h3 class="mb-3 pb-3 border-bottom"><a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a></h3>
            <div class="row">
                <!-- Foto destaque do post -->
                <div class="col-md-12 col-lg-6 mb-1">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid')); ?>
                    </a>
                </div>
                <!-- Exibir resumo do post -->
                <div class="col-md-12 col-lg-6 mb-1">
                    <?php the_excerpt(); ?>
                </div>
            </div>
            <p class="text-muted">Publicado em <span class="badge badge-success"><?php echo get_the_date('d/m/y'); ?></span></p>
        </div>

<?php endif; ?>