> 前の手順： [初期ファイル構成](/docs/create-starer-files.md)

# サイト部品の構成

Wordpressで作成されたサイトは`header`、`main`、`footer`のように共通要素を持っています。

![](/docs/page-part-01.png)

これらをWordpressファイルで作成します。

```
header.php　// 画面のheaderのところです。
footer.php　// 画面のfooterのところです。
functions.php　// Wordpressの設定などをここに記入します。
front-page.php　// 画面のmainのところです。通常トップページです。

...

```

各ファイルの中身です。

## header.php
```php
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title>
      <?php bloginfo('name'); ?> <?php wp_title('|'); ?>
    </title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header></header>
```

## footer.php
```php
    <footer>
      <small>footer</small>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>

```

## functions.php
```php
<?php

// プレビュー画面で管理バーを隠すことにする場合
add_filter( 'show_admin_bar', '__return_false' );

// 投稿記事のサムネイルを表示したい場合
add_theme_support( 'post-thumbnails' );
```

## front-page.php
```php
<?php get_header(); ?>
    <main>
      <h1>トップページです。</h1>
    </main>
<?php get_footer(); ?>

```

これらを下記の場所に保存します。

```bash
wp-content
├── themes
│   └── theme名
│       ├── index.php
│       ├── style.php
│       ├── header.php // ここ
│       ├── footer.php // ここ
│       ├── functions.php // ここ
│       └── front-page.php // ここ
```

これでサイトの全ページに共通要素が表示されます。
次はサイト内の静的ページを作ることについて説明します。


>　次の手順： [各種静的ページを作る](/docs/static-pages.md)
