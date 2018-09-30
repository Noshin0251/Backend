

<?php

//DB接続関数（PDO）
function db_con(){
  $dbname='KTYM2018';
  try {$pdo = new PDO('mysql:dbname=KTYM2018;host=localhost;charset=utf8mb4','root','lab261admin',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]);
      } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}



$stmt = $pdo->prepare("SELECT ondo from ondokei where id > (5 + interval -5 SECOND)"); //現在時刻のデータのみ取得
$stmt->execute();
$res = $stmt->fetchAll();


echo count ($res);



?>
