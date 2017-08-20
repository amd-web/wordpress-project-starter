> 前の手順： [各種静的ページを作る](/docs/static-pages.md)

# 各種投稿記事の一覧・詳細の作成

Wordpressで基本的提供している投稿記事の種類は一つしかないため、
コーポレートサイトの様々なビジネス要求をクリアするのには制限があります。
案件によってはお知れせの一覧・詳細ページ、実績の一覧・詳細ページなど複数の投稿が欲しいという要望が発生したりしますが、
サイト企画者はこの段階でクライアントが要求するビジネスを把握し、事前にウェブ設計者との相談で仕様を決定、実装まで問題がないようにすることが大事です。

## 各種投稿記事の一覧

まず、カスタム一覧ページから作成して行きます。

### functions.php

カスタム投稿一覧を作成する為、`functions.php`ファイルに下記のようにコードを書きます。

```php

register_post_type( 'custom-field', // ここにカスタム投稿一覧の名前を書きます。（英語）
  array(
    'labels' => array (
    'name' => __( 'かスタム記事' ),
    'all_items' => 'かスタム記事一覧',
    'add_new' => 'かスタム記事を登録',
    'add_new_item' => 'かスタム記事を登録します',
    'edit' => 'かスタム記事を編集',
    'edit_item' => 'かスタム記事を編集します',
    'search_items' => 'かスタム記事を検索',
    'not_found' => 'お探しのかスタム記事が存在しません',
    'not_found_in_trash' => 'お探しのかスタム記事が存在しません',
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

続いては`functions.php`で作成した**かスタム記事**を Wordpress ページに出力するために下記のようなファイルを作成します。

```
archive-{ 先ほど functions.php に記入したカスタム投稿一覧の名前（英語）を入力 }.php 
```

中身はこのように書きます。

```php
<?php get_header(); ?>
    <article class="">
      <h1>custom field</h1>
      <?php
      while ( have_posts() ) : the_post(); ?>
      <li>
      <?php 
      if ( has_post_thumbnail() ) {
        the_post_thumbnail( 
          array( 'class' => 'custom-thumbnail' )
        ); 
      } ?>
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>	
      </li>
      <?php endwhile; ?>

      <div id="pagination" class="clearfix">
        <?php posts_nav_link( ' ', '前', '次' ); ?>
      </div>
    </article>
<?php get_footer(); ?>

```

作成したファイルを FTP 下記の場所にアップします。

```bash
wp-content
├── themes
│   └── theme名
│       ├── index.php
│       ├── style.css
│       ├── ...
│       └── archive-{ カスタム投稿一覧の名前（英語） }.php // ここ
```

一覧ページの完成です。アクセスする為にURLで下記のように入力してページにアクセスします。

```
http://サイト名/カスタム投稿一覧の名前（英語）
```

## 各種投稿記事の詳細

### ACF(Advanced Custom Fields)の設定

Wordpress の基本投稿の入力種類が少ない為、様々なプラグインが存在しますが、
その中で今回は ACF を使用して投稿入力をカスタマイズします。

まずはプラグイン検索からインストールします。

![](/docs/acf-install-01.png)
`Advanced Custom Fields`または`ACF`で検索します。

![](/docs/acf-install-02.png)
ACFがインストールされました。

![](/docs/acf-install-03.png)
管理メニューにも`カスタムフィールド`が表示されます。

新しいフィルドを作成しましょう。

![](/docs/acf-install-05.png)
フィルードを作成する為、まずフィルードを追加ボタンをタップします。

![](/docs/acf-install-06.png)
作成するフィルードタイプを決めます。ここでフィルード名は英語で入力します。（後で出力部分に使います。）

![](/docs/acf-install-04.png)
ルールには先ほど作成したカスタム投稿一覧の名前（英語）を選択します。
こうすることでカスタム投稿入力画面に表示されます。

![](/docs/acf-install-07.png)

### 記事ページのテンプレート作成

作成したカスタム記事を出力する為には`single`ファイルの作成が必要です。

### single ファイルの作成

続いては`functions.php`で作成した**かスタム記事**を Wordpress ページに出力するために下記のようなファイルを作成します。

```
single-{ 先ほど functions.php に記入したカスタム投稿一覧の名前（英語）を入力 }.php 
```

中身はこのように書きます。

```php
<?php get_header(); ?>
  <article class="">
  <?php
    while ( have_posts() ) : the_post(); ?>
    <h1>
      <?php the_title(); ?>
    </h1>

    <time>
      <?php the_date(); the_time(); ?>
    </time>
    <!-- カスタム-->
    <p>
      <?php the_field('text_field'); ?>
    </p>
  <?php endwhile; ?>
  </article>
<?php get_footer(); ?>

```

作成したファイルを FTP 下記の場所にアップします。

```bash
wp-content
├── themes
│   └── theme名
│       ├── index.php
│       ├── style.css
│       ├── ...
│       ├── archive-{ カスタム投稿一覧の名前（英語） }.php
│       └── single-{ カスタム投稿一覧の名前（英語） }.php // ここ
```

![](/docs/acf-install-08.png)

これで記事詳細ページも完成です。

以上、Wordpress 作成の基本編でした。
