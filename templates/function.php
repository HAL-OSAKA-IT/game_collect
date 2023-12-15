<?php
// データベースの接続関数
function db_connect(){
    try{
        // データソースネーム
        $dsn = 'mysql:dbname=game_collect;host=localhost;charset=utf8mb4';    
        $user = 'root';
        $password = '';
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