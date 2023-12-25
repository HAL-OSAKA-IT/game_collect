<?php
session_start();
echo '<PRE>';
print_r($_SESSION);
echo '</PRE>';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- リセットCSSの適用 -->
    <link rel="stylesheet" href="./css/destyle.css">
</head>
<body>
    <?php if(!empty($_SESSION['member_id'])): ?>
        <script type='text/javascript'>
            alert('ログインが完了しました！早速ゲームを遊んでみましょう！');
        </script>
    <?php endif ?>
</body>
</html>