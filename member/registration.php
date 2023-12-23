<?php 

/*      入力チェック、会員登録       */
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
            if (isset($sqlFlg)){
                // SQL実行（リロード時は実行されないようflgを使用）
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
            }
            // データ初期化
            $_POST["name"]="";
            $_POST["password"]="";
            $show=2;
            $sqlFlg=1;
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
}else{
    $show=1;
};
?>

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
    <!-- 未登録時 -->
    <?php if ($show==1) { ?>
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
    <?php } ?>

    <!-- 登録完了後 -->
    <?php if ($show==2) { ?>
        <div id="comp_wrapper">
            <h2>会員登録完了</h2>
            <div class="comp_msgbox">
                <p>game_collectのアカウント登録が完了しました</p>
                <p>早速ゲームを遊んでみましょう！</p>
            </div>
            <form action="/game_collect/" method="POST">
                <button type="submit">ホームへ</button>
            </form>
        </div>
    <?php } ?>
</body>
</html>
