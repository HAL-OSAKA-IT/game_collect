console.log('game3/init.js loaded!');
// このファイルはゲームの処理を行うスクリプトを読み込むためのファイルです
// 必要なファイルを適宜以下に追記していってください

// 読み込むスクリプトのファイル名(適宜変更)
// これらファイルは同じ数字のgameフォルダに格納すること
// 上に書いたものから順に読み込まれる
const scriptName = [
	"class.js",
	"variable.js",
	"process.js",
	"input.js",
	"draw.js",
	"main.js"
];

// ゲームタイトルを以下に記入
const gameTitle = "";
// ゲームの説明文を以下に記入
const gameDesc = "";


// 以下変更の必要なし

// 現在のgameフォルダのパスを求める
const searchParams = new URLSearchParams(window.location.search);
var gameID;
if(searchParams.get("gameID") === null) {
	gameID = "1"
}else {
	gameID = searchParams.get("gameID");
}
const gamePath = "./../js/game" + gameID + "/";
// script要素を必要数生成
const scripts = [];
for(let i=0; i<scriptName.length; i++) {
	scripts[i] = document.createElement('script');
	scripts[i].src = gamePath + scriptName[i];
	document.body.appendChild(scripts[i]);
}
