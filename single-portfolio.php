<?php get_header(); ?>

<div class="row">

    <div class="col-sm-12 col-md-8">

        <?php 
        
            if( have_posts() ):
            
                while( have_posts() ): the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <?php the_title( '<h1 class="">','</h1>' ); ?>

                        <?php if( has_post_thumbnail() ): ?>

                            <div class=""><?php the_post_thumbnail( 'thumbnail' ); ?></div>

                        <?php endif; ?>

                        <small>
                            <?php echo jandrews_get_terms( $post -> ID, 'genre' ); ?> || 
                        
                            <?php echo jandrews_get_terms( $post -> ID, 'software' ); ?>  
                            
                            <?php 
                                if( current_user_can( 'manage_options' ) ) {
                                    echo '|| '; edit_post_link(); 
                                }
                            ?>
                        </small>

                        <?php the_content(); ?>

                        <hr>

                        <div class="row">
                            <div class="col-sm-6 text-left"><?php previous_post_link(); ?></div>
                            <div class="col-sm-6 text-right"><?php next_post_link(); ?></div>
                        </div>


                    </article>

                <?php endwhile;
                
            endif;

        ?>

    </div>  <!-- .col-sm-12 .col-md-8 -->

    <div class="col-sm-12 col-md-4">

        <?php get_sidebar(); ?>

    </div>  <!-- .col-sm-12 .col-md-4 -->

</div>  <!-- .row -->

<?php get_footer(); ?>