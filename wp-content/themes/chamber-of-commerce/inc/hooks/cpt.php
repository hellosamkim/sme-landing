<?php 

// Strategic Issues Taxonomy

$labels = array(
  'name' => _x( 'Strategic Issues', 'taxonomy general name' ),
  'singular_name' => _x( 'Strategic Issue', 'taxonomy singular name' ),
  'search_items' =>  __( 'Search Strategic Issue' ),
  'popular_items' => __( 'Popular Strategic Issue' ),
  'all_items' => __( 'All Strategic Issue' ),
  'parent_item' => null,
  'parent_item_colon' => null,
  'edit_item' => __( 'Edit Strategic Issue' ),
  'update_item' => __( 'Update Strategic Issue' ),
  'add_new_item' => __( 'Add New Strategic Issue' ),
  'new_item_name' => __( 'New Strategic Issue Name' ),
  'separate_items_with_commas' => __( 'Separate Strategic Issue with commas' ),
  'add_or_remove_items' => __( 'Add or remove Strategic Issue' ),
  'choose_from_most_used' => __( 'Choose from the most used Strategic Issue' ),
  'menu_name' => __( 'Strategic Issues' ),
);

// register_taxonomy('strategic-issues',array('post','publications'),array(
register_taxonomy('strategic-issues',array('post'),array(
  'hierarchical' => true,
  'labels' => $labels,
  'show_ui' => true,
  'show_in_rest' => true,
  'show_admin_column' => true,
  'update_count_callback' => '_update_post_term_count',
  'query_var' => true,
  'rewrite' => array( 'slug' => 'strategic-issues' ),
));

// register_taxonomy('strategic-issues',array('post','publications'),array(
  register_taxonomy('news-strategic-issues',array('news'),array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'news-strategic-issues' ),
  ));

  // register_taxonomy('strategic-issues',array('post','publications'),array(
    register_taxonomy('publication-strategic-issues',array('publications'),array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_in_rest' => true,
      'show_admin_column' => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var' => true,
      'rewrite' => array( 'slug' => 'publication-strategic-issues' ),
    ));

// Commitees Taxonomy

$labels = array(
  'name' => _x( 'Commitees', 'taxonomy general name' ),
  'singular_name' => _x( 'Commitee', 'taxonomy singular name' ),
  'search_items' =>  __( 'Search Commitee' ),
  'popular_items' => __( 'Popular Commitee' ),
  'all_items' => __( 'All Commitee' ),
  'parent_item' => null,
  'parent_item_colon' => null,
  'edit_item' => __( 'Edit Commitee' ),
  'update_item' => __( 'Update Commitee' ),
  'add_new_item' => __( 'Add New Commitee' ),
  'new_item_name' => __( 'New Commitee Name' ),
  'separate_items_with_commas' => __( 'Separate Commitee with commas' ),
  'add_or_remove_items' => __( 'Add or remove Commitee' ),
  'choose_from_most_used' => __( 'Choose from the most used Commitee' ),
  'menu_name' => __( 'Commitees' ),
);

// register_taxonomy('commitees',array('post','strategicissues','publications'),array(
register_taxonomy('commitees',array('post'),array(
  'hierarchical' => true,
  'labels' => $labels,
  'show_ui' => true,
  'show_in_rest' => true,
  'show_admin_column' => true,
  'update_count_callback' => '_update_post_term_count',
  'query_var' => true,
  'rewrite' => array( 'slug' => 'commitees' ),
));

// register_taxonomy('commitees',array('post','strategicissues','publications'),array(
register_taxonomy('news-commitees',array('news'),array(
  'hierarchical' => true,
  'labels' => $labels,
  'show_ui' => true,
  'show_in_rest' => true,
  'show_admin_column' => true,
  'update_count_callback' => '_update_post_term_count',
  'query_var' => true,
  'rewrite' => array( 'slug' => 'news-commitees' ),
));

// register_taxonomy('commitees',array('post','strategicissues','publications'),array(
  register_taxonomy('publication-commitees',array('publications'),array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'publication-commitees' ),
  ));

// News
$labels = array(
  'name'          => __( 'News', 'afi' ),
  'singular_name' => __( 'News', 'afi' ),
  'search_items'  => __( 'Search News', 'afi' ),
  'all_items'     => __( 'All News', 'afi' ),
  'menu_name'     => __( 'News', 'afi' )
);
$args = array(
  'labels'             => $labels,
  'public'             => true,
  'publicly_queryable' => true,
  'menu_icon'          => _( 'dashicons-admin-comments' ),
  'show_ui'            => true,
  'show_in_menu'       => true,
  'menu_position'      => 5,
  'query_var'          => true,
  'rewrite'            => array( 'slug' => 'news', 'with_front' => false ),
  'capability_type'    => 'post',
  'show_in_rest'       => true,
  'has_archive'        => false,
  'hierarchical'       => false,
  'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
);
register_post_type( 'News', $args );

