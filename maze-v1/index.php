<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>phpで迷路(配列と改行)</title>
    <style>
        #maze{
            line-height: 0.75;
            letter-spacing: -0.25em;
            font-size: 1.6em;
        }
        #maze span{
            color: brown;
            font-weight: bold;
        }
    </style>
</head>
<body>
<h1>迷路</h1>
<section id="maze">
<?php
//ここから ↓ php

/*=========================
 宣言文(変数・関数・定数・クラス)
=========================*/
$block = array();//ブロック格納用配列の初期化
$sizeNum = 19;//1辺あたりのブロックの個数
$blockNum = $sizeNum * $sizeNum;//全体のブロックの個数

for($i = 1; $i <= $blockNum; $i++){//作ったブロックを配列に格納
    if($i <= $sizeNum || $i > $blockNum - $sizeNum || $i%$sizeNum == 0 || $i%$sizeNum == 1){
        $block[$i] = "■";//外側の壁を作る
    }else{
        $block[$i] = "□";
    }
}
for($i = $sizeNum+1; $i <= $blockNum; $i++){
    if(){
        $block[$i] = "■";
    }
}
$block[$sizeNum+2] = "<span>Ｓ</span>";
$block[$blockNum-($sizeNum+1)] = "<span>Ｇ</span>";
/*=========================
 実行文
=========================*/
//配列からkeyとvalueを取り出す
foreach($block as $key=>$val){
    if($key%$sizeNum !=0){
        echo $val;
    }else{
        echo $val."<br>";
    }
}

    
//ここまで ↑ php
?>
</section>
</body>
</html>