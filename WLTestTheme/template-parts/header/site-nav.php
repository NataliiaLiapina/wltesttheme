<?php
/**
 * Displays the site navigation.
 */

?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<nav id="site-navigation" class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'wltesttheme' ); ?>">
		<div class="menu-button-container">
			<button id="primary-mobile-menu" class="button" aria-controls="primary-menu-list" aria-expanded="false">
				<span class="dropdown-icon open"><?php esc_html_e( 'Menu', 'wltesttheme' ); ?>
					<?php echo wltesttheme_get_icon_svg( 'ui', 'menu' ); ?>
				</span>
				<span class="dropdown-icon close"><?php esc_html_e( 'Close', 'wltesttheme' ); ?>
					<?php echo wltesttheme_get_icon_svg( 'ui', 'close' ); ?>
				</span>
			</button>
		</div>
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'menu_class'      => 'menu-wrapper',
				'container_class' => 'primary-menu-container',
				'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
				'fallback_cb'     => false,
			)
		);
		?>
	</nav>
	<?php
endif;
