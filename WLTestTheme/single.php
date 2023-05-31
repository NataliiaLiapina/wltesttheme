<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>
<div class="main-section">
	<div class="content_inner">
		<div class="header_inner">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
		<div class="section-content">
			<div class="section-content_img">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="characteristics">
				<?php  
					$term_title = 'brand';
					?>
					<?php $term_list_brand = wp_get_post_terms( $post->ID, $term_title );
					
					if( $term_list_brand ) { ?>
						<h2><?php echo $term_title; ?>:</h2>
						<?php echo '<p>';
						foreach( $term_list_brand as $term ) {
							echo $term->name;
						}
						echo '</p>';
					}
	
					$term_title2 = 'Country';
					?>
					<?php $term_list_country = wp_get_post_terms( $post->ID, $term_title2 );
					
					if( $term_list_country ) { ?>
						<h2><?php echo $term_title2; ?>:</h2>
						<?php echo '<p>';
						foreach( $term_list_country as $term_country ) {
							echo $term_country->name;
						}
						echo '</p>';
					}
				?>

				<?php  
					$meta_color = get_post_meta($post->ID, 'color', 1);
					if($meta_color){
					$post_meta_color = 'color';
					?>
					<h2><?php echo $post_meta_color; ?>:</h2>
					<p style="background: <?php echo $meta_color; ?>" class="color"></p>
					<?php } ?>

					<?php 
					$meta_select = get_post_meta($post->ID, 'select', 1);
					if($meta_select){
					$post_meta_fuel = 'fuel type'; 
					?>
					<h2><?php echo $post_meta_fuel; ?>:</h2>
					<p><?php echo $meta_select; ?></p>
					<?php } ?>
					
					

					<?php  
					$meta_power = get_post_meta($post->ID, 'power', 1);
					if($meta_power){
					$post_meta_power = 'power';
					?>
					<h2><?php echo $post_meta_power; ?>, hp:</h2>
					<p><?php echo $meta_power; ?></p>
					<?php } ?>

					<?php 
					$meta_price = get_post_meta($post->ID, 'price', 1);
					if($meta_price){
					$post_meta_price = 'price';
					?>
					<h2><?php echo $post_meta_price; ?>, $:</h2>
					<p><?php echo $meta_price; ?></p>
					<?php } ?>
	
				</div>
			
		</div>
	</div>
</div>

	
	
</main>

<?php get_footer();
