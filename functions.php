<?php
/*
    ====================================
     Include Scripts
    ====================================
*/

// This function enqueues my styles.css and index.js files in the header and footer, respectively
function jandrews_script_enqueue() {

    wp_enqueue_style( 'bootstrap-cdn', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), false, 'all' );
    wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/styles.css', array(), '1.0.0', 'all' );

    wp_enqueue_script( 'bootstrap-cdn', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array(), false, true );
    wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/index.js', array(), '1.0.0', true );
    
}

add_action( 'wp_enqueue_scripts', 'jandrews_script_enqueue' );

/*
    ====================================
     Activate Menus
    ====================================
*/

// This function registers my menus and assigns their locations
function jandrews_theme_setup() {

    add_theme_support( 'menus' );

    register_nav_menu( 'primary', 'Primary Header Navigation' );
    register_nav_menu( 'secondary', 'Footer Navigation' );

}

add_action( 'init', 'jandrews_theme_setup' );

/*
    ====================================
     Theme Support Function
    ====================================
*/

add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );

add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

add_theme_support( 'html5', array( 'search-form' ) );

/*
    ====================================
     Sidebar Function
    ====================================
*/

function jandrews_widget_setup() {

    register_sidebar( 
        array(
            'name'          => 'Sidebar',
            'id'            => 'sidebar-1',
            'class'         => 'custom',
            'description'   => 'Standard Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>'
        )
    );

}

add_action( 'widgets_init', 'jandrews_widget_setup' );

/*
    ====================================
     Include Walker File
    ====================================
*/

require get_template_directory() . '/inc/walker.php';

/*
    ====================================
     Head Function
    ====================================
*/

function jandrews_remove_version() {
    return '';
}

add_filter( 'the_generator', 'jandrews_remove_version' );

/*
    ====================================
     Custom Post Type(s)
    ====================================
*/

function jandrews_custom_post_type() {
    $labels = array(
        'name'                  =>  'Portfolio',
        'singular_name'         =>  'Portfolio',
        'add_new'               =>  'Add Item',
        'all_items'             =>  'All Items',
        'add_new_item'          =>  'Add Item',
        'edit_item'             =>  'Edit Item',
        'new_item'              =>  'New Item',
        'view_item'             =>  'View Item',
        'search_item'           =>  'Search Portfolio',
        'not_found'             =>  'No items found',
        'not_found_in_trash'    =>  'No items found in trash',
        'parent_item_colon'     =>  'Parent Item:'
    );

    $args = array(
        'labels'                =>  $labels,
        'public'                =>  true,
        'has_archive'           =>  true,
        'publicly_queryable'    =>  true,
        'query_var'             =>  true,
        'rewrite'               =>  true,
        'capability_type'       =>  'post',
        'hierarchical'          =>  false,
        'supports'               =>  array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions'
        ),
        // 'taxonomies'            =>  array(
        //     'category',
        //     'post_tag'
        // ),
        'menu_position'         =>  5,
        'exclude_from_search'   =>  false
    );

    register_post_type( 'portfolio', $args );
}

add_action( 'init', 'jandrews_custom_post_type' );

function jandrews_custom_taxonomies() {

    // add new hierarchical taxonomy (Portfolio Genres)
    $genreLabels = array(
        'name'                  =>  'Genres',
        'singular_name'         =>  'Genre',
        'search_items'          =>  'Search Genres',
        'all_items'             =>  'All Genres',
        'parent_item'           =>  'Parent Genre',
        'parent_item_colon'     =>  'Parent Genre:',
        'edit_item'             =>  'Edit Genre',
        'update_item'           =>  'Update Genre',
        'add_new_item'          =>  'Add New Genre',
        'new_item_name'         =>  'New Genre Name',
        'not_found'             =>  'No genres found',
        'not_found_in_trash'    =>  'No genres found in trash',
        'menu_name'             =>  'Genres'    
    );

    $genreArgs = array(
        'hierarchical'      =>  true,
        'labels'            =>  $genreLabels,
        'show_ui'           =>  true,
        'show_admin_column' =>  true,
        'query_var'         =>  true,
        'rewrite'           =>  array( 'slug'   =>  'genres' )
        // mysite.com/development (rewrite = false)
        // mysite.com/genre/development (rewrite = true = better)
    );

    register_taxonomy( 'genre', array( 'portfolio' ), $genreArgs );

    // add new non-hierarchical taxonomy (Software used in Portfolio pieces)
    $softwareLabels = array(
        'name'                  =>  'Software',
        'singular_name'         =>  'Software',
        'search_items'          =>  'Search Software',
        'all_items'             =>  'All Software',
        'parent_item'           =>  'Parent Software',
        'parent_item_colon'     =>  'Parent Software:',
        'edit_item'             =>  'Edit Software',
        'update_item'           =>  'Update Software',
        'add_new_item'          =>  'Add New Software',
        'new_item_name'         =>  'New Software Name',
        'not_found'             =>  'No software found',
        'not_found_in_trash'    =>  'No software found in trash',
        'menu_name'             =>  'Software'
    );

    $softwareArgs = array(
        'hierarchical'      =>  true,
        'labels'            =>  $softwareLabels,
        'show_ui'           =>  true,
        'query_var'         =>  true,
        'rewrite'           =>  array( 'slug'   =>  'software' )
    );

    register_taxonomy( 'software', 'portfolio', $softwareArgs );
}

add_action( 'init', 'jandrews_custom_taxonomies' );

/*
    ====================================
     Custom Term Function
    ====================================
*/

function jandrews_get_terms( $postID, $term ) {

    $terms_list = wp_get_post_terms( $postID, $term );
    $output = '';
                            
    $i = 0;

    foreach( $terms_list as $term ) {
        $i++;
        if( $i > 1) { $output .= ', '; }
        $output .= '<a href="' . get_term_link( $term ) . '">' . $term -> name . '</a>';
    }

    return $output;

}