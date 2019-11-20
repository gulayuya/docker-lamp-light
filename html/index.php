<?php


try {
    $pdo = new PDO('mysql:host=mysql;dbname=test;charset=utf8mb4','root','pass');
} catch (PDOException $e) {
    exit($e->getMessage().PHP_EOL);
}
echo('ok');

?>

<?php 

echo 'test message';
echo 'test message2';
echo 'Archer';
?>