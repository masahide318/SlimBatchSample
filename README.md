## Slim3をバッチ専用システムとして使うサンプル

Webからもコマンドラインからも実行できるようにしてます  
MySQLにつなぐ処理が入っているのでcloneしたらsetting.phpのDBの接続先を適宜変更してください

## 起動方法

1. git clone https://github.com/masahide318/SlimBatchSample.git
2. cd SlimBatchSample
3. php composer.phar install
4. vi setting.php (edit DB info)
5. php public/index.php sample_command

