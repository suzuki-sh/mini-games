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

・棒倒し法<=今回はこちら
・穴掘り法


二次元配列をつくりキーを座標値に、
バリューをブロックの判定値にする。
デフォルト値は0＝ブロック、1＝通路
---------------*/

/*=========================
 宣言文(変数・関数・定数・クラス)
=========================*/
$block = array();//ブロック格納用配列の初期化
$sizeNum = 19;//1辺あたりのブロックの個数
//必ず１辺あたりの増す数が奇数になるように調整
if($sizeNum %2 == 0){
	$sizeNum++;
}else{
	$sizeNum = $sizeNum;
}


/*=========================
 実行文
=========================*/
//二次元配列に判定値を格納（黒マス＝0、白マス＝1 デフォルト値は0
for ($i = 1; $i <= $sizeNum; $i++){
    $block[$i] = array();
    for($j = 1; $j <=$sizeNum; $j++){
        $block[$i][$j] = 0;
    }
}

//二次元配列に格納した値を変更して白マスの通路をつくる(黒い柱を残す)
foreach($block as $y=>$valArr){
    foreach($valArr as $x=>$v){
        $randDirection = rand(1, 4);
        //スタート地点を決定
        if($y == 2 && $x == 2 && $sizeNum > 2){
            $block[$y][$x] = 1;
        }
        //ゴールを地点を決定
        elseif($y == $sizeNum-1 && $x == $sizeNum-1){
            $block[$sizeNum-1][$sizeNum-1] = 1;
        }
        //通路を決定
        elseif($y > 1 && $y < $sizeNum && $x %2 == 0){
            $block[$y][$x] = 1;
        }
        //通路を決定
        elseif($x > 1 && $x < $sizeNum && $y %2 == 0){
            $block[$y][$x] = 1;
        }
        //奇数マスの上のマスを黒に
        elseif($y > 1
               && $x >1
               && $y < $sizeNum
               && $x < $sizeNum
               && $y%2 == 1
               && $x%2 == 1
               && $randDirection == 1){
            $block[$y-1][$x] = 0;
        }
        //奇数マスの右のマスを黒に
        elseif($y > 1
               && $x > 1
               && $y < $sizeNum
               && $x < $sizeNum
               && $y%2 == 1
               && $x%2 == 1
               && $randDirection == 2){
            $block[$y][$x-1] = 0;
        }
        elseif($y > 1
               && $x > 1
               && $y < $sizeNum
               && $x < $sizeNum
               && $y%2 == 1
               && $x%2 == 1
               && $randDirection == 3){
            $block[$y-1][$x] = 0;
        }
       elseif($y > 1
               && $x > 1
               && $y < $sizeNum
               && $x < $sizeNum
               && $y%2 == 1
               && $x%2 == 1
               && $randDirection == 4){
            $block[$y][$x-1] = 0;
        }
    }
}
    
//二次元配列の要素をHTML<table>で出力
function table($block, $sizeNum){
    echo '<table>';
    foreach($block as $key=>$val){
        echo '<tr>';
        foreach($val as $key2=>$val2){
            //黒マスを表示
            if($val2 == 0){
                echo "<td class=\"{$key}-{$key2} blackBlock\">■</td>";
            }
            //スタート地点を表示
            elseif($key == 2 && $key2 == 2){
                echo "<td id=\"start\" class=\"{$key}-{$key2}\">□</td>";
            }
           //ゴール地点を表示
            elseif($key == $sizeNum-1 && $key2 == $sizeNum-1){
                echo "<td id=\"goal\" class=\"{$key}-{$key2}\">□</td>";
            }
            //白マスを表示
            else{
                echo "<td class=\"{$key}-{$key2} whiteBlock\">□</td>";
            }
        }
        echo '</tr>';
    }
    echo '</table>';
    return;
}
table($block, $sizeNum);


//ここまで ↑ php
?>
<!--
<div class="control">
<input type="button" value="↑" id="top" onclick="();">
<input type="button" value="→" id="right" onclick="();">
<input type="button" value="↓" id="down" onclick="();">
<input type="button" value="←" id="left" onclick="();">
</div>
-->
</section>
</body>
</html>