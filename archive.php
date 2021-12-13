<?php get_header(); ?>

    <div class="row">

        <div class="col-sm-12 col-md-8">

            <div class="row text-center">

                <?php if( have_posts() ): ?>

                    <header class="page-header">

                        <?php

                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>');

                        ?>

                    </header>

                    <?php while( have_posts() ): the_post(); ?>

                        <?php get_template_part( 'post-formats/post-format', 'archive' ); ?>

                    <?php endwhile; ?>

                    <div class="col-sm-12 text-center">

                        <?php the_posts_navigation(); ?>

                    </div>  <!-- .col-sm-12 .text-center -->
                    
                <?php endif; ?>

            </div>

        </div>  <!-- .col-sm-12 .col-md-8 -->

        <div class="col-sm-12 col-md-4">    

            <?php get_sidebar(); ?>
        
        </div>  <!-- .col-sm-12 .col-md-4 -->

    </div>  <!-- .row -->

<?php get_footer(); ?>