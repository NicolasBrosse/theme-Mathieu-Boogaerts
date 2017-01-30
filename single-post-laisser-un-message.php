<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package matboog
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <?php
            while ( have_posts() ) : the_post();?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <!-- Insertion du menu fixe via ACF -->
                        <?php if( get_field('menu_welcome') ): ?>
                            <div class="menu-nav-fixe"><?php the_field('menu_welcome');?></div>
                        <?php endif; ?>

                    <header class="entry-header">  
                        <?php
                        if ( is_single() ) :
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        else :
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        endif;
                        ?>
                    </header><!-- .entry-header -->

                </article><!-- #post-## -->
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template('/comments-wall.php');
                    endif;

            endwhile; // End of the loop.
            ?>
		</main><!-- #main -->
	</div><!-- #primary -->


</div><!-- #content -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
