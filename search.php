<?php get_header(); ?>

<div class="row">

    <div class="col-sm-12 col-md-8">

        <div class="row">

            <?php

            if( have_posts() ):

                while( have_posts() ): the_post(); ?>

                    <?php get_template_part( 'content', 'search' ); ?>

                <?php endwhile;

            endif;

            ?>
        
        </div>  <!-- .row -->

    </div>  <!-- .col-sm-12 .col-md-8 -->

    <div class="col-sm-12 col-md-4">

        <?php get_sidebar(); ?>

    </div>  <!-- .col-sm-12 .col-md-4 -->

</div>  <!-- .row -->

<?php get_footer(); ?>