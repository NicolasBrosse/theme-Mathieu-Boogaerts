<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package matboog
 */

?>

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

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php matboog_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	        <!-- Insertion de la pochette album, si elle existe -->
        <?php $image = get_field('pochette_album');
            if( !empty($image) ): ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endif; ?>
        
        <!-- Insertion de l'affiche concert, si elle existe -->
        <?php $image = get_field('affiche_concert');
            if( !empty($image) ): ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endif; ?>
		
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'matboog' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'matboog' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->   
    
	<footer class="entry-footer">
		<?php matboog_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
