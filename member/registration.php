<?php 
// やること
// 1. scssファイル作成パスを相対パスに変える(木下の家のwindowsに設定が残ってるはずなのでそれを反映する。)
//phpのパス通した場所が悪かった場合は,xampp内部のphpを環境変数に変えてcomposerももう一度アンスト+インストールし直す。

echo 'hello world';
$variable = 12;
// 文字列連結はピリオド
$str = 'aaaaaa' . 'aaaaaa';

$array = ['にんじん', 'しりしり'];
// 配列などの文字列以外の値はechoするとエラーが出る
print_r($array);

?>


<h1>変数は<?php echo $variable; ?></h1>

<!-- phpタグとecho文を兼ね備えたタグ -->
<p>
<?= 'php echo aaaaaaaaaaaaaaaaaaaaaa';?>
</p>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
</head>
<body>
    <h1>会員登録</h1>
    <div id="form">
        <div id="transition_wrapper" class="form_contents">
            <h3>新規会員登録</h3>
            <p>メールアドレスとパスワードで会員登録</p>
            <form action="post">
                <div id="input_area">
                    <input type="email" placeholder="メールアドレス">
                    <input type="password" placeholder="パスワード">
                    <button type="submit">新規会員登録</button>
                </div>
            </form>
        </div>
</body>