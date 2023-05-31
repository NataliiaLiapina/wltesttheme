<?php
/**
 * Displays header site branding
 */

$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';

?>

<?php if ( has_custom_logo() && $show_title ) : ?>
	<div class="site-logo"><?php the_custom_logo(); ?></div>
<?php endif; ?>

<div class="site-branding">

	<?php if ( has_custom_logo() && ! $show_title ) : ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
	<?php endif; ?>

	<?php if ( $description && true === get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
		<p class="site-description">
			<?php echo $description; ?>
		</p>
	<?php endif; ?>

	<?php echo get_theme_mod( 'wltesttheme_company-name' ); ?>
</div>
