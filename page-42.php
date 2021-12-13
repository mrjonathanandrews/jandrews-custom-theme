<?php get_header(); ?>

<div class="row">

    <div class="col-sm-12 col-md-8">

        <?php 
        
            if( have_posts() ):
            
                while( have_posts() ): the_post(); ?>

                    <p><?php the_content(); ?></p>

                    <h3><?php the_title(); ?></h3>

                    <hr>

                <?php endwhile;
                
            endif;

        ?>

    </div>  <!-- .col-sm-12 .col-md-8 -->

    <div class="col-sm-12 col-md-4">

        <?php get_sidebar(); ?>

    </div>  <!-- .col-sm-12 .col-md-4 -->

</div>  <!-- .row -->

<?php get_footer(); ?>