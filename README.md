## ArticleOrganizer 外注記事管理アプリ
メンバーに外注記事の担当を割り振って管理したり、記事の作成・編集・投稿したりできるアプリです。
https://pf.asakotsu.com/

## 使用言語など
<ul>
 	<li><strong>フロントエンド</strong>
<ul>
 	<li>HTML / SCC / Bootstrap</li>
 	<li>jQuery</li>
</ul>
</li>
 	<li><strong>バックエンド</strong>
<ul>
 	<li>PHP 8.0.1</li>
 	<li>Laravel 8.31.0</li>
 	<li>FakerPHP 1.9.1</li>
 	<li>PHPUnit 9.3.3</li>
</ul>
</li>
 	<li>インフラ
<ul>
 	<li>AWS(EC2, S3, RDS, Route53, CloudWatch, VPC）</li>
 	<li>MySQL 8.0.23</li>
</ul>
</li>
 	<li>その他
<ul>
 	<li>Visual Studio Code</li>
 	<li>TablePlus</li>
</ul>
</li>
</ul>

## 制作背景
Webライティングの業務委託をしていて、構成作成〜ライティングまでの各工程の納期や担当者の管理をスプレッドシートで行っている企業が多いことに気づきました。

スプレッドシートで案件を管理していると

<ul>
    <li>データ量が多くスプレッドシートが重い</li>
    <li>複数の編集権限者で共有しているので編集ミスが起こりやすい</li>
</ul>

こういった問題が起こりがちで、ミスや作業効率の低下原因にもなりえるため
納期やメンバーを一括で管理し、記事やアウトラインの作成もできるWebアプリを作ろうと考えました。

## 主な機能
<ul>
 	<li><strong>ログイン機能</strong>
<ul>
 	<li>ゲストログイン機能</li>
 	<li>ログイン機能</li>
</ul>
</li>
 	<li><strong>メンバー管理機能</strong>
<ul>
 	<li>メンバーの新規登録</li>
 	<li>メンバーの一覧・詳細表示機能</li>
 	<li>メンバーの削除機能（担当案件を持っているメンバーは削除できないよう制限をかけています）</li>
</ul>
</li>
 	<li><strong>記事管理機能</strong>
<ul>
 	<li>新しい記事の担当割り振り機能</li>
 	<li>アウトラインの作成・編集（アウトライン担当権限アカウントのみ）</li>
 	<li>記事の作成・編集（記事担当権限アカウントのみ）</li>
 	<li>アイキャッチ画像の設定機能 （AWS S3バケット）</li>
 	<li>記事・アウトラインの申請〜承認・戻し機能</li>
 	<li>記事の公開・非公開切り替え機能</li>
 	<li>プレビュー機能</li>
 	<li>検索・絞り込み機能</li>
 	<li>削除機能</li>
</ul>
</li>
 	<li><strong>ページネーション機能</strong>
<ul>
 	<li>記事一覧・メンバー一覧に表示</li>
</ul>
</li>
 	<li><strong>PHPUnitテスト</strong></li>
 	<li><strong>レスポンシブデザイン</strong></li>
</ul>
