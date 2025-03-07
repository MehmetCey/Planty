<?php
/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package HelloElementor
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
	if ( hello_elementor_display_header_footer() ) {
		if ( did_action( 'elementor/loaded' ) && hello_header_footer_experiment_active() ) {
			get_template_part( 'template-parts/dynamic-footer' );
		} else {
			get_template_part( 'template-parts/footer' );
		}
	}
}
?>

<?php wp_footer(); ?>
<div class=footerboite>
	<p class=footermention>Mentions légales</p>
</div>
</body>
</html>
<?php
if ( has_nav_menu( 'footer-menu' ) ) {
    wp_nav_menu( array(
        'theme_location' => 'footer-menu',
        'container'      => 'nav',
        'container_class' => 'footer-menu',
        'menu_class'     => 'footer-menu-list',
    ));
}
?>
