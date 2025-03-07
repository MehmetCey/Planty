<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package HelloElementor
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$viewport_content = apply_filters( 'hello_elementor_viewport_content', 'width=device-width, initial-scale=1' );
$enable_skip_link = apply_filters( 'hello_elementor_enable_skip_link', true );
$skip_link_url = apply_filters( 'hello_elementor_skip_link_url', '#content' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="<?php echo esc_attr( $viewport_content ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php if ( $enable_skip_link ) { ?>
<a class="skip-link screen-reader-text" href="<?php echo esc_url( $skip_link_url ); ?>"><?php echo esc_html__( 'Skip to content', 'hello-elementor' ); ?></a>
<?php } ?>

<?php
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
	if ( hello_elementor_display_header_footer() ) {
		if ( did_action( 'elementor/loaded' ) && hello_header_footer_experiment_active() ) {
			get_template_part( 'template-parts/dynamic-header' );
		} else {
			get_template_part( 'template-parts/header' );
		}
	}
}
?>

<div class="headerboite">
    <div class="menulogo">
        <a href="http://localhost/Planty/">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/PLANTY.jpg" alt="logo de Planty">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Vector.jpg" alt="une feuille">
        </a>
    </div>
    <div class="menuboites">
        <div class="menurencontrer">
            <a href="http://localhost/Planty/nous-rencontrer/"><p class="menup">Nous rencontrer</p></a>
        </div>
        <div class="menucommander">
            <a href="http://localhost/Planty/commander/"><p class="menucomp">Commander</p></a>
        </div>
    </div>
</div>

</body>
</html>
<?php /*
if ( has_nav_menu( 'header-menu' ) ) {
    wp_nav_menu( array(
        'theme_location' => 'header-menu',
        'container'      => 'nav',
        'container_class' => 'header-menu',
        'menu_class'     => 'header-menu-list',
    ));
} else {
    echo '<p>Veuillez attribuer un menu au menu Header dans Apparence > Menus.</p>';
}
?>
*/