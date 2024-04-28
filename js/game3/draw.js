// タイトル画面(ゲームスタート前)を描画する処理
function drawTitleScene() {
	if(gameState === 0) {
		// ゲームスタート以前に表示するテキスト
		ctx.fillStyle = "#ffffff";
		ctx.textAlign = "center";
		ctx.textBaseline = "middle";
		ctx.font = "60px Zen Kaku Gothic New";
		ctx.fillText("15パズル", gameWidth*0.5, gameHeight*0.25);
		ctx.font = "20px Zen Kaku Gothic New";
		ctx.fillText("スペースキーを押してスタート", gameWidth*0.5, gameHeight*0.75);
	}
}

function drawPuzzle() {
	if(gameState === 1) {
		ctx.fillStyle = '#fff';
		// ctx.lineWidth= 4;
		let boardLen = (pieceSize+5) * colMax + 5;
		ctx.fillRect(boardLeft, boardTop, boardLen, boardLen);

		for(let i=0; i < pieces.length; i++){
			if(pieces[i].Number != 16)
				pieces[i].Draw();
		}
	}
}

function drawResult() {
	if(gameState === 2) {
		ctx.fillStyle = "#ffffff"
		ctx.font = "60px Zen Kaku Gothic New";
		ctx.fillText("結果発表", gameWidth*0.5, gameHeight*0.25);

		ctx.font = "20px Zen Kaku Gothic New";
		ctx.fillText("スペースキーを押してリトライ", gameWidth*0.5, gameHeight*0.75)
	}
}