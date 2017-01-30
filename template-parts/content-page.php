<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package matboog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   
   <?php if( get_field('menu_welcome') ): ?>
        <div class="menu-nav-fixe"><?php the_field('menu_welcome');?></div>
    <?php endif; ?>
   
    <?php if (! is_page( 7 ) ) { ?> <!-- pour ne pas voir apparaître le titre 'Accueil' sur la page d'accueil -->
            <header class="entry-header">
                <?php
                   the_title( '<h1 class="entry-title">', '</h1>' );
                ?>
            </header><!-- .entry-header -->
    <?php } ?>
    

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'matboog' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'matboog' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
