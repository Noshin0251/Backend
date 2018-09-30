<?php

function getDb() {
    $dbname='KTYM2018';
    try {$pdo = new PDO('mysql:dbname=KTYM2018;host=localhost;charset=utf8mb4','root','lab261admin',
          [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]);
          print "接続完了:";
  
        } catch (PDOException $e) {
      exit('DbConnectError:'.$e->getMessage());
      print "エラー!: " . $e->getMessage() . "<br/>";
    }
    return $pdo;
  }



$stmt = $pdo->prepare("SELECT ondo from ondokei where id = 2"); //現在時刻のデータのみ取得
$stmt->execute();
$res = $stmt->fetchAll();


echo count ($res);



?>

