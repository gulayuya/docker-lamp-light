<?php 
// データベースに接続
require('db-connect.php');

// ユーザから受け取ったデータを格納
$tablename = htmlspecialchars($_POST['table-name'], ENT_QUOTES, "utf-8");
$lv1 = htmlspecialchars($_POST['lv-1'], ENT_QUOTES, "utf-8");
$hp1 = htmlspecialchars($_POST['hp-1'], ENT_QUOTES, "utf-8");
$damage1 = htmlspecialchars($_POST['damage-1'], ENT_QUOTES, "utf-8");
$dps1 = htmlspecialchars($_POST['dps-1'], ENT_QUOTES, "utf-8");
$lv2 = htmlspecialchars($_POST['lv-2'], ENT_QUOTES, "utf-8");
$hp2 = htmlspecialchars($_POST['hp-2'], ENT_QUOTES, "utf-8");
$damage2 = htmlspecialchars($_POST['damage-2'], ENT_QUOTES, "utf-8");
$dps2 = htmlspecialchars($_POST['dps-2'], ENT_QUOTES, "utf-8");
$lv3 = htmlspecialchars($_POST['lv-3'], ENT_QUOTES, "utf-8");
$hp3 = htmlspecialchars($_POST['hp-3'], ENT_QUOTES, "utf-8");
$damage3 = htmlspecialchars($_POST['damage-3'], ENT_QUOTES, "utf-8");
$dps3 = htmlspecialchars($_POST['dps-3'], ENT_QUOTES, "utf-8");
$lv4 = htmlspecialchars($_POST['lv-4'], ENT_QUOTES, "utf-8");
$hp4 = htmlspecialchars($_POST['hp-4'], ENT_QUOTES, "utf-8");
$damage4 = htmlspecialchars($_POST['damage-4'], ENT_QUOTES, "utf-8");
$dps4 = htmlspecialchars($_POST['dps-4'], ENT_QUOTES, "utf-8");
$lv5 = htmlspecialchars($_POST['lv-5'], ENT_QUOTES, "utf-8");
$hp5 = htmlspecialchars($_POST['hp-5'], ENT_QUOTES, "utf-8");
$damage5 = htmlspecialchars($_POST['damage-5'], ENT_QUOTES, "utf-8");
$dps5 = htmlspecialchars($_POST['dps-5'], ENT_QUOTES, "utf-8");
$lv6 = htmlspecialchars($_POST['lv-6'], ENT_QUOTES, "utf-8");
$hp6 = htmlspecialchars($_POST['hp-6'], ENT_QUOTES, "utf-8");
$damage6 = htmlspecialchars($_POST['damage-6'], ENT_QUOTES, "utf-8");
$dps6 = htmlspecialchars($_POST['dps-6'], ENT_QUOTES, "utf-8");
$lv7 = htmlspecialchars($_POST['lv-7'], ENT_QUOTES, "utf-8");
$hp7 = htmlspecialchars($_POST['hp-7'], ENT_QUOTES, "utf-8");
$damage7 = htmlspecialchars($_POST['damage-7'], ENT_QUOTES, "utf-8");
$dps7 = htmlspecialchars($_POST['dps-7'], ENT_QUOTES, "utf-8");
$lv8 = htmlspecialchars($_POST['lv-8'], ENT_QUOTES, "utf-8");
$hp8 = htmlspecialchars($_POST['hp-8'], ENT_QUOTES, "utf-8");
$damage8 = htmlspecialchars($_POST['damage-8'], ENT_QUOTES, "utf-8");
$dps8 = htmlspecialchars($_POST['dps-8'], ENT_QUOTES, "utf-8");
$lv9 = htmlspecialchars($_POST['lv-9'], ENT_QUOTES, "utf-8");
$hp9 = htmlspecialchars($_POST['hp-9'], ENT_QUOTES, "utf-8");
$damage9 = htmlspecialchars($_POST['damage-9'], ENT_QUOTES, "utf-8");
$dps9 = htmlspecialchars($_POST['dps-9'], ENT_QUOTES, "utf-8");
$lv10 = htmlspecialchars($_POST['lv-10'], ENT_QUOTES, "utf-8");
$hp10 = htmlspecialchars($_POST['hp-10'], ENT_QUOTES, "utf-8");
$damage10 = htmlspecialchars($_POST['damage-10'], ENT_QUOTES, "utf-8");
$dps10 = htmlspecialchars($_POST['dps-10'], ENT_QUOTES, "utf-8");
$lv11 = htmlspecialchars($_POST['lv-11'], ENT_QUOTES, "utf-8");
$hp11 = htmlspecialchars($_POST['hp-11'], ENT_QUOTES, "utf-8");
$damage11 = htmlspecialchars($_POST['damage-11'], ENT_QUOTES, "utf-8");
$dps11 = htmlspecialchars($_POST['dps-11'], ENT_QUOTES, "utf-8");

// データベース処理(ユーザからのデータを受け取る場合の処理→prepare)
// テーブル作成
$stmt = $pdo->query("CREATE TABLE $tablename (lv smallint, hp int, damage int, dps int)");
if (!$stmt) {
    $info = $pdo->errorInfo();
    echo var_dump($info);
    exit($info[2]);
} else {
    echo $tablename.'でテーブルを作成しました'.'<br>';
}


// データを挿入
for ($i = 1; $i <= 11; $i++) {
    // ユーザから受け取ったデータを格納
    $lv = ${'lv'.$i}; // lvの値
    $hp = ${'hp'.$i}; // hpの値
    $damage = ${'damage'.$i}; // hpの値
    $dps = ${'dps'.$i}; // hpの値

    // SQL実行
    $stmt2 = $pdo->prepare("INSERT INTO $tablename (lv, hp, damage, dps) VALUES (?, ?, ?, ?)");
    $stmt2->bindValue(1, $lv, PDO::PARAM_INT);
    $stmt2->bindValue(2, $hp, PDO::PARAM_INT);
    $stmt2->bindValue(3, $damage, PDO::PARAM_INT);
    $stmt2->bindValue(4, $dps, PDO::PARAM_INT);
    $flag2 = $stmt2->execute();

    if (!$flag2) {
        $info = $pdo->errorInfo();
        echo var_dump($info);
        exit($info[2]);
    } else {
        echo $i.'つ目のデータを挿入しました'.'<br>';
    }
}

// 接続を切断
$pdo = null;
?>