// キー入力イベントの判定
document.addEventListener("keydown", function(event) {
	if(gameState === 0 && event.key === " " && isPressed === false) {
		playerInput();
		isPressed = true;
	}
	else if(gameState === 2 && event.key === " " && isPressed === false){
		gameReset();
	}
	else if(gameState === 1) {
		if (event.key === "Backspace"){
			typeChar = typeChar.slice(0, -1);
		}
		else if(event.key.match(/^[A-Z]$/i)) {
			typeChar += event.key;
		}
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
