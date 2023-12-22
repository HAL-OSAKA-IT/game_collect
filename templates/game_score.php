<?php
    include '../templates/function.php';   // 関数を記述したファイルの読み込み
    $dbh = db_connect();                // データベース接続
    
    // game1
    $sql_game1 = "
            SELECT *
            FROM scores s
            INNER JOIN members m
            ON s.user_id = m.id
            WHERE game_id = 1
            ORDER BY s.score DESC, m.name
        ";
    $stmt_game1 = $dbh -> prepare($sql_game1);
    $stmt_game1 -> execute();
    $array_game1 = $stmt_game1 -> fetchAll();

    

    // game2
    $sql_game2 = "
            SELECT *
            FROM scores s
            INNER JOIN members m
            ON s.user_id = m.id
            WHERE game_id = 2
            ORDER BY s.score DESC, m.name
        ";
    $stmt_game2 = $dbh -> prepare($sql_game2);
    $stmt_game2 -> execute();
    $array_game2 = $stmt_game2 -> fetchAll();

    // game3
    $sql_game3 = "
            SELECT *
            FROM scores s
            INNER JOIN members m
            ON s.user_id = m.id
            WHERE game_id = 3
            ORDER BY s.score DESC, m.name
        ";
    $stmt_game3 = $dbh -> prepare($sql_game3);
    $stmt_game3 -> execute();
    $array_game3 = $stmt_game3 -> fetchAll();

    // game4
    $sql_game4 = "
            SELECT *
            FROM scores s
            INNER JOIN members m
            ON s.user_id = m.id
            WHERE game_id = 4
            ORDER BY s.score DESC, m.name
        ";
    $stmt_game4 = $dbh -> prepare($sql_game4);
    $stmt_game4 -> execute();
    $array_game4 = $stmt_game4 -> fetchAll();

?>
