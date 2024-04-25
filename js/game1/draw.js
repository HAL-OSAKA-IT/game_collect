// タイトル画面(ゲームスタート前)を描画する処理
function drawTitleScene() {
	if(gameState === 0) {
		// プレイヤー画像の初期化
		playerImage.src = "../image/game1/bike.png";
		// ゲームスタート以前に表示するテキスト
		ctx.fillStyle = "#fff";
		ctx.textAlign = "center";
		ctx.textBaseline = "middle";
		ctx.font = "60px Zen Kaku Gothic New";
		ctx.fillText("バイクジャンプ", gameWidth*0.5, gameHeight*0.25);
		ctx.font = "20px Zen Kaku Gothic New";
		ctx.fillText("スペースキーを押してスタート", gameWidth*0.5, gameHeight*0.75);
		ctx.fillText("スコア: " + score, gameWidth*0.5, gameHeight*0.5);
		ctx.fillText("ハイスコア: " + maxScore, gameWidth*0.5, gameHeight*0.55);
		ctx.fillText("流れてくる壁や敵をよけて！！！", gameWidth*0.5, gameHeight*0.35);
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
			// y = 0;
			// h = gates[i].y;
			// ctx.fillRect(x, y, w, h);
			// ゲートの下部分
			y = gates[i].y + gateH;
			h = gameHeight - gates[i].y - gateH;
			ctx.fillRect(x, y, w, h);
		}

	}
}

function drawGround(){
	if(gameState >= 0){
		ctx.fillStyle = '#DD8800';
		var x = 0;
		var y = 375;
		var width = gameWidth;
		var height = 265;
		ctx.fillRect(x, y,width,height);
	}
}

// ゲームオーバー画面を描画する処理
function drawGameover() {
	if(gameState === 2) {
		// ゲームスタート以前に表示するテキスト
		ctx.fillStyle = "#fff";
		ctx.textAlign = "center";
		ctx.textBaseline = "middle";
		ctx.font = "60px Zen Kaku Gothic New";
		ctx.fillText("ゲームオーバー", gameWidth*0.5, gameHeight*0.25);
		ctx.font = "20px Zen Kaku Gothic New";
		ctx.fillText("スペースキーを押してタイトルへ", gameWidth*0.5, gameHeight*0.75);
		ctx.fillText("スコア: " + score, gameWidth*0.5, gameHeight*0.5);
		ctx.fillText("ハイスコア: " + maxScore, gameWidth*0.5, gameHeight*0.55);

		// 当たり判定時に画像変更
		playerImage.src = "../image/game1/bike_black.png";
	}	
}

// スコアの表示
function drawScore() {
	if(gameState === 1) {
		ctx.fillStyle = "white";
		ctx.font = "40px Zen Kaku Gothic New";
		ctx.fillText(score, gameWidth*0.5, gameHeight*0.1);
	}
}