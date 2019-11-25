<?php
try {
    $pdo = new PDO('mysql:host=mysql;dbname=test;charset=utf8mb4','root','pass',
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ));
} catch (PDOException $e) {
    exit($e->getMessage().PHP_EOL);
}

if (!$pdo) {
    echo '接続失敗<br>';
} else {
    echo '接続成功<br>';
}
?>