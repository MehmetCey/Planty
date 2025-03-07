<?php
// Fonction pour ajouter le lien Admin avant le dernier élément du menu
function ajouter_lien_admin($items, $args) {
    // On vérifie qu'on est bien dans le menu voulu
    if ($args->theme_location == 'monheader' && is_user_logged_in() && current_user_can('manage_options')) {
        // Transformer les items du menu en tableau
        $items_array = explode('</li>', $items);

        // On retire le dernier élément (qui est vide à cause du explode)
        array_pop($items_array);

        // Création du lien Admin
        $lien_admin = '<li class="menu-item-484 admin-link"><a href="'. admin_url() .'">Admin</a></li>';

        // On insère le lien Admin avant le dernier élément du menu
        array_splice($items_array, -1, 0, $lien_admin);

        // On recompose le menu avec les modifications
        $items = implode('</li>', $items_array) . '</li>';
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'ajouter_lien_admin', 10, 2);
?>

<header id="site-header" class="le-header dynamic-header">
    <div class="header-inner">

        <div class="site-branding show-<?php echo esc_attr( hello_elementor_get_setting( 'hello_header_logo_type' ) ); ?>">
            <?php if ( has_custom_logo() && ( 'title' !== hello_elementor_get_setting( 'hello_header_logo_type' ) || $is_editor ) ) : ?>
                <div class="site-logo <?php echo esc_attr( hello_show_or_hide( 'hello_header_logo_display' ) ); ?>">
                    <?php the_custom_logo(); ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Menu Principal -->
        <?php
        // Arguments pour afficher le menu
        $menu_args = [
            'theme_location' => 'monheader', // Le menu que tu as enregistré dans functions.php
            'container' => true,  // On ne veut pas de conteneur autour du menu
            'menu_class' => 'menu-list', // Classe principale du menu
            'fallback_cb' => false // Si aucun menu n'est défini, ne rien afficher
        ];
        wp_nav_menu( $menu_args ); // Affichage du menu
        ?>
    </div>
</header>
