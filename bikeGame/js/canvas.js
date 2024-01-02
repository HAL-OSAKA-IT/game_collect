// キャンバス要素を取得
const canvas = document.getElementById("gameCanvas");
// ゲーム画面の大きさ: 960 x 640
const gameWidth = 960;
const gameHeight = 640;
canvas.width = gameWidth;
canvas.height = gameHeight;
// キャンバス操作用
const ctx = canvas.getContext("2d");