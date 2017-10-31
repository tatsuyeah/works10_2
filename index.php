<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>スコア大会ランキング推移</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fieldset_style.css">
    <style>div{padding: 10px;font-size:16px;}</style>
</head>

<body>
<!-- header[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><p class="navbar-brand">スコア大会ランキング推移｜DB登録</p></div>
    </div>
  </nav>
</header>
<!-- header[End] -->


<!-- Main[Start] -->
<form method="post" action="insert.php">
    <div class="container jumbotron">
    <fieldset id="fs">
        <legend>スコアを登録</legend>
            <ol>
            <li>
                <label>スコア大会</label>
                <p>第<input type="number" name="number">回</p>
            </li>
            <li>
                <label>モード</label>
                <select name="mode">
                    <option>easy</option>
                    <option>normal</option>
                    <option>hard</option>
                    <option>death</option>
                </select>
            </li>
            <li>
                <label>ランキング</label>
                <input type="number" name="ranking">
            </li>
            <li>
                <label>スコア</label>
                <input type="number" name="score">
            </li>
            <li>
                <label>参考動画URL</label>
                <input type="url" name="url" size="50" value="http://">
            </li>
            </ol>
        <input type="submit" value="送信">
    </fieldset>
    <input type="button" value="登録済みデータ一覧を表示" onClick="location.href='rnk_list_view.php'">
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
