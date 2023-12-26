console.log('canvas.js loaded!');

// キャンバス要素を取得
const canvas = document.getElementById("gameCanvas");
// ゲーム画面の大きさ: 800 x 600
const gameWidth = 800;
const gameHeight = 600;
canvas.width = gameWidth;
canvas.height = gameHeight;
// キャンバス操作用
const ctx = canvas.getContext("2d");
