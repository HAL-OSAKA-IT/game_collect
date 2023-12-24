<?php
    include './templates/function.php';
    $game_array = array(
        '1' => array(
            'name' => 'タイピングゲーム',
            'explanation' => '英語のタイピングゲームです。'
        ),
        '2' => array(
            'name' => 'testgame2',
            'explanation' => 'ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文'
        ),
        '3' => array(
            'name' => 'testgame3',
            'explanation' => 'ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文'
        )
    );

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>game collect | TOP</title>
    <!-- リセットCSSの適用 -->
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css?231224"> <!-- cssに変更を加えた時にクエリ文字を変更することでキャッシュが残らないようになります -->
</head>

<?php include './templates/header.php'; ?>
<body>
    <main>
        <!-- モーダルを開いたときのグレー背景 -->
        <div class="layer"></div>
        <section id="game-list">
            <h2>ゲーム一覧</h2>
            <?php foreach($game_array as $game_number => $array): ?>
                <div class="game">
                    <p class="game-image"><img src="./image/gameImage.png" alt="ゲーム名"></p>
                    <div class="detail">
                        <h3><?php echo $array['name']; ?></h3>
                        <p class="desc"><?php echo $array['explanation']; ?></p>
                        <div class="bottom-info">
                            <p class="ranking"><button class='button'>ランキングを見る</button></p>
                        </div><!-- bottom-info -->
                    </div><!-- detail -->
                    <?php
                        $game_title = $array['name'];
                        include './templates/ranking.php';
                    ?>
                </div><!-- game -->
            <?php endforeach ?>
        </section><!-- game-list -->
    </main>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>