# 初期ファイル構成

> 以下、Wordpress が設置されている場所（FTPサーバー、またはローカルサーバー）の上、進行してください。

基本構築に使うファイルです。
各ファイルの説明は下記となります。

```
index.php
style.php
```

## index.php
`index.php`は Wordpress 側に認識させるため必要なファイルです。

```php
<?php ?>
```

## style.css
同じく `style.css`に `Theme Name` というプロパティを入れて Wordpress 側に認識させます。
```css
/* Theme Name: base_template */

body {

}

```

> [ここ](../base)にファイルセットを用意しときましたので、ご自由に使用してください。
