<?php 
include '../templates/function.php';

/*      入力チェック、会員登録       */
// 入力済み初期化
$error = array();

// 英数字判定
function is_alnum($text) {
    if (preg_match("/^[a-zA-Z0-9]+$/",$text)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // ニックネームが入力されているか確認
    if (empty($_POST['name'])){
        $error['name'] = 'blank';
    }
    // パスワードが入力されているか確認
    if(empty($_POST['password'])){
        $error['password_blank'] = 'blank';
    }
    // ニックネームの桁数チェック
    if(mb_strlen($_POST['name']) > 15){
        $error['name'] = 'long';
    }
    // パスワードの英数字判定
    if(is_alnum($_POST['password'])!=TRUE){
        $error['password_type'] = 'wrong';
    }

    if(empty($error)){
        $dbh = db_connect();
        // 既に登録済みのニックネームでないかチェック
        $sql = "SELECT id FROM members WHERE name=:name";
        $stmt = $dbh -> prepare($sql);
        $stmt -> bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $stmt -> execute();
        $member = $stmt->fetch();
        if(!empty($member)){
            $error['name'] = 'registered';
        }
    }

    if (empty($error)){
        // ニックネームとパスワード入力済
        
        $dbh = db_connect();
        $name = $_POST['name'];
        $password = $_POST['password'];
        $pass_hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "
            INSERT INTO members(name,password)
            VALUE(:name, :password)
        ";
        $stmt = $dbh -> prepare($sql);
        $stmt -> bindValue(':name', $name, PDO::PARAM_STR);
        $stmt -> bindValue(':password', $pass_hash, PDO::PARAM_STR);
        $stmt -> execute();

        $sql = "SELECT id FROM members WHERE name=:name";
        $stmt = $dbh -> prepare($sql);
        $stmt -> bindValue(':name', $name, PDO::PARAM_STR);
        $stmt -> execute();
        $member_id = $stmt->fetch();

        session_start();
        $_SESSION['member_id'] = $member_id['id'];
        // データ挿入が完了したらindex.phpにリダイレクト
        // これによって、リロード対策ができる
        header("Location:../");
        exit;
    }else{
        // htmlspecialcharsを使うことでXSS攻撃を防止できる
        $inputname = htmlspecialchars($_POST['name']);
    }
}
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
    <h2>新規会員登録</h2>
    <div id="form" >
        <div id="transition_wrapper" class="form_contents">
            <p>ニックネームとパスワードで会員登録</p>

            <form action="" method="POST" autocomplete="off">
                <div id="input_area">
                    <input type="text" name="name" placeholder="ニックネーム" value="<?php if(!empty($inputname)){ echo $inputname; } ?>">
                    <!-- ニックネーム用エラーメッセージ -->
                        <?php if(!empty($error['name']) && $error['name'] == 'blank'): ?>
                            <p class='errmsg'>ニックネームを入力してください</p>
                        <?php elseif(!empty($error['name']) && $error['name'] == 'long'): ?>
                            <p class="errmsg">15文字以内で入力してください</p>
                        <?php elseif(!empty($error['name']) && $error['name'] == 'registered'): ?>
                            <p class="errmsg">既に使われているニックネームです</p>
                        <?php endif ?>
                    <!-- ここまで -->

                    <input type="password" name="password" placeholder="パスワード" name="password">

                    <!-- パスワード用エラーメッセージ -->
                        <?php if(!empty($error['password_blank']) && $error['password_blank'] == 'blank'): ?>
                            <p class="errmsg">パスワードを入力してください</p>
                        <?php elseif(!empty($error['password_len']) && $error['password_len'] == 'long'): ?>
                            <p class="errmsg">〇文字以内で入力してください</p>
                        <?php elseif(!empty($error['password_type']) && $error['password_type'] == 'wrong'): ?>
                            <p class="errmsg">英数字で入力してください</p>
                        <?php endif ?>
                    <!-- ここまで -->
                    <button type="submit">新規会員登録</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
