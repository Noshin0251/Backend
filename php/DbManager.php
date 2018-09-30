<?php

function getDb() {
  $dbname='KTYM2018';
  try {$pdo = new PDO('mysql:dbname=KTYM2018;host=localhost;charset=utf8mb4',' root','lab261admin',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]);

        print('接続に成功しました。<br>');
        $pdo->query('SELECT * FROM ondokei');

      } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}

?>