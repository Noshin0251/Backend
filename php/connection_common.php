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

/*

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

*/
?>