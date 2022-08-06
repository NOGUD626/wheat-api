# wheat-api
ウィート関係のAPI

# APiを動かすまでの下準備

## API動作に必要なもの(サーバにHosting)
- Dockerが動く環境(APIサーバ自身が稼働できるように)
- MySQLサーバ(ユーザデータと企業データはリレーショナルで管理を行なっているため)
- MongoDBサーバ(フォームなどのデータを格納するため)

## ローカル環境で動作させる場合
ローカル環境にDockerが入っているかつ `docker-compose` コマンドが使える状態であること。
以下コマンドを順番に実行することで使用可能になる。
```
make setup
make run
```

# 開発環境
Dockerから構成されているため基本的にDockerがインストールされていれば実行可能。

```
# Laravel プロジェクトの初期化 & DBマイグレーションとseed作成
$ make setup

# 起動
$ make run

# 停止
$ make down
```

#　Git開発運用ルール

開発にあたり以下のルールに沿って開発を行なっていく。

## コミット種別
- fix：バグ修正
- add：新規（ファイル）機能追加
- update：機能修正（バグではない）
- remove：削除（ファイル）

## 要約
変更内容の概要を書きます。シンプルかつ分かりやすく
【例】削除フラグが更新されない不具合の修正

## コミット単位
- 修正 & 追加　機能毎に行う(できれば)
- 1ファイル単位(must)

## PRについて
masterへのマージはReviewersからのレビューをもらってから必ずマージすること

### ブランチの名前づけ
develop/[バージョン番号など]
- 先のリリースに向けた普段の開発等

feature/[派生元バージョン番号など] or [機能名など]
- 機能追加・改修などを行う作業ブランチ
- developブランチから、featureブランチを切る
- 完了後はdevelopブランチにマージされて、featureブランチは削除される

### プルリクエストの運用ルール
- Reviewersに必ず自分以外の人間を含めること
- Assigneesには実装を行なったものを追加

## PRで書く項目

```
## 目的
(例) 〇〇APIの実装 
(例) の機能の追加

## やったこと
(例) の機能においてDBからのデータを受け取るrepository層の追加とService層の追加
(例) 新規に追加したテストの実装および修正を行なった。

## 確認項目

## 補足

```
