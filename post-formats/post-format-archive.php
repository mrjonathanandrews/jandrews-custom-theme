<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
        <small>Posted on: <?php the_time( 'F j, Y' ); ?> at <?php the_time( 'g:i a' ); ?>, in <?php the_category(); ?></small>
    </header>
    
    <div class="row">

        <?php if( has_post_thumbnail() ): ?>

            <div class="col-sm-12 col-md-4">
                <div class="thumbnail"><?php the_post_thumbnail( 'medium' ); ?></div>
            </div>

            <div class="col-sm-12 col-md-8">
                <?php the_excerpt(); ?>
            </div>

        <?php else: ?>

            <div class="col-sm-12">
                <?php the_excerpt(); ?>
            </div>

        <?php endif; ?>

    </div>

</article>