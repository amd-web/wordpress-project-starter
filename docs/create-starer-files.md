# 初期ファイル構成

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

```bash
wp-content
├── themes
│   └── theme名
│       ├── index.php
│       ├── style.css
│       ├── ...
│       └── page-{パーマリンク名}.php // ここ
```

> 次： [サイト部品の構成](/docs/page-part.md)
