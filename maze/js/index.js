let block = [];
const sizeNum = 13;
const max = 4;
const min = 1;
const randomDirection = Math.floor(Math.random() * (max - min + 1)) + min

function sizeAdjuster(){
    if (sizeNum % 2 == 0) {
        sizeNum++;
    }
}

function stageCreater(stageArray){
    for(i = 1; i <= sizeNum; i++){
        stageArray[i] = [];
        for(j = 1; j <= sizeNum; j++){
            stageArray[i][j] = 0;
        }
    }
    return stageArray;
}

function mazeCreater(){
    block.forEach((childArray, y) => {
        childArray.forEach((child, x) => {
            // メインロジック
        })
    })
}

function startPointSetter(){
    //スタート地点を決定
    block[2][2] = 1;
}

function goalPointSetter(){
    //ゴールを地点を決定
    block[sizeNum - 1][sizeNum - 1] = 1
}

function mazeChecker(stageArray){
    stageArray.forEach((item, index) => {
        console.log(`[${index}]:${item}`)
    })
}

function main(){
    sizeAdjuster();
    stageCreater(block);
    mazeCreater();
    startPointSetter();
    goalPointSetter();
    mazeChecker(block);
}

window.onload = () => {
    main();
}
