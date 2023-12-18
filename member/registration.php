<?php 
/**]
 *残りのやること
 * 
 *  1. form部分の背景色がわかりやすいようにボックス幅を作って、全体の背景から変更する
 *  2. formのaction属性はこのファイル(空またはregistration.php?)にし、method属性はpostにする。
 *  3. 上部PHPタグ内部に以下の処理を書く:スーパーグローバル変数$_POSTの中身を(isset関数で)確認して、存在する場合に登録後の処理を書く。
 *      3.0 余裕があればvalidation等も書く(空白、文字数、英数字のみ)また、それに応じたエラーメッセージを入力タグ近くに書く。
 *      3.1 データベースにインサートする処理を書く。
 *      3.2 登録後のページに遷移する処理を書く。または、登録完了ページを下部に作り、条件分岐で登録完了後に表示するようにする。(form部分は非表示にする)
 *
 * */ 
if (isset($name)){
    
}




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

?>



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
    <div id="form" >
        <div id="transition_wrapper" class="form_contents">
            <h2>新規会員登録</h2>
            <p>ニックネームとパスワードで会員登録</p>
            
            <form action="" method="" method="POST">
                <div id="input_area">
                    <input type="text" name="name" placeholder="ニックネーム" name="name">
                    <input type="password" name="password" placeholder="パスワード" name="password">
                    <button type="submit">新規会員登録</button>
                    
                </div>
            </form>
            <?php echo $_POST['name']; ?>
        </div>
    </div>
</body>
</html>