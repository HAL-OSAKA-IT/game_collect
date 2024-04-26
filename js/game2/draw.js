// タイトル画面(ゲームスタート前)を描画する処理
function drawTitleScene() {
	if(gameState === 0) {
		// ゲームスタート以前に表示するテキスト
		ctx.fillStyle = "#ffffff";
		ctx.textAlign = "center";
		ctx.textBaseline = "middle";
		ctx.font = "60px Zen Kaku Gothic New";
		ctx.fillText("10秒タイピング", gameWidth*0.5, gameHeight*0.25);
		ctx.font = "20px Zen Kaku Gothic New";
		ctx.fillText("スペースキーを押してスタート", gameWidth*0.5, gameHeight*0.75);
	}
}

function drawTargetChar() {
	if(gameState === 1) {
		ctx.font = "40px Zen Kaku Gothic New";
		ctx.fillText(targetChar[current_number], gameWidth*0.5, gameHeight*0.25);

		ctx.font = "30px Zen Kaku Gothic New";
		ctx.fillText(typeChar, gameWidth*0.5, gameHeight*0.75);
	}
}

function drawResult() {
	if(gameState === 2) {
		ctx.font = "60px Zen Kaku Gothic New";
		ctx.fillText("結果発表", gameWidth*0.5, gameHeight*0.25);

		ctx.font = "20px Zen Kaku Gothic New";
		ctx.fillText("スペースキーを押してリトライ", gameWidth*0.5, gameHeight*0.75)
	}
}