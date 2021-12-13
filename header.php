<!doctype HTML>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <title><?php bloginfo( 'name' ); ?><?php wp_title( '|'); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <?php wp_head(); ?>
    </head>

    <?php

        if( is_front_page() ):
            $front_page_classes = array( 'front-page-class' );
        else:
            $front_page_classes = array( 'not-front-page-class' );
        endif;

    ?>

    <body <?php body_class( $front_page_classes ); ?>>

        <div class="container">

            <div class="row">

                <div class="col-sm-12">
		
                    <?php wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'walker'            => new Walker_Nav_Primary()    
                        ) 
                    ); 
                    
                        // var_dump(get_custom_header());
                    
                    ?>

                </div>  <!-- .col-sm-12 -->

            </div>  <!-- .row -->

            <div class="row">

                <div class="col-sm-12">

                    <div class="search-form-container">

                        <?php get_search_form(); ?>

                    </div>  <!-- .search-form-container -->
                    
                </div>  <!-- .col-sm-12 -->

            </div>  <!-- .row -->
            
            <div class="row">

                <div class="col-sm-12">

                    <img src="<?php header_image(); ?>" height="<?php echo get_custom_header() -> height; ?>" width="<?php echo get_custom_header() -> width; ?>" alt="" />

                </div>  <!-- .col-sm-12 -->

            </div>  <!-- .row -->



            
            

