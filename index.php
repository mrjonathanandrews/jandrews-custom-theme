<?php get_header(); ?>

    <div class="row">

        <div class="col-sm-12 col-md-8">

            <?php 
            // This overrides the setting in the dashboard. Useful for targeted blog rolls 
            $currentPage = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array( 
                'posts_per_page'    => 3,
                'paged'             => $currentPage
            );
            query_posts( $args );
            
            if( have_posts() ):
            
                while( have_posts() ): the_post(); ?>

                    <?php get_template_part( 'post-formats/post-format', get_post_format() ); ?>

                <?php endwhile; ?>

                <div class="col-sm-6 text-left">

                    <?php next_posts_link( '<< Older Posts' ); ?>

                </div>  <!-- .col-sm-6 .text-left -->

                <div class="col-sm-6 text-right">

                    <?php previous_posts_link( 'Newer Posts >>' ); ?>

                </div>  <!-- .col-sm-6 .text-right -->
                
            <?php 
            
            endif; 
            
            wp_reset_query();
            
            ?>

        </div>  <!-- .col-sm-12 .col-md-8 -->

        <div class="col-sm-12 col-md-4">    

            <?php get_sidebar(); ?>
        
        </div>  <!-- .col-sm-12 .col-md-4 -->

    </div>  <!-- .row -->

<?php get_footer(); ?>