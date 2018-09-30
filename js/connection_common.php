connection_common.php
<?php
require_once 'DbManager.php';
$pdo = getDb();
//DB内を表示
foreach ( $pdo->query ( 'select * from ondokei' ) as $row2 ) {
    echo '<p>';
    echo $row2 ['id'], ':';
    echo $row2 ['ondo'], ':';
    echo $row2 ['shitudo'];
    echo '</p>';
}

// INSERT文を変数に格納
$sql = "INSERT INTO ondokei (ondo,shitudo,level,comment) VALUES (:ondo, :shitudo, :level, :comment)";
// 挿入する値は空のまま、SQL実行の準備をする
$stmt = $pdo -> prepare($sql);
// 挿入する値を配列に格納する
$params = array(':ondo' => '15', ':shitudo' => '15', ':level' => '5', ':comment' => 'phpから挿入テスト');
// 挿入する値が入った変数をexecuteにセットしてSQLを実行
$stmt->execute($params);
// 登録完了のメッセージ
echo '登録完了しました';





//こいつを渡します
$param = $row2 ['ondo'];

//JSON形式に変換する関数を定義
function json_safe_encode($data){
    return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
}

//JQuery読み込み
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
//外部javascript呼び出し
//ここでid属性を記述して、スクリプトタグに変数を埋め込みます
<script id="script" type="text/javascript" src="test.php"
 data-param='<?php echo json_safe_encode($param);?>'>
</script>


?>