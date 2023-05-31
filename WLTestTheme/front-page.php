<?php
/**
 * Template Name: Front Page Template
 */

 get_header();
 ?>
<div class="main-section">
<div class="content_inner">
    <div class="header_inner">
        <h1><?php esc_html_e( 'Related Posts', 'wltesttheme' ); ?></h1>
    </div>
    <?php echo do_shortcode('[list-posts-basic]'); ?>
</div>
</div>
<?php
 get_footer();