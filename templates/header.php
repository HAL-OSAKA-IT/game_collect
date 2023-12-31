<?php 
// 読み込み方法: body要素の上に以下を記述、ただし <?php と ?[これは削除]> で囲むこと
// include './templates/header.php';
?>

<?php
$siteURL = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . '/game_collect';
?>

<head>
    <link rel="stylesheet" href="<?php echo $siteURL; ?>/templates/css/header.css?231224">
</head>
<body>
    <header>
        <nav id="nav">
            <h1><a href="<?php echo $siteURL; ?>"><img src="<?php echo $siteURL; ?>/image/logo.png" alt="game collect"></a></h1>
            <ul id="menu_group">
				<!-- ログイン状態によって表示項目を変化 -->
				<?php
					if(empty($_SESSION['member_id'])){
						echo '<li class="menu_item"><a href="' . $siteURL . '/member/login.php">ログイン</a></li>';
						echo '<li class="menu_item"><a href="' . $siteURL . '/member/registration.php">会員登録</a></li>';
					}else{
						echo '<li class="menu_item"><a href="' . $siteURL . '">アカウント削除</a></li>';
						echo '<li class="menu_item"><a href="' . $siteURL . '/member/logout.php">ログアウト</a></li>';
					}
				?>
            </ul>
        </nav>
    </header>
</body>
</html>