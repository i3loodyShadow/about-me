<?php

add_action('init', 'about_me_init_posttypes');

function about_me_init_posttypes() {

    /* Register Page Settings */

    $page_settings_args = array(
        'labels' => array(
            'name' => 'Ustawienia witryny',
            'singular_name' => 'Ustawienia witryny',
            'all_items' => 'Wszysktie posty',
            'add_new' => 'Dodaj nowy post',
            'add_new_item' => 'Dodaj nowy post',
            'edit_item' => 'Edytuj post',
            'new_item' => 'Dodaj nowy post',
            'view_item' => 'Zobacz posty',
            'search_items' => 'Szukaj postu',
            'not_found' => 'Nie znaleziono postu',
            'not_found_in_trash' => 'Brak usuniętych postów',
            'parent_item_colon' => ''
        ),
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 1,
        'supports' => array(
            'title',
            'editor',
            'custom-fields',
            'revisions'
        ),
        'has-archive' => false
    );

    register_post_type('page-settings', $page_settings_args);
}
add_action('init', 'about_me_init_taxonomies');

/* Rejestuje taxonomie */

function about_me_init_taxonomies() {

    // Produkty
    // register_taxonomy(
    //     'products_type',
    //     array('produkty'),
    //     array(
    //         'hierarchical' => true,
    //         'labels' => array(
    //             'name' => 'Kategorie',
    //             'singular_name' => 'Kategoria',
    //             'search_items' =>  'Wyszukaj kategorię',
    //             'popular_items' => 'Najpopularniejsze kategorie',
    //             'all_items' => 'Wszystkie kategorie',
    //             'most_used_items' => null,
    //             'parent_item' => null,
    //             'parent_item_colon' => null,
    //             'edit_item' => 'Edytuj kategorię',
    //             'update_item' => 'Aktualizuj kategorię',
    //             'add_new_item' => 'Dodaj nową kategorię',
    //             'new_item_name' => 'Nazwa kategorii',
    //             'separate_items_with_commas' => 'Oddziel kategorie przecinkiem',
    //             'add_or_remove_items' => 'Dodaj lub usuń kategorie',
    //             'choose_from_most_used' => 'Wybierz spośród najczęścież używanych kategorii',
    //             'menu_name' => 'Kategoria',
    //         ),
    //         'show_ui' => true,
    //         'update_count_callback' => '_update_post_term_count',
    //         'query_var' => true,
    //         'rewrite' => array('slug' => 'products_type')
    //     )
    // );
}
