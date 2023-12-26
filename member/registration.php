<?php 
session_start();
include '../templates/function.php';
session_check();

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

        $_SESSION['member_id'] = $member_id['id'];
        update_last_activity();
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
<?php include '../templates/header.php'; ?>
<body>
    <h2>新規会員登録</h2>
    <div id="form">
        <div id="input_wrapper" class="form_contents">
            <h3>会員登録</h3>
            <p>ニックネームとパスワードで会員登録</p>
            <!-- エラーメッセージ -->
                <!-- ニックネームが未入力の場合 -->
                <?php if(!empty($error['name']) && $error['name'] == 'blank'): ?>
                    <p class='errmsg'>※ニックネームを入力してください</p>
                <!-- 入力したニックネームが15字より多い場合 -->
                <?php elseif(!empty($error['name']) && $error['name'] == 'long'): ?>
                    <p class="errmsg">※ニックネームは15文字以内で入力してください</p>
                <!-- 入力したニックネームが既に使われている場合 -->
                <?php elseif(!empty($error['name']) && $error['name'] == 'registered'): ?>
                    <p class="errmsg">※既に使われているニックネームです</p>
                <?php endif ?>
                <!-- パスワードが未入力の場合 -->
                <?php if(!empty($error['password_blank']) && $error['password_blank'] == 'blank'): ?>
                    <p class="errmsg">※パスワードを入力してください</p>
                <!-- パスワードに想定外の文字がある場合 -->
                <?php elseif(!empty($error['password_type']) && $error['password_type'] == 'wrong'): ?>
                    <p class="errmsg">英数字で入力してください</p>
                <?php endif ?>
            <!-- ここまで -->

            <form action="" method="post">
                <div id="input_area">
                    <!-- ユーザー名の入力 -->
                    <input type="text" id="name" name="name" placeholder="ニックネーム" value="<?php if(!empty($inputname)){ echo $inputname; } ?>" autocomplete="off">
                    <!-- パスワードエリア -->
                    <div class="password_wrapper">
                        <!-- パスワードの入力 -->
                        <input type="password" id="password" placeholder="パスワード" name="password">
                        <!-- パスワード表示切り替えボタン（アイコン） -->
                        <i id="toggle_password"></i>
                    </div>
                    <!-- 会員登録ボタン -->
                    <button type="submit">新規会員登録</button>
                </div>
            </form>
        </div>
        <div id="transition_wrapper" class="form_contents">
            <h3>会員の方</h3>
            <a href="./login.php">ログイン</a>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
