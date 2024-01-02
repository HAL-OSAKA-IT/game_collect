// ゲームの開始処理
function gameStart() {
    // プレイヤーの落下速度の初期化
	// playerSpeed = 0;
    // ゲートの配置を初期化
	initGate();
	// 状態をプレイ中に
	gameState = 1;
}

// スペースキーを押したらジャンプする
function jumpPlayer() {
	playerSpeed = playerJumpSpeed;
}

// プレイヤーの落下処理
function fallPlayer() {
	// プレイ中のみ有効
	if(gameState === 1) {
		// プレイヤーを落下(負の場合上昇)させる
		playerY += playerSpeed;
		// 落下速度を加速(「加速後の速度」と「最大速度」を比較し、小さい方を代入)
		playerSpeed = Math.min(playerSpeed + gravity, maxSpeed);
	}
}

// ゲートの初期位置を設定
function initGate() {
	for(let i=0; i<gateCount; i++) {
		// ゲートの間隔を離して設置しておく
		const x = gameWidth + gateDistance*i;
		// ゲートの高さを設定(あとで)
		const y = 200;
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