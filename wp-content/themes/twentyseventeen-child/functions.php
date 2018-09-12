<?php

/**
 * Set child theme
 */
function child_theme_enqueue_styles() {
    $parent_style = 'twentyseventeen-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get( 'Version' )
    );
}

add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );

function add_footer_contacts() {
    wp_register_style(
        'footer-contacts',
        get_stylesheet_directory_uri() . '/assets/css/footer-contacts.css'
    );
    wp_register_script(
        'footer-contacts-script',
        get_stylesheet_directory_uri() . '/assets/js/footer-contacts.js'
    );
    wp_enqueue_style('footer-contacts');
    wp_enqueue_script(
        'footer-contacts-script',
        get_stylesheet_directory_uri().'/widgets/js/contacts.js',
        ['jquery'],
        '',
        true
    );
}

add_action('wp_enqueue_scripts', 'add_footer_contacts');

/**
 * Woocommerce Settings
 */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 5);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 30);

/**
 * Adding Custom Post Types
 */
add_action('init', 'register_books_post_types');
function register_books_post_types() {
    register_post_type('books', [
            'labels' => [
                'name'          => esc_html__('Book', 'twentyseventeen'),
                'menu_name'     => esc_html__('Books', 'twentyseventeen'),
                'singular_name' => esc_html__('Book', 'twentyseventeen'),
                'add_new'       => esc_html__('Add New', 'twentyseventeen'),
                'add_new_item'  => esc_html__('Add New', 'twentyseventeen'),
                'edit_item'     => esc_html__('Edit Book', 'twentyseventeen'),
                'new_item'      => esc_html__('New Book', 'twentyseventeen'),
                'view_item'     => 'All Books',
            ],
            'description'        => __('This is Books', 'twentyseventeen'),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'taxonomies'         => ['genre'],
            'menu_icon'          => 'dashicons-carrot',
            'has_archive'        => true,
            'supports'           => [
                'title',
                'excerpt',
                'thumbnail',
                'title',
                'editor',
                'author',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'revisions',
                'page-attributes',
                'post-formats',
                'comments'
            ]
        ]
    );
}
add_action('init', 'create_taxonomy_genre');

function create_taxonomy_genre() {
// Labels
    $labels = array(
        'name'              => esc_html__( 'Genre', 'twentyseventeen' ),
        'singular_name'     => esc_html__( 'Genre', 'twentyseventeen' ),
        'search_items'      => esc_html__( 'Search Genre', 'twentyseventeen' ),
        'all_items'         => esc_html__( 'All Genres', 'twentyseventeen' ),
        'edit_item'         => esc_html__( 'Edit Genre', 'twentyseventeen' ),
        'update_item'       => esc_html__( 'Update Genre', 'twentyseventeen' ),
        'add_new_item'      => esc_html__( 'Add New Genre', 'twentyseventeen' ),
        'new_item_name'     => esc_html__( 'New Genre\'s name', 'twentyseventeen' ),
        'menu_name'         => esc_html__( 'Genres', 'twentyseventeen' ),
        'parent_item'       => null,
        'parent_item_colon' => null,
    );
// parameters
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'show_tagcloud'         => false,
        'hierarchical'          => true,
        'update_count_callback' => '',
        'capabilities'          => array(),
        'show_admin_column'     => false,
        '_builtin'              => false,
        'query_var'             => true,
        'rewrite'               => true,
        'has_archive' => true,

    );
    register_taxonomy('genre', ['books'], $args);
}

require('inc/child-theme-customizer.php');