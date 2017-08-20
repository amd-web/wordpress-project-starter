> Wordpress では「WordPressのインストール」=>「WordPress テーマ設定」という形でサイトを製作することが一般的ですが、
WordPressのインストールやテーマ設定ななどは先に優秀なコンテンツが沢山存在します。
「WordPress インストール」、「WordPress テーマ」と検索するだけで、詳細な記事がいくつも見つかると思いますので、そちらを参考にしてください。
なお、全手順の内容が反映されたファイルセットは[ここ](../base)に用意しております。こちらもご自由に使用してください。

# 初期ファイル構成e

テーマを有効化する為、必要な基本ファイルはこの2つです。

```
index.php
style.php
```

## index.php
`index.php`は Wordpress 側に認識させるため必要なファイルです。内容は何も書かなくても OK です。

```php
<?php ?>
```

## style.css
同じく `style.css`には `テーマ名（英語）` というプロパティを入れて Wordpress 側に認識させます。
今回は `base_template` で設定します。

```css
/* Theme Name: base_template */

body {

}

```

> 次： [サイト部品の構成](/docs/page-part.md)
