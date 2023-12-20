<?php
// game_collectがカレントディレクトリとなるpathを設定
$path = '../';
include $path.'templates/function.php';


/* ================================================================================
                        POSTを受け取った際の処理 ここから
================================================================================ */
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($name === '' || $password === '') {
        $error['blank'] = 'blank';
    } else { // ログイン処理
        $dbh = db_connect();
        $sql = 'SELECT * FROM members WHERE name=:name';
        // SQL文の準備と実行
        $stmt = $dbh -> prepare($sql);
        $stmt -> bindValue(':name', $name, PDO::PARAM_STR);
        $stmt -> execute();

        $result = $stmt -> fetch();

        if ($result && password_verify($password, $result['password'])){
            $_SESSION['member_id'] = $result['id'];
            $_SESSION['LAST_ACTIVITY'] = time();
            // index.phpにリダイレクト
            header('Location:' . $path);
            exit();
        } else {
            $error['login'] = 'wrong';
        }

    }
}
/* ================================================================================
                        POSTを受け取った際の処理 ここまで
================================================================================ */


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <!-- リセットCSS設定 -->
    <link rel="stylesheet" href="../css/destyle.css">
    <!-- 登録・ログイン共通CSS設定 -->
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>
    <h2>ログイン</h2>
    <div id="form">
        <div id="input_wrapper" class="form_contents">
            <h3>会員の方</h3>
            <p>ユーザー名とパスワードでログイン</p>
            <!-- ユーザー名かパスワードが未入力の場合 -->
            <?php if(!empty($error['blank']) && $error['blank'] === 'blank'): ?>
                <p class="error">※未入力項目があります。</p>
            <!-- ユーザー名、パスワードを間違えた場合 -->
            <?php elseif(!empty($error['login']) && $error['login'] === 'wrong'): ?>
                <p class="error">※ユーザー名かパスワードが違います。</p>
            <?php endif; ?>
            <form action="" method="post">
                <div id="input_area">
                    <input type="text" placeholder="ユーザー名" name="name" autocomplete="off">
                    <input type="password" placeholder="パスワード" name="password">
                    <button type="submit">ログイン</button>
                </div>
            </form>
        </div>

        <div id="transition_wrapper" class="form_contents">
            <h3>非会員の方</h3>
            <a href="./registration.php">新規会員登録</a>
        </div>
    </div>
</body>