// Marketing List
$labels = array(
  'name'          => __( 'Marketing List', 'afi' ),
  'singular_name' => __( 'Marketing List', 'afi' ),
  'search_items'  => __( 'Search Marketing List', 'afi' ),
  'all_items'     => __( 'All Marketing List', 'afi' ),
  'menu_name'     => __( 'Marketing List', 'afi' )
);
$args = array(
  'labels'             => $labels,
  'public'             => true,
  'publicly_queryable' => true,
  'menu_icon'          => _( 'dashicons-admin-comments' ),
  'show_ui'            => true,
  'show_in_menu'       => true,
  'menu_position'      => 5,
  'query_var'          => true,
  'rewrite'            => array( 'slug' => 'marketinglist', 'with_front' => false ),
  'capability_type'    => 'post',
  'show_in_rest'       => true,
  'has_archive'        => false,
  'hierarchical'       => false,
  'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
);
register_post_type( 'Marketing List', $args );

$labels = array(
  'name' => _x( 'News Type', 'taxonomy general name' ),
  'singular_name' => _x( 'Category', 'taxonomy singular name' ),
  'search_items' =>  __( 'Search News Type' ),
  'popular_items' => __( 'Popular News Type' ),
  'all_items' => __( 'All News Type' ),
  'parent_item' => null,
  'parent_item_colon' => null,
  'edit_item' => __( 'Edit News Type' ),
  'update_item' => __( 'Update News Type' ),
  'add_new_item' => __( 'Add New News Type' ),
  'new_item_name' => __( 'New News Type Name' ),
  'separate_items_with_commas' => __( 'Separate News Type with commas' ),
  'add_or_remove_items' => __( 'Add or remove News Type' ),
  'choose_from_most_used' => __( 'Choose from the most used News Type' ),
  'menu_name' => __( 'News Type' ),
);

// register_taxonomy('news_type',array('post','publications'),array(
register_taxonomy('news_type',array('news'),array(
  'hierarchical' => true,
  'labels' => $labels,
  'show_ui' => true,
  'show_in_rest' => true,
  'show_admin_column' => true,
  'update_count_callback' => '_update_post_term_count',
  'query_var' => true,
  'rewrite' => array( 'slug' => 'news-type' ),
));


// Resources
$labels = array(
  'name'          => __( 'Resources', 'afi' ),
  'singular_name' => __( 'Resources', 'afi' ),
  'search_items'  => __( 'Search Resources', 'afi' ),
  'all_items'     => __( 'All Resources', 'afi' ),
  'menu_name'     => __( 'Resources', 'afi' )
);
$args = array(
  'labels'             => $labels,
  'public'             => true,
  'publicly_queryable' => true,
  'menu_icon'          => _( 'dashicons-admin-comments' ),
  'show_ui'            => true,
  'show_in_menu'       => true,
  'menu_position'      => 6,
  'query_var'          => true,
  'rewrite'            => array( 'slug' => 'resources', 'with_front' => false ),
  'capability_type'    => 'post',
  'show_in_rest'       => true,
  'has_archive'        => false,
  'hierarchical'       => false,
  'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
);
register_post_type( 'Resources', $args );

// Issues
$labels = array(
  'name'          => __( 'Strategic Issues', 'afi' ),
  'singular_name' => __( 'Strategic Issues', 'afi' ),
  'search_items'  => __( 'Search Strategic Issues', 'afi' ),
  'all_items'     => __( 'All Strategic Issues', 'afi' ),
  'menu_name'     => __( 'Strategic Issues', 'afi' )
);
$args = array(
  'labels'             => $labels,
  'public'             => true,
  'publicly_queryable' => true,
  'menu_icon'          => _( 'dashicons-admin-comments' ),
  'show_ui'            => true,
  'show_in_menu'       => true,
  'menu_position'      => 7,
  'query_var'          => true,
  'rewrite'            => array( 'slug' => 'strategicissues', 'with_front' => false ),
  'capability_type'    => 'post',
  'show_in_rest'       => true,
  'has_archive'        => false,
  'hierarchical'       => false,
  'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
);
register_post_type( 'Strategic Issues', $args );

// Campaigns
$labels = array(
  'name'          => __( 'Campaigns', 'afi' ),
  'singular_name' => __( 'Campaigns', 'afi' ),
  'search_items'  => __( 'Search Campaigns', 'afi' ),
  'all_items'     => __( 'All Campaigns', 'afi' ),
  'menu_name'     => __( 'Campaigns', 'afi' )
);
$args = array(
  'labels'             => $labels,
  'public'             => true,
  'publicly_queryable' => true,
  'menu_icon'          => _( 'dashicons-admin-comments' ),
  'show_ui'            => true,
  'show_in_menu'       => true,
  'menu_position'      => 8,
  'query_var'          => true,
  'rewrite'            => array( 'slug' => 'campaigns', 'with_front' => false ),
  'capability_type'    => 'post',
  'show_in_rest'       => true,
  'has_archive'        => false,
  'hierarchical'       => false,
  'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
);
register_post_type( 'Campaigns', $args );

