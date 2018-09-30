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
$stmt = $pdo->prepare("SELECT ondo from ondokei where time > (CURRENT_TIMESTAMP + interval -5 SECOND)"); //現在時刻のデータのみ取得
$stmt->execute();
$res = $stmt->fetchAll();


echo count ($res);
}