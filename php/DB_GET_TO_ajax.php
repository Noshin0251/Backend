<?php
//Ajax以外からのアクセスを遮断
$request = isset($_SERVER['HTTP_X_REQUESTED_WITH'])
     ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
if($request !== 'xmlhttprequest') exit;
 
//DB接続
$db_server = "150.89.240.234";
$db_user = "root";
$db_pass = "lab261admin";
$db_name = "KTYM2018";
 
$DB_LINK = mysql_connect($db_server, $db_user, $db_pass);
$DB_SELECT = mysql_select_db($db_name, $DB_LINK);
 
//SELECT
$sql = "SELECT * FROM `ondokei`";
$result = mysql_query($sql);
if (!$result) {
    print $sql;
    die('クエリーが失敗しました。' . mysql_error());
}
$select_result = array();
while ($row = mysql_fetch_assoc($result)) {
    $select_result[] = $row;
}
unset($sql);
 
//結果をjson形式で返す
header('Content-Type: application/json');
echo json_encode($select_result);