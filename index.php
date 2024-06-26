<?php
session_start();
include './templates/function.php';
$game_array = array(
    '1' => array(
        'name' => 'バイクジャンプ',
        'explanation' => '流れてくる壁や敵を避けて！',
        'thumbnail' => './image/game1/thumbnail.png'
    ),
    '2' => array(
        'name' => 'タイピングゲーム',
        'explanation' => '画面に表示される英語をどこまで打てるか！',
        'thumbnail' => './image/game2/thumbnail.png'
    ),
    '3' => array(
        'name' => '15パズル',
        'explanation' => '15パズルです。',
        'thumbnail' => './image/game3/thumbnail.jpg'
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
                    <!-- ゲーム画面に遷移する用 -->
                    <a href="./game/?gameID=<?php echo $game_number; ?>" class="link"></a>
                    <p class="game-image"><img src="<?php echo $array['thumbnail']; ?>" alt="ゲーム名"></p>
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
    <?php if(!empty($_SESSION['member_id'])): ?>
        <script type='text/javascript'>
            alert('ログインが完了しました！早速ゲームを遊んでみましょう！');
        </script>
    <?php endif ?>
</body>

</html>