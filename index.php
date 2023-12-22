<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- リセットCSSの適用 -->
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css?=231220">
</head>

<?php include ( dirname(__FILE__) . '/templates/header.php' ); ?>
<body>
    <main>
        <section id="game-list">
            <h2>ゲーム一覧</h2>
            <div class="game">
                <p class="game-image"><img src="./image/gameImage.png" alt="ゲーム名"></p>
                <div class="detail">
                    <h3>ゲームタイトル</h3>
                    <p class="desc">ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文</p>
                    <div class="bottom-info">
                        <p class="info">何かの情報</p>
                        <p class="ranking"><a href="#">ランキングを見る</a></p>
                    </div><!-- bottom-info -->
                </div><!-- detail -->
            </div><!-- game -->
            
            <div class="game">
                <p class="game-image"><img src="./image/gameImage.png" alt="ゲーム名"></p>
                <div class="detail">
                    <h3>ゲームタイトル</h3>
                    <p class="desc">ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文ゲーム紹介文</p>
                    <div class="bottom-info">
                        <p class="info">何かの情報</p>
                        <p class="ranking"><a href="#">ランキングを見る</a></p>
                    </div><!-- bottom-info -->
                </div><!-- detail -->
            </div><!-- game -->
        </section><!-- game-list -->
    </main>
</body>

</html>