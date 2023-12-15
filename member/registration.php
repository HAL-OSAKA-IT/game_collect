<?php 
// やること
// 1. scssファイル作成パスを相対パスに変える(木下の家のwindowsに設定が残ってるはずなのでそれを反映する。)


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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>