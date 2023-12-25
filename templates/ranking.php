<?php
    // includeする前に$game_number, $game_titleを定義する必要があります。
    // また、function.phpをincludeしておく必要があります。
    $array_ranking = return_ranking($game_number);
    $siteURL = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . '/game_collect';
?>
<head>
    <link rel="stylesheet" href="<?php echo $siteURL; ?>/templates/css/ranking.css?231224">
</head>

<div class="ranking_wrapper">
    <div class="ranking_container">
        <h2>ランキング</h2>
        <p><?php echo $game_title; ?></p>
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
                foreach($array_ranking as $index => $record){
                    $display_index = $index + 1;
                    echo "<tr><td>$display_index</td><td>{$record['name']}</td><td>{$record['score']}</td></tr>";
                }
            ?>

        </table>

        <button class="back">戻る</button>
    </div>
</div>