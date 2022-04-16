<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>phpで迷路(二次元配列とテーブル)</title>
	<link rel="stylesheet" href="common/css/cssreset.css" media="all">
	<link rel="stylesheet" href="common/css/cssfonts.css" media="all">
	<link rel="stylesheet" href="common/css/maze-style.css" media="all">
	<script src="common/js/jquery-2.2.1.min.js"></script>
	<script src="common/js/control.js"></script>
</head>

<body>
<section id="maze">
<h1>迷路(二次元配列)</h1>
<?php
//ここから ↓ php

/*memo-----------
通路の作り方について
・棒倒し法
・穴掘り法

現状の塗り方は白ブロックを条件分岐で黒ブロックにしている。

---------------*/

/*=========================
 宣言文(変数・関数・定数・クラス)
=========================*/
$block = array();//ブロック格納用配列の初期化
$sizeNum = 20;//1辺あたりのブロックの個数

for($cnt = 0; $cnt<5; $cnt++){
	$randDirection = rand(0, 1);
	if($randDirection == 0){
		$directionX = true;
	}else{
		$directionY = false;
	}
}

for($num = 1; $num <= $sizeNum; $num++){
	$randomNums[$num]=rand(1, $sizeNum);
}
if($sizeNum %2 == 0){
	$sizeNum++;
}else{
	$sizeNum = $sizeNum;
}
//var_dump($randomNums);
/*=========================
 実行文
=========================*/
//二次元配列に□を格納
for ($i = 1; $i <= $sizeNum; $i++){
	$block[$i] = array();
	for($j = 1; $j <=$sizeNum; $j++){
		$block[$i][$j] = "□";
	}
}
//二次元配列の要素を出力
foreach($block as $keyY=>$val){//外の配列のループ
	foreach($val as $keyX=>$inVal){//中の配列のループ
		//right=>blackBlock
		if($keyX>=$sizeNum){//中の配列の改行とhtmlのクラス属性付与
			echo "<span class=\"{$keyY}_{$keyX} blackBlock\">{$inVal}</span><br>";
		}
		//bottom, left top=>blackBlock
		elseif($keyY >= $sizeNum || $keyX == 1 || $keyY == 1){
			echo "<span class=\"{$keyY}_{$keyX} blackBlock\">{$inVal}</span>";
		}
		//bottom, left top=>blackBlock
		elseif($keyY%2 == 1 && $keyX%2 == 1){
			echo "<span class=\"{$keyY}_{$keyX} blackBlock\">{$inVal}</span>";
		}
		//start
		elseif($keyY == 2 && $keyX == 2){
			echo "<span class=\"{$keyY}_{$keyX} start\">Ｓ</span>";
		}
		//goal
		elseif($keyY == $sizeNum-1 && $keyX == $sizeNum-1){
			echo "<span class=\"{$keyY}_{$keyX} goal\">Ｇ</span>";
		}

		//中の配列の表示htmlのクラス属性付与
		else{
			echo "<span class=\"{$keyY}_{$keyX} whiteBlock\">{$inVal}</span>";
		}
	}
}

//ここまで ↑ php
?>
<div class="control">
<input type="button" value="↑" id="top">
<input type="button" value="→" id="right">
<input type="button" value="↓" id="down">
<input type="button" value="←" id="left">
</div>
</section>
</body>
</html>