<?php
function register_my_menus() {
    register_nav_menus(array(
        'menu-1' => __( 'Menu Principal' ),
    ));
}
add_action( 'init', 'register_my_menus' );
function ajouter_lien_admin_menu_principal( $items, $args ) {
    // Vérifier si c'est le menu principal
    if ( $args->theme_location == 'menu-1' ) {
        // Vérifier si l'utilisateur est connecté
        if ( is_user_logged_in() ) {
            // Générer le lien vers le tableau de bord
            $admin_link = '<li class="menu-item admin-link"><a href="' . admin_url() . '">Admin</a></li>';
            
            // Diviser les éléments du menu en tableau
            $items_array = explode('</li>', $items);

            // Insérer le lien "Admin" avant le dernier élément
            $last_index = count($items_array) - 2; // Dernier élément du tableau
            array_splice($items_array, $last_index, 0, $admin_link); // Insertion avant le dernier élément

            // Rejoindre les éléments du menu pour reformer la chaîne HTML
            $items = implode('</li>', $items_array);
        }
    }
    
    return $items;
}
add_filter( 'wp_nav_menu_items', 'ajouter_lien_admin_menu_principal', 10, 2 );

add_filter( 'wp_nav_menu_items', 'ajouter_menu_admin_si_connecte', 10, 2 );
function ajouter_menu_admin_si_connecte( $items, $args ) {
    if ( is_user_logged_in() ) {
        if ( $args->theme_location == 'header-menu' ) {
            $items .= '<a href="/admin" class="menuadmin"><p class="menup">Admin</p></a>';
        }
    }
    return $items;
}