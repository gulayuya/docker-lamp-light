<?php
// selectで全件取得してブラウザに表示させる処理 

// データベースに接続
require('db-connect.php');

// データベース処理
$stmt = $pdo->query("SELECT * FROM testtbl");
if (!$stmt) {
    $info = $pdo->errorInfo();
    exit($info[2]);
}
 //連想配列で値を取得
while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<p>'. $data['lv']. ':'.$data['hp']. ':'.$data['damage']. ':'.$data['dps']."</p>\n";
}

// 接続を切断
$pdo = null;

?>

<?php 
require('db-connect.php');
$stmt = $pdo->prepare("select * from ?");
$stmt->bindValue(1, "testtbl");
$stmt->execute();
while ($result = $stmt->fetch()) {
    echo '<p>'. $result['lv']. ':'.$result['hp']. ':'.$result['damage']. ':'.$result['dps']."</p>\n";
}

?>