// Publications
$labels = array(
  'name'          => __( 'Publications', 'afi' ),
  'singular_name' => __( 'Publications', 'afi' ),
  'search_items'  => __( 'Search Publications', 'afi' ),
  'all_items'     => __( 'All Publications', 'afi' ),
  'menu_name'     => __( 'Publications', 'afi' )
);
$args = array(
  'labels'             => $labels,
  'public'             => true,
  'publicly_queryable' => true,
  'menu_icon'          => _( 'dashicons-admin-comments' ),
  'show_ui'            => true,
  'show_in_menu'       => true,
  'menu_position'      => 10,
  'query_var'          => true,
  'rewrite'            => array( 'slug' => 'publications', 'with_front' => false ),
  'capability_type'    => 'post',
  'show_in_rest'       => true,
  'has_archive'        => false,
  'hierarchical'       => false,
  'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
);
register_post_type( 'Publications', $args );


// Publications Taxonomy

$labels = array(
  'name' => _x( 'Publications', 'taxonomy general name' ),
  'singular_name' => _x( 'Publication', 'taxonomy singular name' ),
  'search_items' =>  __( 'Search Publication' ),
  'popular_items' => __( 'Popular Publication' ),
  'all_items' => __( 'All Publication' ),
  'parent_item' => null,
  'parent_item_colon' => null,
  'edit_item' => __( 'Edit Publication' ),
  'update_item' => __( 'Update Publication' ),
  'add_new_item' => __( 'Add New Publication' ),
  'new_item_name' => __( 'New Publication Name' ),
  'separate_items_with_commas' => __( 'Separate Publication with commas' ),
  'add_or_remove_items' => __( 'Add or remove Publication' ),
  'choose_from_most_used' => __( 'Choose from the most used Publication' ),
  'menu_name' => __( 'Publications' ),
);

// register_taxonomy('strategic-issues',array('post','publications'),array(
register_taxonomy('publication',array('publications'),array(
  'hierarchical' => true,
  'labels' => $labels,
  'show_ui' => true,
  'show_in_rest' => true,
  'show_admin_column' => true,
  'update_count_callback' => '_update_post_term_count',
  'query_var' => true,
  'rewrite' => array( 'slug' => 'publication' ),
));


// // Partners
// $labels = array(
//   'name'          => __( 'Partners', 'afi' ),
//   'singular_name' => __( 'Partners', 'afi' ),
//   'search_items'  => __( 'Search Partners', 'afi' ),
//   'all_items'     => __( 'All Partners', 'afi' ),
//   'menu_name'     => __( 'Partners', 'afi' )
// );
// $args = array(
//   'labels'             => $labels,
//   'public'             => true,
//   'publicly_queryable' => true,
//   'menu_icon'          => _( 'dashicons-admin-comments' ),
//   'show_ui'            => true,
//   'show_in_menu'       => true,
//   'menu_position'      => 11,
//   'query_var'          => true,
//   'rewrite'            => array( 'slug' => 'partners', 'with_front' => false ),
//   'capability_type'    => 'post',
//   'show_in_rest'       => true,
//   'has_archive'        => false,
//   'hierarchical'       => false,
//   'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
// );
// register_post_type( 'Partners', $args );

// Policy Committees
$labels = array(
  'name'          => __( 'Policy Committees & Councils', 'afi' ),
  'singular_name' => __( 'Policy Committees & Councils', 'afi' ),
  'search_items'  => __( 'Search Policy Committees & Councils', 'afi' ),
  'all_items'     => __( 'All Policy Committees & Councils', 'afi' ),
  'menu_name'     => __( 'Policy Committees & Councils', 'afi' )
);
$args = array(
  'labels'             => $labels,
  'public'             => true,
  'publicly_queryable' => true,
  'menu_icon'          => _( 'dashicons-admin-comments' ),
  'show_ui'            => true,
  'show_in_menu'       => true,
  'menu_position'      => 12,
  'query_var'          => true,
  'rewrite'            => array( 'slug' => 'policy-committees-councils', 'with_front' => false ),
  'capability_type'    => 'post',
  'show_in_rest'       => true,
  'has_archive'        => false,
  'hierarchical'       => false,
  'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
);
register_post_type( 'Policy Committees', $args );

// Events
$labels = array(
  'name'          => __( 'Events', 'afi' ),
  'singular_name' => __( 'Events', 'afi' ),
  'search_items'  => __( 'Search Events', 'afi' ),
  'all_items'     => __( 'All Events', 'afi' ),
  'menu_name'     => __( 'Events', 'afi' )
);
$args = array(
  'labels'             => $labels,
  'public'             => true,
  'publicly_queryable' => true,
  'menu_icon'          => _( 'dashicons-admin-comments' ),
  'show_ui'            => true,
  'show_in_menu'       => true,
  'menu_position'      => 13,
  'query_var'          => true,
  'rewrite'            => array( 'slug' => 'events', 'with_front' => false ),
  'capability_type'    => 'post',
  'show_in_rest'       => true,
  'has_archive'        => false,
  'hierarchical'       => false,
  'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
);
register_post_type( 'Events', $args );