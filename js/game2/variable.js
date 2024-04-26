// ゲームの進行を管理(0:タイトル, 1:プレイ中, 2:ゲームオーバー)
var gameState = 0;
// キーボード(スペースキー)の入力を管理するフラグ
var isPressed = false;

// 入力する文字
const targetChar = [
    'apple',
    'stack',
    'paper',
    'random',
    'python',
    'network',
    'compare',
    'average'
]
// 出題番号
var current_number = 0;
// タイプした文字列
var typeChar = "";
