// ゲームのメインループ
function main() {
	// 描画の初期化
	ctx.clearRect(0, 0, gameWidth, gameHeight);
	
	typeCheck();
	// 描画系処理
	drawTitleScene();
	drawTargetChar();
	drawResult();
}

// 10msごとに実行
setInterval(main, 10);
