// ゲームの進行を管理(0:タイトル, 1:プレイ中, 2:ゲームオーバー)
var gameState = 0;
// キーボード(スペースキー)の入力を管理するフラグ
var isPressed = false;
// ゲームクリア判定
var gameCleared = false;
// ピースが移動中か判定
var isMoving = false;

// 1つのピースは80pxの正方形
const pieceSize = 80;

const colMax = 4;
const rowMax = 4;

const boardLeft = gameWidth*0.5 - (pieceSize+5) * colMax/2 - 2.5;
const boardTop = gameHeight*0.5 - (pieceSize+5) * rowMax/2 - 2.5;

pieces = [];

for(let row=0; row<rowMax; row++){
    for(let col=0; col<colMax; col++){
        pieces.push(new Piece(col, row));
    }
}
