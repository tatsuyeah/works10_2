<?php
//登録のテンプレとして...

//session_start();

include("functions.php");

//0.認証チェック
//ssidChk();

//1.入力した値をとる
$number  = $_POST["number"];
$mode    = $_POST["mode"];
$ranking = $_POST["ranking"];
$score   = $_POST["score"];
$url     = $_POST["url"];

//2.DB接続
$pdo = db_con();


//3.SQLを作って実行
//3-1.データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO game_ranking_table(id, number, mode, ranking, score, url, indate)VALUES(NULL, :number, :mode, :ranking, :score, :url, sysdate())");
$stmt->bindValue(':number', $number, PDO::PARAM_INT); 
$stmt->bindValue(':mode', $mode, PDO::PARAM_STR);
$stmt->bindValue(':ranking', $ranking, PDO::PARAM_INT);
$stmt->bindValue(':score', $score, PDO::PARAM_INT);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
//3-2.実行
$status = $stmt->execute();

//4.実行
if($status==false){
  $error = $stmt->errorInfo();//エラーがあれば
  exit("QueryError:".$error[2]);//処理を止めてエラー表示
  
}else{
  header("Location: rnk_list_view.php");//エラーがなければページ移動
  exit;//ページが飛んだら処理を止める

}
?>
