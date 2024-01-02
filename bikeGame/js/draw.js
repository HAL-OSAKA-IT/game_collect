// タイトル画面(ゲームスタート前)を描画する処理
function drawTitleScene() {
	if(gameState === 0) {
		// ゲームスタート以前に表示するテキスト
		ctx.fillStyle = "black";
		ctx.textAlign = "center";
		ctx.textBaseline = "middle";
		ctx.font = "60px Zen Kaku Gothic New";
		ctx.fillText("バイクジャンプ", gameWidth*0.5, gameHeight*0.25);
		ctx.font = "20px Zen Kaku Gothic New";
		ctx.fillText("スペースキーを押してスタート", gameWidth*0.5, gameHeight*0.75);
	}
}

// プレイヤーキャラクターの描画
function drawPlayer() {
	// WとHで画像サイズを指定
	ctx.drawImage(playerImage, playerX, playerY, playerW, playerH);
}

// ゲートの描画
function drawGate() {
	// ゲートはプレイ中とゲームオーバー時に描画
	if(gameState >= 1) {
		// 色を設定
		ctx.fillStyle = "#DD8800";
	
		for(let i=0; i<gateCount; i++) {
			// 座標や長さなど
			let x = gates[i].x;
			let y;
			let w = gateW;
			let h;
	
			// ゲートの上部分
			y = 0;
			h = gates[i].y;
			ctx.fillRect(x, y, w, h);
			// ゲートの下部分
			y = gates[i].y + gateH;
			h = gameHeight - gates[i].y - gateH;
			ctx.fillRect(x, y, w, h);
		}
	}
}