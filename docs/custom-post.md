```php
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
```
