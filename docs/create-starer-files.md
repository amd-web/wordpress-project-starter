Wordpressでは「WordPressのインストール」=>「WordPress テーマ設定」という形でサイトを製作することが一般的です。

ただ WordPress のインストールやテーマ設定ななどは先に優秀なコンテンツが沢山存在しますので、
「WordPress インストール」、「WordPress テーマ」と検索するだけで詳細な記事がいくつも見つかると思います。そちらを参考にしてください。

> 全手順の内容が反映されたファイルセットは[ここ](../base)に用意しております。こちらはご自由に使用してください。

初期ファイル構成から始めましょう。

# 初期ファイル構成

新規テーマを作成、そのテーマを有効化する為に必要な基本ファイルはこの2つです。

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

これらを下記の場所に保存します。

```bash
wp-content
├── themes
│   └── theme名
│       ├── index.php // ここ
│       └── style.css // ここ
```

これでまずテーマを有効化することができます。
次はサイトの部品を構成します。

> 次の手順： [サイト部品の構成](/docs/page-part.md)
