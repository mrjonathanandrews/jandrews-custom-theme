<?php get_header(); ?>

    <div class="row">

        <?php

            /*
            $args_cat = array(
                'include' => '1, 9, 8'
            );

            $categories = get_categories($args_cat);
            foreach($categories as $category):

                $args = array(
                    'type'              => 'post',
                    'posts_per_page'    => 3,
                    'category__in'      => $category->term_id,
                    'category__not_in'  => array( 10 )
                );
    
                $lastBlog = new WP_Query( $args );
    
                if( $lastBlog -> have_posts() ):
                
                    while( $lastBlog -> have_posts() ): $lastBlog -> the_post(); ?>
    
                        <div class="col-sm-12 col-md-4">
    
                            <?php get_template_part( 'post-formats/post-format', 'featured' ); ?>
    
                        </div>
    
                    <?php endwhile;
                    
                endif;
    
                wp_reset_postdata();

            endforeach;
            */

            // Prints 3 most recent posts
            $args = array(
                'type'              => 'post',
                'posts_per_page'    => 3
                // 'category__in'      => array( id's of categories wanted )
                // 'category__not_in   => array( id's of category not wanted )
            );

            $lastBlog = new WP_Query( $args );

            if( $lastBlog -> have_posts() ):
            
                while( $lastBlog -> have_posts() ): $lastBlog -> the_post(); ?>

                    <div class="col-sm-12 col-md-4">

                        <?php get_template_part( 'post-formats/post-format', 'featured' ); ?>

                    </div>

                <?php endwhile;
                
            endif;

            wp_reset_postdata();

        ?>

    </div>

    <div class="row">

        <div class="col-sm-12 col-md-8">

            <?php 
            
                if( have_posts() ):
                
                    while( have_posts() ): the_post(); ?>

                        <?php get_template_part( 'post-formats/post-format', get_post_format() ); ?>

                    <?php endwhile;
                    
                endif;

                // Uses category id from URL
                // $lastBlog = new WP_Query( 'type=post&posts_per_page=-1&cat=' );

                // Uses category name
                // $lastBlog = new WP_Query( 'type=post&posts_per_page=-1&category_name=' );

                // Prints remaining posts (Not the most recent post)
            /*
                $args = array(
                    'type'              => 'post',
                    'posts_per_page'    => 2,
                    'offset'            => 1
                );

                $lastBlog = new WP_Query( $args );

                if( $lastBlog -> have_posts() ):
                
                    while( $lastBlog -> have_posts() ): $lastBlog -> the_post(); ?>

                        <?php get_template_part( 'post-formats/post-format', get_post_format() ); ?>

                    <?php endwhile;
                    
                endif;

                wp_reset_postdata();
            */

            ?>

        </div>  <!-- .col-sm-12 .col-md-8 -->

        <div class="col-sm-12 col-md-4">    

            <?php get_sidebar(); ?>
        
        </div>  <!-- .col-sm-12 .col-md-4 -->

    </div>  <!-- .row -->

<?php get_footer(); ?>