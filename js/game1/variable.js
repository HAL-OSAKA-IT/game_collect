// ゲームの進行を管理(0:タイトル, 1:プレイ中, 2:ゲームオーバー)
var gameState = 0;
// キーボード(スペースキー)の入力を管理するフラグ
var isPressed = false;

// プレイヤーキャラクターの画像
const playerImage = new Image();
playerImage.src = "../image/game1/bike.png";
const playerW = 60;
const playerH = 60;
// プレイヤーキャラクターの座標(xは固定)
const playerX = gameWidth * 0.18;
var playerY = gameHeight * 0.5;
// プレイヤーキャラクターの落下速度
var playerSpeed = 0;
// プレイヤーキャラクターのジャンプの初速
const playerJumpSpeed = -7;

// 石の画像
const ishiImage = new Image();
ishiImage.src = "../image/game1/ishi.png";
var ishiX = 500;
var ishiY = 320;
var ishiSpeed = 5;


// 重力加速度
const gravity = 9.8 / 100;
// 最大落下速度
const maxSpeed = 6;


// ゲートの個数
const gateCount = 300;
// ゲートの流れる速度
const gateSpeed = 3;
// ゲートの横幅
const gateW = 10;
// ゲートの空いている高さ
const gateH = 250;
// ゲート間の距離
// const gateDistance = (gameWidth + gateW) / gateCount;
const gateDistance = (gameWidth + gateW) / 3;
// ゲートのデータ管理用配列
var gates = [];

// ジャンプ回数制限
var jumpNum = 2;

// スコア
var score = 0;
var maxScore = 0;
// スコア計測タイマー
var scoreTimer;