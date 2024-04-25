// ゲームの開始処理
function gameStart() {
    // プレイヤーの落下速度の初期化
	playerSpeed = 0;
    // ゲートの配置を初期化
	initGate();
	// スコアの計測
	score = 0;
	scoreTimer = setInterval(countScore, 100);
	// 状態をプレイ中に
	gameState = 1;
}

// スペースキーを押したらジャンプする（2段ジャンプまでの制御）
function jumpPlayer() {
	if(jumpNum>=1){

		playerSpeed = playerJumpSpeed;
		jumpNum = jumpNum - 1;
	}
	if(jumpNum === 1){
		playerImage.src = "../image/game1/bike_jump1.png";
	}
	else if(jumpNum === 0){
		playerImage.src = "../image/game1/bike_jump2.png";	
	}
}


// ゲートの初期位置を設定
function initGate() {
	for(let i=0; i<gateCount; i++) {
		// ゲートの間隔を離して設置しておく
		const x = gameWidth + gateDistance*i;
		// ゲートの高さを設定(あとで)
		// const y = 200;
		const y = Math.random() * (gameHeight - gateH);
		gates[i] = {x: x, y: y};
	}
}

// ゲートを左から右へ移動
function moveGate() {
	// プレイ中のみ有効
	if(gameState === 1) {
		for(let i=0; i<gateCount; i++) {
			// 移動
			gates[i].x -= gateSpeed;
			// 画面左から画面外へ行ったら、右端からもう一度流れる
			if(gates[i].x < -gateW) {
				gates[i].x += gameWidth + gateW;
			}
		}
	}
}

// ゲーム終了時の処理
function gameReset() {
	gameState = 0;
	playerY = gameHeight * 0.5;
}

// ゲートとぶつかっているか調べる処理
function checkCollision() {
	// 各ゲート毎に調べる
	for(let i=0; i<gateCount; i++) {
		// x軸方向
		let isCollisionX = playerX + playerW > gates[i].x && playerX < gates[i].x + gateW;
		// y軸方向
		// let isCollisionY = playerY < gates[i].y || playerY + playerH > gates[i].y + gateH;
		let isCollisionY = playerY + playerH > gates[i].y + gateH;

		if(isCollisionX && isCollisionY) {
			return true;
		}
	}
	return false;
}

// スコアを計測する
function countScore() {
	score += 1;
}

// プレイヤーの落下処理
function fallPlayer() {
	// プレイ中のみ有効
	if(gameState === 1) {
		// プレイヤーを落下(負の場合上昇)させる
		playerY += playerSpeed;

		// 落下速度を加速(「加速後の速度」と「最大速度」を比較し、小さい方を代入)
		playerSpeed = Math.min(playerSpeed + gravity, maxSpeed);

		// ゲートにぶつかっているか調べる
		let isCollision = checkCollision();

		// 画面最上部より上に行けないように
		if(playerY < 0) {
			playerY = 0;
			playerSpeed = 0;
		}

		// 画面最下部より下に落ちるとゲームオーバー
		if(playerY > gameHeight || isCollision) {
			// スコア計測タイマー停止
			clearInterval(scoreTimer);
			// ハイスコア更新
			maxScore = Math.max(score, maxScore);
			// ゲームオーバーのステータスに変更
			gameState = 2;
		}

		// 落下速度を加速(「加速後の速度」と「最大速度」を比較し、小さい方を代入)
		playerSpeed = Math.min(playerSpeed + gravity, maxSpeed);

		// 床までの落下処理
		if(playerY > 315){
			playerSpeed = 0;
			// ジャンプ回数のリセット
			jumpNum = 2;
			// gravity = 0;
			// 着地時にプレイヤー画像の変更
			playerImage.src = "../image/game1/bike.png";
		}
	}
}
