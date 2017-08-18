<?php
/**
 * base
 * @author
 * @version 1.0
 */

// custom post
///////////////////////////////////////////////////////////////
register_post_type( 'custom-field',
	array(
    'labels' => array (
			'name' => __( 'かスタム記事' ),
			'all_items' => 'かスタム記事一覧',
      "add_new" => "かスタム記事を登録",
 	 		"add_new_item" => "かスタム記事を登録します",
      "edit" => "かスタム記事を編集",
 	 		"edit_item" => "かスタム記事を編集します",
      "search_items" => "かスタム記事を検索",
      "not_found" => "お探しのかスタム記事が存在しません",
 	 		"not_found_in_trash" => "お探しのかスタム記事が存在しません",
			'singular_name' => __( 'かスタム記事' )
		),
		'public' => true,
		'has_archive' => true,
		'show_ui' => true,
		'exclude_from_search' => true,
		'has_archive' => true,
		'supports' => array (
      'title',
      'thumbnail',
      'revisions'
    ),
		'menu_position' => 5,
	)
);

function implement_custom_category () {
	$labels = array(
		'name' => _x( 'かスタム記事分類', '' ),
	);
	$args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true
  );
	register_taxonomy( 'custom-category', array( 'custom-field' ), $args );
}
add_action( 'init', 'implement_custom_category', 0 );

// custom post
///////////////////////////////////////////////////////////////
register_post_type( 'custom-field2',
	array(
    'labels' => array (
			'name' => __( 'かスタム記事2' ),
			'all_items' => 'かスタム記事2一覧',
      "add_new" => "かスタム記事2を登録",
 	 		"add_new_item" => "かスタム記事2を登録します",
      "edit" => "かスタム記事2を編集",
 	 		"edit_item" => "かスタム記事2を編集します",
      "search_items" => "かスタム記事2を検索",
      "not_found" => "お探しのかスタム記事2が存在しません",
 	 		"not_found_in_trash" => "お探しのかスタム記事2が存在しません",
			'singular_name' => __( 'かスタム記事2' )
		),
		'public' => true,
		'has_archive' => true,
		'show_ui' => true,
		'has_archive' => true,
		'supports' => array (
      'title',
      'thumbnail',
      'revisions'
    ),
		'menu_position' => 5,
	)
);

function implement_custom_category2 () {
	$labels = array(
		'name' => _x( 'かスタム記事2分類', '' ),
	);
	$args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true
  );
	register_taxonomy( 'custom-category2', array( 'custom-field2' ), $args );
}
add_action( 'init', 'implement_custom_category2', 0 );

// プレビュー画面で管理バーを隠す
add_filter( 'show_admin_bar', '__return_false' );

// Thumbnails
add_theme_support( 'post-thumbnails' );

// per page
add_action( 'pre_get_posts', function ( $q ) {
  if( !is_admin() && 
    	$q -> is_main_query() && 
    	$q -> is_post_type_archive( 'custom-field' ) ) { 
  	$q->set( 'posts_per_page', 2 ); 
	}
});
