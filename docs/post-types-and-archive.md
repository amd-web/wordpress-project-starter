# 各種投稿記事の一覧を作る

案件によってはお知れせ一覧、ブログ一覧など複数人の記事リストが必要かもしれません。
Wordpress では基本１種類の記事リストのみ作成できる為、今回はカスタムで作ります。

## 各種投稿記事の一覧を作る

### functions.php
カスタム投稿一覧を作成する為、`functions.php`ファイルに下記のようにコードを書きます。

```php

register_post_type( 'custom-field', // ここにカスタム投稿一覧の名前を書きます。（英語）
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

### archive ファイルの作成

`functions.php`で作成した**かスタム記事**を Wordpress ページに出力するために下記のようなファイルを作成します。

```
archive-{ 先ほどfunctions.phpに作成した英語名を入力 }.php 
```

同じく FTPにアップします。


## 投稿記事の内容を作る

