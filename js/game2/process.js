// ゲームの開始処理
function gameStart() {
	// 状態をプレイ中に
	gameState = 1;
}
function gameEnd(){
	gameState = 2;
}

function gameReset() {
	gameState = 0;
	current_number = 0;
}

function typeCheck() {
	if (typeChar == targetChar[current_number]){
		current_number += 1;
		typeChar = "";
		
		if(targetChar.length === current_number){
			gameEnd();
		}
	}
}