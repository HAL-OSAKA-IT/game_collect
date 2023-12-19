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
    <h1>ログイン</h1>
    <div id="form">
        <div id="input_wrapper" class="form_contents">
            <h2>会員の方</h2>
            <p>ユーザー名とパスワードでログイン</p>
            <form action="post">
                <div id="input_area">
                    <input type="text" placeholder="ユーザー名" name="name" autocomplete="off">
                    <input type="password" placeholder="パスワード" name="password">
                    <button type="submit">ログイン</button>
                </div>
            </form>
        </div>

        <div id="transition_wrapper" class="form_contents">
            <h2>新規会員登録</h2>
            <a href="./registration.php">新規会員登録</a>
        </div>
    </div>
</body>