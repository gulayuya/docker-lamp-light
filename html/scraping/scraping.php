<!-- マップカメラの新製品情報のページから、各商品の画像URLとタイトルを取得する -->

<?php 

// require
require_once("phpQuery-onefile.php");

// ページ取得
// curlセッションを初期化
$curl_handle=curl_init();
// curlのオプションを設定
 // URLを指定
    curl_setopt($curl_handle, CURLOPT_URL,'https://www.mapcamera.com/html/newproduct/newproduct.html');
 // "Location: " ヘッダの内容をたどらないように指定
    // curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, false);
 // コネクトタイムアウトまでの秒数を指定
    curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
 // 取得するデータを保持
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
 // ユーザーエージェントを指定 <-ここを指定していなかったので302リダイレクトされた可能性あり
    curl_setopt($curl_handle, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36');  
// curlを実行
$html = curl_exec($curl_handle);
// curlセッションを終了
curl_close($curl_handle);

// 全文ブラウザに表示
// echo htmlspecialchars($html);
// echo ($html);

// DOM取得
$doc = phpQuery::newDocument($html);
// echo pq("html")->text(). '<br>';

foreach($doc[".itembox__list"] as $row)
    {
        $key   = pq($row)->find("img")->attr("src");
        $value   = pq($row)->find("h3")->text();
        echo $key . "<br>";
        echo $value . "<br>";
    }
?>