<?php get_header(); ?>

            <!-- Depois comentar detalhado esse arquivo -->

        <!-- FEED DE POSTS -->
        <div class="row">
            <div class="col-md-8 col-sm-12">

                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

                <h2 class="mb-5 pt-3 text-center">
                    <?php the_title(); ?>
                </h2>
            
                <?php the_content(); ?>

                <?php endwhile; ?>

                <?php else : get_404_template(); endif; ?>

            </div>

            <?php get_sidebar(); ?>
        </div>


<?php get_footer(); ?>