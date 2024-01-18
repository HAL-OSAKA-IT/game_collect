// キー入力イベントの判定
document.addEventListener("keydown", function(event) {
	if(event.key === " " && isPressed === false) {
		playerInput();
		isPressed = true;
	}
});
document.addEventListener("keyup", function(event) {
	if(event.key === " ") {
		isPressed = false;
	}
});

// スペースキーを押下した瞬間のみ呼び出し
function playerInput() {
	switch (gameState) {
		case 0:
			gameStart();
			break;

        case 1:
			// ゲーム中はジャンプボタンとして機能
			jumpPlayer();
			break;

		case 2:
			// ゲームオーバー画面で押すと初期化後タイトル画面へ
			gameReset();
			break;
	}
}