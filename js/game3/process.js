// ゲームの開始処理
function gameStart() {
    for (let i = 0; i < 100; i++) {
        shuffle();
    }
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


function check(){
    for(let i = 0; i < pieces.length; i++){
        if(!pieces[i].Check())
            return false;
    }
    return true;
}

async function onClick(x, y){
	const rect = canvas.getBoundingClientRect();
 
	let ps = pieces.filter(piece => piece.IsClick(x - rect.left, y - rect.top) );
	console.log(ps);
    if(ps.length == 0){
        return;
    }
 
	// 16番のピースを取得
	let piece16 = pieces.filter(piece => piece.Number == 16)[0];
	
	// 16番ピースが存在するのは何行何列目か？
    let col16 = Math.round((piece16.X - boardLeft) / pieceSize);
    let row16 = Math.round((piece16.Y - boardTop) / pieceSize);
    console.log(col16, row16);
 
	// クリックされたピースが存在するのは何行何列目か？
    let clickedPiece = ps[0];
    let clickedCol = Math.round((clickedPiece.X - boardLeft)  / pieceSize);
    let clickedRow = Math.round((clickedPiece.Y - boardTop) / pieceSize);

    // 移動できるピースがクリックされたのか判定
    diffCol = Math.abs(col16 - clickedCol);
    diffRow = Math.abs(row16 - clickedRow);
    if(!((diffCol == 1 && diffRow == 0) || (diffCol == 0 && diffRow == 1))){
        return;
    }
 
	// 現在移動中のフラグをセット
    isMoving = true;
 
	// 16番ピースの座標をクリックされたピースの座標に変更
	piece16.X = clickedCol * pieceSize + 5 * (clickedCol + 1) + boardLeft;
	piece16.Y = clickedRow * pieceSize + 5 * (clickedRow + 1) + boardTop;
	// クリックされたピースを16番ピースの座標にゆっくり移動
    let speed = 25;
    let count = pieceSize / speed;
 
    for(let i= 0; i < count - 1; i++){ // 移動しすぎ対策。ループの回数はcount回より1減らす
        if(clickedRow == row16 + 1) // 上へ移動
            clickedPiece.Y -= speed;
        if(clickedRow == row16 - 1) // 下へ移動
            clickedPiece.Y += speed;
        if(clickedCol == col16 + 1) // 左へ移動
            clickedPiece.X -= speed;
        if(clickedCol == col16 - 1) // 右へ移動
            clickedPiece.X += speed;
        drawPuzzle();
        await sleep(60);
    }
    // 最後に移動後の座標をセット
    if(clickedRow == row16 + 1 || clickedRow == row16 - 1)
        clickedPiece.Y = row16 * pieceSize + 5 * (row16 + 1) + boardTop;
    if(clickedCol == col16 + 1 || clickedCol == col16 - 1)
        clickedPiece.X = col16 * pieceSize + 5 * (col16 + 1) + boardLeft;
 
    drawPuzzle();
 
	// 移動を完了したのでフラグをクリア
    isMoving = false;
 
	// パズルが完成しているかもしれないのでチェックする
    if(check()){
		gameState = 2;
    }
}
 
async function sleep(ms){
    await new Promise(resolve => setTimeout(resolve, ms));
}

function shuffle(){
    // 16番のピースを取得
	let piece16 = pieces.filter(piece => piece.Number == 16)[0];
	
	// 16番ピースが存在するのは何行何列目か？
    let col16 = Math.round((piece16.X - boardLeft) / pieceSize);
    let row16 = Math.round((piece16.Y - boardTop) / pieceSize);

    // 移動できる方向を把握する
    var moveDirection = [];
    if(col16 < colMax - 1){
        moveDirection.push([1, 0]);
    }
    if(col16 > 0){
        moveDirection.push([-1, 0]);
    }
    if(row16 < rowMax - 1){
        moveDirection.push([0, 1]);
    }
    if(row16 > 0){
        moveDirection.push([0, -1]);
    }

    var randomNum = Math.floor(Math.random() * moveDirection.length)
    moveCol = col16 + moveDirection[randomNum][0];
    moveRow = row16 + moveDirection[randomNum][1];

    // 交換処理
    var workX = piece16.X;
    var workY = piece16.Y;
    console.log(moveRow, moveCol)
    console.log(pieces);
    let movePiece = pieces[moveRow*4 +moveCol]
	piece16.X = movePiece.X;
	piece16.Y = movePiece.Y;
    movePiece.X = workX;
    movePiece.Y = workY;
}