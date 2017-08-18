# 各種投稿記事の一覧を作る
案件によってはお知れせ一覧、ブログ一覧など複数人の記事リストが必要かもしれません。
Wordpress では基本１種類の記事リストのみ作成できる為、今回はカスタムで作ります。

## 各種投稿記事の一覧を作る

カスタム一覧を作成する為、`functions.php`ファイルに下記のようにコードを書きます。
例えば **ニュース** という一覧を作成する場合、

```php

add_action('init', 'create_custom_posts');
function my_custom_init() 
{
  $labels = array(
    'name' => _x('ニュース', 'post type general name'),
    'singular_name' => _x('ニュース', 'post type singular name'),
    'add_new' => _x('新しくニュースを書く', 'dogs'),
    'add_new_item' => __('ニュースを書く'),
    'edit_item' => __('ニュースを編集'),
    'new_item' => __('新しいニュース'),
    'view_item' => __('ニュースを見る'),
    'search_items' => __('ニュースを探す'),
    'not_found' =>  __('ニュースはありません'),
    'not_found_in_trash' => __('ゴミ箱にニュースはありません'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail','custom-fields','excerpt','author','trackbacks','comments','revisions','page-attributes'),
    'has_archive' => true
  ); 
  register_post_type('news',$args); // Wordpress で認識する名前です。slug 名と同じ名前などで良いです。
}
```

## 投稿記事の内容を作る
