<?php

//session_start();

include("functions.php");

//0.認証チェック
//ssidChk();

//1.DB接続（登録するときと同様）
$pdo = db_con();


//3.SQLを作って実行>>表示の値をとる
$stmt = $pdo->prepare("SELECT * FROM game_ranking_table ORDER BY id DESC");
$status = $stmt->execute();

//4.実行>>一覧を表示
$view = "";
if($status==false){
  $error = $stmt->errorInfo();//エラーがあれば
  exit("QueryError:".$error[2]);//処理を止めてエラー表示
  
}else{
  //Selectデータの数だけ自動でループしてくれる
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<tr id="cell">';
        $view .=    '<td>';
        $view .=        $result["id"];
        $view .=    '</td>';
        $view .=    '<td>';
        $view .=        '<p>第'.$result["number"].'回</p>';
        $view .=    '</td>';
        $view .=    '<td>';
        $view .=        $result["mode"];
        $view .=    '</td>';
        $view .=    '<td>';
        $view .=        $result["ranking"];
        $view .=    '</td>';
        $view .=    '<td>';
        $view .=        $result["score"];
        $view .=    '</td>';
        $view .=    '<td><a target="_blank" href="'.$result["url"].'">'.$result["url"].'</a></td>';
        $view .=    '<td>';
        $view .=        $result["indate"];
        $view .=    '</td>';
        $view .= '</tr>';
    }
}

//グラフ書き出し用
//$plot = "";
//    if($status==false){
//            $error = $stmt->errorInfo();//エラーがあれば
//            exit("QueryError:".$error[2]);//処理を止めてエラー表示
//
//    }else{
//            //Selectデータの数だけ自動でループしてくれる
//            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
//                $plot = '["第'.$result["number"].'回",'.$result["ranking"].'],';
//            }
//    }
//  $g = implode(',', $plot);
//  echo $g;
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>スコア大会ランキング推移｜リスト・グラフ表示</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/table_style.css">
<style>div{padding: 10px;font-size:16px;}</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <p class="navbar-brand">スコア大会ランキング推移｜リスト・グラフ表示</p>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
        <input type="button" id="btn" name="btn" value="スコアを登録する画面へ" onClick="location.href='index.php'">
        <table id="tab">
            <tr id="head">
                <td class="id"></td>
                <td class="number"></td>
                <td class="mode">モード</td>
                <td class="ranking">ランキング</td>
                <td class="score">スコア</td>
                <td class="score">参考動画URL</td>
                <td class="indate">登録日時</td>
            </tr>
            <?= $view ?>
        </table>
        <input type="button" id="btn" name="btn" value="スコアを登録する画面へ" onClick="location.href='index.php'">
    </div>
</div>

<!--グラフ表示-->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['大会', 'ランキング'],
          <?php
            $stmt = $pdo->prepare('SELECT number, ranking FROM game_ranking_table');
            $data= array();
            //$stmt->execute($data);
            while($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[]=sprintf("['%s', '%s']", $rec['number'], $rec['ranking']);
            }
            print implode(',' . PHP_EOL, $data) . PHP_EOL;
            ?>
        ]);

        var options = {
          title: 'ランキング推移',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
<div id="curve_chart" style="width: 900px; height: 500px"></div>

<!-- Main[End] -->

</body>
</html>
