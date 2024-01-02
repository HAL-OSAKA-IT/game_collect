// ゲームの進行を管理(0:タイトル, 1:プレイ中, 2:ゲームオーバー)
var gameState = 0;
// キーボード(スペースキー)の入力を管理するフラグ
var isPressed = false;

// プレイヤーキャラクターの画像
const playerImage = new Image();
playerImage.src = "image/bike.png";
const playerW = 60;
const playerH = 60;
// プレイヤーキャラクターの座標(xは固定)
const playerX = gameWidth * 0.18;
var playerY = gameHeight * 0.2;
// プレイヤーキャラクターの落下速度
var playerSpeed = 0;
// プレイヤーキャラクターのジャンプの初速
const playerJumpSpeed = -4;

// 重力加速度
const gravity = 9.8 / 100;
// 最大落下速度
const maxSpeed = 6;


// ゲートの個数
const gateCount = 3;
// ゲートの流れる速度
const gateSpeed = 2;
// ゲートの横幅
const gateW = 30;
// ゲートの空いている高さ
const gateH = 240;
// ゲート間の距離
const gateDistance = (gameWidth + gateW) / gateCount;
// ゲートのデータ管理用配列
var gates = [];