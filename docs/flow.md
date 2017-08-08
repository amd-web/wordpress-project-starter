0. 準備
`https://github.com/scotch-io/scotch-box`

# サイト部品の構成
 - header, footer, index, front-page を作成
  (各phpの説明)

# 各種静的ページを作る
	- 1. wordpress 管理画面 > 固定ページ > 新規追加
	- 1-2 ページの名前をタイトルだけ入力 > 公開
	- 1-3 パーマリンク 編集（英語） > 変更
	- 2. 編集したパーマリンク名をpage-{パーマリンク名}

# 各種投稿記事の一覧を作る
	- 1. functions - custom post / custom category 作成
	- 2. リスト表示：archive-custom-field, has > thumbnail, title, linkが表示
    > 【?】カテゴリー別リストは？
	- 3. ページナビゲーション

# 投稿記事の内容を作る
	- 1. acf install  
    `プラグイン > 新規追加 > キーワードに「Advanced Custom Fields」を検索 > 今すぐインストール > 有効化`
	- 2. setting
    `カスタムフィールド > 新規追加`
    `フィールド名入力 > +フィールドを追加`
    `フィールド項目追加 > 公開`
