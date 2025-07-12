<?php

if (!defined('PAGE__THEME_DIR')) {
    define('PAGE_THEME_DIR', get_theme_root() . '/' . get_template() . '/');
}
if (!defined('PAGE_THEME_URL')) {
    define('PAGE_THEME_URL', WP_CONTENT_URL . '/themes/' . get_template() . '/');
}

require_once PAGE_THEME_DIR . 'libs/posttypes.php';
require_once PAGE_THEME_DIR . 'libs/utils.php';

// add_theme_support('post-thumbnails', array('artykuly', 'produkty'));

function register_my_menus() {
    register_nav_menus(
        array(
            'primary-menu' => 'Główne menu nawigacji',
        )
    );
}
add_action('init', 'register_my_menus');


/* Pagination fix */

add_action('init', function () {
    add_rewrite_rule('(.?.+?)/page/?([0-9]{1,})/?$', 'index.php?pagename=$matches[1]&paged=$matches[2]', 'top');
});

add_filter('wp_unique_post_slug', function ($slug, $post_ID, $post_status, $post_type) {
    if ('post' == $post_type) {
        $categories = get_categories();
        $categories = array_map(function ($c) {
            return $c->slug;
        }, $categories);

        if (in_array($slug, $categories)) {
            return $slug . '-' . $post_ID;
        }
    }
    return $slug;
}, 10, 4);

add_filter('xmlrpc_enabled', '__return_false');

add_filter('wp_sitemaps_enabled', '__return_false');

remove_action('wp_head', 'wp_generator');

function enable_svg_upload($upload_mimes) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter('upload_mimes', 'enable_svg_upload', 10, 1);

add_filter('acf/the_field/escape_html_optin', '__return_true');
