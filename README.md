# アプリケーション名

### 飲食店予約アプリ

### サービス名

Rese
![TOP画像](./src/images/top-image.png)

## 作成目的

外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい

## 概要説明

トップページに登録された店舗一覧が表示され各店舗の「詳しく見る」ボタンを押すと詳細画像と予約画面が表示される<br>
　ユーザー登録すると店舗毎に「お気に入り登録」と「店舗予約」することができ、登録詳細はハンバーガーアイコン内のマイページ項目から閲覧可能<br>
店舗編集権限者は新たな店舗の追加・権限が付与された店舗の削除ができる<br>
管理者は上記＋店舗編集権限者の設定及びユーザーへのメール一斉送信が出来る。

管理者ログイン時はメールアドレス：aaaa 　パスワード：aaaaaaaa

# 機能一覧

    　ログイン機能
    　ユーザー登録機能
    　エリア・ジャンル・ワードによる店舗検索機能
    　ユーザーお気に入り登録機能
    　店舗予約機能
    　バリデーション機能（認証と予約はFormRequest使用）
    　レスポンシブデザイン
    　マイページより予約変更機能（「✖️」で予約削除、変更で予約変更フォームより変更）
    　評価機能（マイページより予約日を過ぎた予約に評価機能追加）
    　管理画面（ロール認証）
    　管理者機能
    　　管理者画面メインページ下部の「管理者ページへ」ボタンで店舗代表者登録及び店舗編集権限付与
    　　追加で店舗権限の関連付け機能
    　　下部お知らせリンクでお知らせ内容作成後送信でユーザー全員にお知らせ一斉送信
    　店舗代表者機能
    　　店舗代表者画面メインページ下部の「店舗代表者ページへ」ボタンで店舗情報の新規登録及び管理者
    　に権限付与されている店舗が表示され、各店舗の「編集する」ボタンで編集画面表示され編集可能。
    　　編集後「更新」ボタンで更新完了する。

# テーブル設計

https://docs.google.com/spreadsheets/d/1t10kDiHte8iT4K38IrfgD2TRnGLOOVzZAmaw8B5qePE/edit#gid=1270192593
　　内、テーブル仕様書シート参照

# ER 図

https://docs.google.com/spreadsheets/d/1t10kDiHte8iT4K38IrfgD2TRnGLOOVzZAmaw8B5qePE/edit#gid=1270192593
　　内、ER 図シート参照

## 使用技術

- Laravel 8.83.27
- php 7.4.9
- mysql 8.0.26
- nginx 1.21.1

## 環境構築

以下の手順に従って環境構築をして下さい。

### 1.GIT リポジトリをクローンして下さい。

```
git@github.com:kazuyuki-okada5/20240315_Res-Web.git
```

### 2.Docker と Docker Composer をインストールして下さい。

インストール済みの場合は省略して下さい。

### 3.プロジェクトのルートディレクトリに移動して下さい。

```
cd 20240315_Res-Web
```

### 4.`.env.example`ファイルをコピーして`.env`ファイルを作成して下さい。

```
cd src
cp .env.example .env
```

### 5..env ファイルを開き、以下の環境変数を設定して下さい。

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

```
MAIL_FROM_ADDRESS=your-email@example.com
```

### 6.docker を起動しビルドして下さい。

```
docker-compose up -d --build
```

### 7.php コンテナに入り Composer をインストール後、暗号化キーを作成して下さい。

```
docker-compose exec php bash
composer install
php artisan key:generate
```

### 8.マイグレーション及びシーディングを実行して下さい。

```
php artisan migrate:refresh --seed
```

### 9.ローカルへのアクセス

1.〜８.までの作業が滞りなく終了したら下記リンク先からアプリケーションが開きます。<br>
[トップページ](http://localhost/) <br>
[MailHog](http://localhost:8025/)

### 10.ログインパスワード

ユーザー用 <br>
メールアドレス:a@ne.jp <br>
パスワード:11111111

管理者用 <br>
メールアドレス:aa@ne.jp <br>
パスワード:12345678

※管理者用のパスワードを使用するとアプリ内新規プロフィール作成以外全ての認証必須ページを閲覧することが出来ます。