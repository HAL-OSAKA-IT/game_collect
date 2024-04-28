// キー入力イベントの判定
document.addEventListener("keydown", function(event) {
	if(gameState === 0 && event.key === " " && isPressed === false) {
		playerInput();
		isPressed = true;
	}
	else if(gameState === 2 && event.key === " " && isPressed === false){
		gameReset();
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
	}
}

// マウスの入力判定
document.addEventListener('mousedown', function(event){
	if(gameState != 1 || event.button != 0 || isMoving || gameCleared){
		return;
	}

	onClick(event.clientX, event.clientY);
});