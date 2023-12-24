<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
// データベースの接続関数
function db_connect(){
    try{
        // データソースネーム
        $dsn = 'mysql:dbname='.$_ENV['DB_NAME'].';host='.$_ENV['DB_HOST'].';charset=utf8mb4';    
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        
        // データベースハンドル
        $dbh = new PDO($dsn, $user, $password, $options);
        $dbh -> query('SET NAMES utf8');

        return $dbh;
    } catch (PDOException $e){
        print "エラー：" . $e->getMessage() . "<br/>";
        die();
    }
}

function return_ranking($game_id){
    $dbh = db_connect();
    $sql = "
        SELECT *
        FROM scores s
            INNER JOIN members m
                ON s.member_id = m.id
        WHERE game_id = :game_id
        ORDER BY s.score DESC, m.name
    ";
    $stmt = $dbh -> prepare($sql);
    $stmt -> bindValue(':game_id', $game_id, PDO::PARAM_INT);
    $stmt -> execute();
    $array_ranking = $stmt -> fetchAll();

    return $array_ranking;
}