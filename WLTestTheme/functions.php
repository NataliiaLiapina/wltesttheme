<?php
function wltesttheme_scripts() {
    wp_enqueue_style( 'wltesttheme-custom', get_template_directory_uri() . '/assets/css/style.css');

    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'wltesttheme_scripts' );

// support
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );

add_theme_support('menus');
function wltesttheme_register_menus() {
    $args = array( 
        'menu-1' => __( 'Main Menu' )
    );
    register_nav_menus( $args );
}
add_action( 'init', 'wltesttheme_register_menus' );

// Custom Post type
function post_type_car() {
    $supports = array(
    'title',
    'editor', 
    'author', 
    'thumbnail', 
    'excerpt', 
    'custom-fields', 
    'comments', 
    'revisions', 
    'post-formats', 
    );
    $labels = array(
    'name' => _x('car', 'plural'),
    'singular_name' => _x('car', 'singular'),
    'menu_name' => _x('car', 'admin menu'),
    'name_admin_bar' => _x('car', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New car'),
    'new_item' => __('New car'),
    'edit_item' => __('Edit car'),
    'view_item' => __('View car'),
    'all_items' => __('All cars'),
    'search_items' => __('Search car'),
    'not_found' => __('No cars found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'car'),
    'has_archive' => true,
    'hierarchical' => false,
    'taxonomies' => array( 'post_tag', 'category' ),
    );
    register_post_type('car', $args);
    }
    add_action('init', 'post_type_car');

  
// Custom taxonomy
function register_taxonomy_brand() {
    $labels = array(
        'name'              => _x( 'Brand', 'brand' ),
        'singular_name'     => _x( 'Brand', 'brand' ),
        'search_items'      => __( 'Search brand' ),
        'all_items'         => __( 'All Brands' ),
        'parent_item'       => __( 'Parent Brand' ),
        'parent_item_colon' => __( 'Parent Brand:' ),
        'edit_item'         => __( 'Edit Brand' ),
        'update_item'       => __( 'Update Brand' ),
        'add_new_item'      => __( 'Add New Brand' ),
        'new_item_name'     => __( 'New Brand Name' ),
        'menu_name'         => __( 'Brand' ),
    );
    $args   = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'brand' ],
    );
    register_taxonomy( 'brand', [ 'car' ], $args );
}
add_action( 'init', 'register_taxonomy_brand' );

function register_taxonomy_country() {
    $labels2 = array(
        'name'              => _x( 'Country', 'country' ),
        'singular_name'     => _x( 'Country', 'country' ),
        'search_items'      => __( 'Search country' ),
        'all_items'         => __( 'All Countries' ),
        'parent_item'       => __( 'Parent Country' ),
        'parent_item_colon' => __( 'Parent Country:' ),
        'edit_item'         => __( 'Edit Country' ),
        'update_item'       => __( 'Update Country' ),
        'add_new_item'      => __( 'Add New Country' ),
        'new_item_name'     => __( 'New Country Name' ),
        'menu_name'         => __( 'Country' ),
    );
    $args2   = array(
        'hierarchical'      => true, 
        'labels'            => $labels2,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'country' ],
    );
    register_taxonomy( 'Country', [ 'car' ], $args2 );
}
add_action( 'init', 'register_taxonomy_country' );

// Custom fields
add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );
} 

add_action('add_meta_boxes', 'wltesttheme_extra_fields', 1);

function wltesttheme_extra_fields() {
	add_meta_box( 'extra_fields', 'Custom Fields', 'extra_fields_box_func', 'car ', 'normal', 'high'  );
}

function extra_fields_box_func( $post ){
	?>
    <p><?php esc_html_e( 'Color:', 'wltesttheme' ); ?></p>
    <input type="text" name="extra[color]" value="<?php echo get_post_meta($post->ID, 'color', 1); ?>" class="color-field" />
    <script>
        jQuery(document).ready(function($){
    $('.color-field').wpColorPicker();
});
        </script>

<p><?php esc_html_e( 'Fuel Type:', 'wltesttheme' ); ?></p>
    <select name="extra[select]">
			<?php $sel_v = get_post_meta($post->ID, 'select', 1); ?>
			<option value="0"><?php esc_html_e( 'Select fuel:', 'wltesttheme' ); ?></option>
			<option value="Petrol" <?php selected( $sel_v, 'Petrol' )?> ><?php esc_html_e( 'Petrol', 'wltesttheme' ); ?></option>
			<option value="Diesel fuel" <?php selected( $sel_v, 'Diesel fuel' )?> ><?php esc_html_e( 'Diesel fuel', 'wltesttheme' ); ?></option>
			<option value="Gas" <?php selected( $sel_v, 'Gas' )?> ><?php esc_html_e( 'Gas', 'wltesttheme' ); ?></option>
            <option value="Electricity" <?php selected( $sel_v, 'Electricity' )?> ><?php esc_html_e( 'Electricity', 'wltesttheme' ); ?></option>
            <option value="Propane" <?php selected( $sel_v, 'Propane' )?> ><?php esc_html_e( 'Propane', 'wltesttheme' ); ?></option>
		</select>

	<p><?php esc_html_e( 'Power, hp:', 'wltesttheme' ); ?></p>
        <label><input type="number" name="extra[power]" value="<?php echo get_post_meta($post->ID, 'power', 1); ?>" style="width:50%" /></label>

        <p><?php esc_html_e( 'Price, $:', 'wltesttheme' ); ?></p>
        <label><input type="number" name="extra[price]" value="<?php echo get_post_meta($post->ID, 'price', 1); ?>" style="width:50%" /></label>

	

	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	<?php
}

add_action( 'save_post', 'wltesttheme_extra_fields_update', 0 );

function wltesttheme_extra_fields_update( $post_id ){
	if (
		   empty( $_POST['extra'] )
		|| ! wp_verify_nonce( $_POST['extra_fields_nonce'], __FILE__ )
		|| wp_is_post_autosave( $post_id )
		|| wp_is_post_revision( $post_id )
	)
		return false;

	$_POST['extra'] = array_map( 'sanitize_text_field', $_POST['extra'] );
	foreach( $_POST['extra'] as $key => $value ){
		if( empty($value) ){
			delete_post_meta( $post_id, $key ); 
			continue;
		}

		update_post_meta( $post_id, $key, $value );
	}

	return $post_id;
}


// Add field to customizer
function wltesttheme_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'wltesttheme_company_section' , array(
        'title'      => __( 'Additional Company Info', 'wltesttheme' )
    ));

    $wp_customize->add_setting( 'wltesttheme_company-name', array());
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'wltesttheme_company_control',
            array(
                'label'      => __( 'Company Phone Number', 'wltesttheme' ),
                'section'    => 'wltesttheme_company_section',
                'settings'   => 'wltesttheme_company-name'
            )
        )
    );
}
add_action( 'customize_register', 'wltesttheme_customize_register' );


// create shortcode
add_shortcode( 'list-posts-basic', 'rmcc_post_listing_shortcode1' );
function rmcc_post_listing_shortcode1( $atts ) {
    ob_start();
    $query = new WP_Query( array(
        'post_type' => 'car',
        'posts_per_page' => 10,
        'order' => 'ASC',
        'orderby' => 'title',
    ) );
    if ( $query->have_posts() ) { ?>
        <ul class="cars-listing">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>;
            </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}
