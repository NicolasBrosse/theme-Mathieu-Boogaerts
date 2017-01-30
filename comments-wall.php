<?php
/**
 * Ce fichier est une version personnalisée du fichier de base pour les commentaires pour ce thème.
 * Le "mur" de message est un "mur" de commentaires sur un post spécial : le post "laisser un message"
 * Un post et non une page car l'import en csv des anciens messages dans Wordpress ne pouvait se faire que dans un post via le plugin utilisé
 *
 * @package matboog
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php
    
    $new_fields = array();
    
    $comments_args = array(
        
        // Utilise un filtre/hook pour ne pas faire apparaître les champs par défault du formulaire : nom, url , email de la personne qui commente
        'fields' => apply_filters( ‘comment_form_default_fields’, $new_fields ),
        // Change et simplifie le titre de la section, pour ne pas répéter celui du post
        'title_reply' => '' ,
        'title_reply_before' => '',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        // Personnalisation du champ du commentaire (textarea -> input)
        'comment_field' => '<p class="comment-form-comment">' . gglcptch_display() . '<input id="comment" name="comment" aria-required="true" type="text"></input></p>',
        // Change le label par défaut du bouton "envoyer"
        'label_submit' => __( 'Send', 'matboog' ),
);

    comment_form( $comments_args );

	if ( have_comments() ) : ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ul',
					'short_ping' => false,
                    //'per_page'   => '20', // limite le nombre de message sur la page
				) );
			?>
		</ul><!-- .comment-list -->

    <?php
	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'matboog' ); ?></p>
	<?php
	endif;
	?>

</div><!-- #comments -->
