<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>game collect | PLAY</title>
	<link rel="stylesheet" href="./css/game.css">
</head>
<?php include '../templates/header.php'; ?>
<body>
	<!-- クエリパラメータでプレイ中のゲームを管理 -->
	<!-- http://localhost/game_collect/game?gameID=0 -->
	<?php 
		if (isset($_GET['gameID'])) {
			$gameID = $_GET['gameID'];
		} else {
			$gameID = 1;
		}
	?>

	<main>
		<p id="back"><a href="./../">＜ ゲーム一覧へ</a></p>
		<canvas id="gameCanvas" style="background-color: black;"></canvas>
	</main>
	
	<script src="./../js/canvas.js"></script>
	<script src="./../js/game<?php echo $gameID ?>/init.js"></script>
	<!-- 以下にはゲームによって動的に要素が追加される -->
</body>
</html>