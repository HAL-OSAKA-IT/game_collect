<?php 
/**]
 *残りのやること
 * 
 *  ◯1. form部分の背景色がわかりやすいようにボックス幅を作って、全体の背景から変更する
 *  ◯2. formのaction属性はこのファイル(空またはregistration.php?)にし、method属性はpostにする。
 *  ◯3. 上部PHPタグ内部に以下の処理を書く:スーパーグローバル変数$_POSTの中身を(isset関数で)確認して、存在する場合に登録後の処理を書く。
 *      ◯3.0 余裕があればvalidation等も書く(空白、文字数、英数字のみ)また、それに応じたエラーメッセージを入力タグ近くに書く。
 *      ◯3.1 データベースにインサートする処理を書く。
 *      3.2 登録後のページに遷移する処理を書く。または、登録完了ページを下部に作り、条件分岐で登録完了後に表示するようにする。(form部分は非表示にする)
 *
 * */ 

/*      入力チェック       */
// 入力済み初期化
$inputname="";
$inputpass="";
$test="";
$test01="";
$test02="";
// 英数字判定
function is_alnum($text) {
    if (preg_match("/^[a-zA-Z0-9]+$/",$text)) {
        return TRUE;
    } else {
        return FALSE;
    }
}
if ((isset($_POST['name'])) && (isset($_POST['password']))){
    if (!(empty($_POST['name'])) && !(empty($_POST["password"]))){
        // ニックネームとパスワード入力済
        if ((mb_strlen($_POST['name'])<=15) && (strlen($_POST['password'])<=100) && ((is_alnum($_POST["password"]))==TRUE)){
            // 桁数◯、パスワードが英数字
            // sql実行
            $test="sql実行";
            include '../templates/function.php';
            $dbh = db_connect();
            $id = 'NULL';
            $name = $_POST['name'];
            $password = $_POST['password'];
            $sql = "
                INSERT INTO members(name,password)
                VALUE('$name', '$password')
            ";
            $stmt = $dbh -> prepare($sql);
            $stmt -> execute();
            // データ初期化
            $_POST["name"]="";
            $_POST["password"]="";
        }else{
            $inputname='value="'.$_POST["name"].'"';
            $inputpass='value="'.$_POST["password"].'"';
            if(!(mb_strlen($_POST['name'])<=15)){
                // ニックネーム桁数オーバー
                $test01="<a class='errmsg'>15文字以内で入力してください</a>";
            }
            if(!(strlen($_POST["password"])<=100)){
                // パスワード桁数オーバー
                $test02="<a class='errmsg'>100文字以内で入力してください</a><br>";
            }
            if((is_alnum($_POST["password"]))==FALSE){
                // パスワード全角入力
                $test02=$test02."<a class='errmsg'>英数字で入力してください</a>";
            }
        }
    }else if((empty($_POST['name'])) && (empty($_POST["password"]))){
        // ニックネーム、パスワード未入力
        $test01="<a class='errmsg'>ニックネームを入力してください</a>";
        $test02="<a class='errmsg'>パスワードを入力してください</a>";
    }else if(empty($_POST['name'])){
        // ニックネーム未入力
        $inputpass='value="'.$_POST["password"].'"';
        $test01="<a class='errmsg'>ニックネームを入力してください</a>";
        if(!(strlen($_POST["password"])<=100)){
            // パスワード桁数オーバー
            $test02="<a class='errmsg'>100文字以内で入力してください</a><br>";
        }
        if((is_alnum($_POST["password"]))==FALSE){
            // パスワード全角入力
            $test02=$test02."<a class='errmsg'>英数字で入力してください</a>";
        }
    }else if(empty($_POST['password'])){
        // パスワード未入力
        $inputname='value="'.$_POST["name"].'"';
        $test02="<a class='errmsg'>パスワードを入力してください</a>";
        if(!(mb_strlen($_POST['name'])<=15)){
            // ニックネーム桁数オーバー
            $test01="<a class='errmsg'>15文字以内で入力してください</a>";
        }
    };
};


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
    <div id="form" >
        <div id="transition_wrapper" class="form_contents">
            <h2>新規会員登録</h2>
            <p>ニックネームとパスワードで会員登録</p>
            
            <form action="?" method="POST">
                <div id="input_area">
                    <input type="text" name="name" placeholder="ニックネーム" name="name" <?php echo $inputname ?>>
                    <?php echo $test01 ?>
                    <input type="password" name="password" placeholder="パスワード" name="password" <?php echo $inputpass ?>>
                    <?php echo $test02 ?>
                    <button type="submit">新規会員登録</button>
                </div>
            </form>
        </div>
    </div>
    <?php echo $test ?>
</body>
</html>
