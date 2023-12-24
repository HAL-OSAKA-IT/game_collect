<?php
    $siteURL = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . '/game_collect';
    // echo $siteURL;
    include './function.php';   // 関数を記述したファイルの読み込み

    $array_ranking = return_ranking(1);
    echo '<PRE>';
    print_r($array_ranking);
    echo '</PRE>';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $siteURL; ?>css/destyle.css">
    <link rel="stylesheet" href="<?php echo $siteURL; ?>/templates/css/ranking.css">
</head>
<body>
<div id="game1_ranking_container" class="ranking_wrapper">
    <div id="ranking_container">
        <h2>ランキング</h2>
        <p>game1</p>
        <table class="table">
            <tr>
                <th class="rank">
                    ranking
                </th>
                <th class="name">
                    name
                </th>
                <th class="score">
                    score
                </th>
            </tr>

            <?php
                foreach($array_game as $index => $record){
                    $display_index = $index + 1;
                    echo "<tr><td>$display_index</td><td>{$record['name']}</td><td>{$record['score']}</td></tr>";
                }
            ?>

        </table>

        <button class="back">戻る</button>
    </div>
</div>
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="../js/ranking.js"></script>
</body>
</html>