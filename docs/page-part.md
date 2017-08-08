# サイト部品の構成

Wordpress では共通の要素の部分を別のphpファイルにすることによって、どのカテゴリーや固定ページでも一括管理できます。

```
index.php
header.php
footer.php
functions.php
front-page.php
```

## index.php
```php
<?php ?>
```

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
  	<header>
  		
  	</header>
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

// プレビュー画面で管理バーを隠す
add_filter( 'show_admin_bar', '__return_false' );

// サムネイル
add_theme_support( 'post-thumbnails' );
```

## front-page.php
```
<?php get_header(); ?>
<main>

</main>
<?php get_footer(); ?>

```
