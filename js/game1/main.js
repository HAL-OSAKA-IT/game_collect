// ゲームのメインループ
function main() {
	// 描画の初期化
	ctx.clearRect(0, 0, gameWidth, gameHeight);
    // 内部処理系
	fallPlayer();
    moveGate(); 
	// 描画系処理
	drawGround();
	drawTitleScene();
    drawPlayer();
    drawGate();  
	drawGameover();
	drawScore();
}

// 10msごとに実行
setInterval(main, 10);