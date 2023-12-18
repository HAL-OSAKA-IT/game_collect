<?php 
// include '../templates/function.php';   // 関数を記述したファイルの読み込み
// $dbh = db_connect();                // データベース接続
// 返り値がある場合(SELECT)
// $sql = "
//         SELECT *
//         FROM games;
//     ";
// $stmt = $dbh -> prepare($sql);
// $stmt -> execute();
// $array = $stmt -> fetchAll();
// print_r($array);
// echo '<br>';

// 返り値の無い変更の場合(INSERTとか)
// $id = 'NULL';
// $name = 'namae';
// $sql = "
//     INSERT INTO members(name,password)
//     VALUE($name, '$password')
// ";
// $stmt = $dbh -> prepare($sql);
// $stmt -> execute();


// echo 'hello world';
// $variable = 12;
// // 文字列連結はピリオド
// $str = 'aaaaaa' . 'aaaaaa';

// $yasai = ['にんじん', 'しりしり'];
// // 配列などの文字列以外の値はechoするとエラーが出る
// print_r($yasai);

?>


<!-- <h1>変数は<?php echo $variable; ?></h1> -->

<!-- phpタグとecho文を兼ね備えたタグ -->
<!-- <p>
<?= 'php echo aaaaaaaaaaaaaaaaaaaaaa';?>
</p> -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>
    <!-- <h1>会員登録</h1> -->
    <div id="form">
        <div id="transition_wrapper" class="form_contents">
            <h2>新規会員登録</h2>
            <p>ニックネームとパスワードで会員登録</p>
            <form action="" method="POST">
                <div id="input_area">
                    <input type="text" placeholder="ニックネーム" name="name">
                    <input type="password" placeholder="パスワード" name="password">
                    <button type="submit">新規会員登録</button>
                </div>
            </form>
            <?php echo $_POST['name']; ?>
        </div>
    </div>
</body>
</html>