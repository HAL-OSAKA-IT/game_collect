<?php
session_start(); // セッションの開始 session-check.phpに記載すること

session_unset(); // セッション変数を全て削除
session_destroy(); // セッションを完全に破棄
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウト完了</title>
</head>
<body>
    <p>ログアウトが完了しました。</p>
    <a href="../">ホーム画面へ戻る</a>
</body>
</html>