<?php
    // includeする前に$game_number, $game_titleを定義する必要があります。
    // また、function.phpをincludeしておく必要があります。
    $array_ranking = return_ranking($game_number);
    $siteURL = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . '/game_collect';
?>
<head>
    <link rel="stylesheet" href="<?php echo $siteURL; ?>/templates/css/ranking.css?231224">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/destyle.css">
    <link rel="stylesheet" href="css/ranking.css">
</head>
<body>
<button class="button" id="button1">game1</button>
<button class="button" id="button2">game2</button>
<button class="button" id="button3">game3</button>
<button class="button" id="button4">game4</button>


<!-- game1_ranking -->
<div id="game1_ranking_container">
  <!-- 実現できなかったので実装していません -->
    <!-- <div class="fixed_bar">
        <ul>
            <li>game1</li>
            <li>game2</li>
            <li>game3</li>
            <li>game4</li>
        </ul>
    </div> -->

    <div id="ranking_container">
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
            foreach($array_game1 as $index => $record){
              $display_index = $index + 1;
              echo "<tr><td>$display_index</td><td>{$record['name']}</td><td>{$record['score']}</td></tr>";
            }
            ?>

        </table>

        <button class="back">戻る</button>
    </div>

</div>

<!-- game2_ranking -->
<div id="game2_ranking_container" class="screen">

    <div id="ranking_container">
        <h2>ランキング</h2>
        <p>game2</p>
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
            foreach($array_game2 as $index => $record){
              $display_index = $index + 1;
              echo "<tr><td>$display_index</td><td>{$record['name']}</td><td>{$record['score']}</td></tr>";
            }
            ?>

        </table>

        <button class="back">戻る</button>
    </div>

</div>

<!-- game3_ranking -->
<div id="game3_ranking_container" class="screen">

    <div id="ranking_container">
        <h2>ランキング</h2>
        <p>game3</p>
        <table class="table">
            <tr class="t_head">
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
            foreach($array_game3 as $index => $record){
              $display_index = $index + 1;
              echo "<tr><td>$display_index</td><td>{$record['name']}</td><td>{$record['score']}</td></tr>";
            }
            ?>

        </table>

        <button class="back">戻る</button>
    </div>

</div>

<!-- game4_ranking -->
<div id="game4_ranking_container" class="screen">

    <div id="ranking_container">
        <h2>ランキング</h2>
        <p>game4</p>
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
            foreach($array_game4 as $index => $record){
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