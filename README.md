# baserCMS用 ブラウザキャッシュ更新 プラグイン

baserCMS4系専用 
ファイル名や拡張子にクエリストリングを付与してブラウザキャッシュされたcssなどのファイルを更新します。

## 仕様

### クエリストリングの自動出力
ブラウザキャッシュを更新したいファイルのファイル名や、拡張子をカンマ区切りで入力し、保存ボタンを押すと、
公開側で、? + 「保存日時（YmdHis）」が拡張子の末尾に付与されます。

### 自動出力の停止
preg_replace()を複数回実行する処理を回避したい場合、自動出力を停止できます。  
（Config/setting.phpで変更できます）
また、更新したいファイルのファイル名や、拡張子の入力欄を空にして保存しても自動出力を停止することができます。

### ヘルパーメソッドを使った手動出力 
Helperのメソッドを使って任意の場所に出力することも可能です。
出力したい箇所にて $this->BrowserCacheUpdate->queryString()　でクエリストリングを自動出力できます。
※ キャッシュを更新したいファイルを入力していない場合は何も出力されませんが、引数に true を渡してやることで、強制的に出力することも可能です。


## 確認済バージョン

|baserCMS|Plugin|status|comment|
|:--|:--|:--|:--|
|4.6.2|1.0.0|未承認||
|4.6.1.1|1.0.0|未承認||
|4.6.0|1.0.0|未承認||
|4.5.6|1.0.0|未承認||
|4.4.2|1.0.0|未承認||
|4.3.4|1.0.0|未承認||
|4.2.0|1.0.0|未承認||
