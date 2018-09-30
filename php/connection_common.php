connection_common.php
<?php
require_once 'DbManager.php';
$pdo = getDb();

foreach ( $pdo->query ( 'select * from ondokei' ) as $row2 ) {
    echo '<p>';
    echo $row2 ['id'], ':';
    echo $row2 ['ondo'], ':';
    echo $row2 ['shitudo'];
    echo '</p>';
}

?>