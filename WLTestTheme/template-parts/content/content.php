<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>

		<?php wltesttheme_post_thumbnail(); ?>
	</header>

	<div class="entry-content">
		<?php
		the_content(
			wltesttheme_continue_reading_text()
		);

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'wltesttheme' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'wltesttheme' ),
			)
		);

		?>
	</div>

	<footer class="entry-footer default-max-width">
		<?php wltesttheme_entry_meta_footer(); ?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
