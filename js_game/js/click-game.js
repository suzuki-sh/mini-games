//イベント：DOMツリーが読み込まれたら
window.addEventListener("DOMContentLoaded",function(){
    //ボタンのテキストステータス:array
    var buttonText = new Array("start","pause","stop");

    //ボタンのオブジェクトを取得
    var buttonDOM = document.getElementById("button");

    //ボタンのテキストを初期化
    buttonDOM.innerHTML = buttonText[0];

    console.dir(buttonDOM);
    /*---------------------------
    * function buttonChange
    * param:
    * return:
    * ボタンのテキストを書き換える関数
    *---------------------------*/
    function buttonChange (){
        switch(buttonDOM.textContent){
            case buttonText[0]:
                buttonDOM.innerHTML = buttonText[1];
                break;
            case buttonText[1]:
                buttonDOM.innerHTML = buttonText[2];
                break;
            case buttonText[2]:
                buttonDOM.innerHTML = buttonText[0];
                break;
        }
        return;
    };

    //当たり判定用ステータス：0 = no good, 1 = good, 2 = very good
    var clickAreaStatus = new Array("bg_blue","bg_yellow","bg_red");

    //時間カウントを格納する変数(初期値0)
    var timeCnt = 0;

    //時間表示枠
    var remainingTime = document.getElementById("remainingTime");
    /*---------------------------
    * function getTimeCount
    * param:
    * return:
    * setTimeOut で再帰的に時間カウンターを回す
    *---------------------------*/
    function getTimeCount (){
        var cntId = setTimeout(getTimeCount, 1000);
        console.log(timeCnt);
        //remainingTime.innerHTML(timeCnt + '');
        timeCnt++;
        if(timeCnt > 20){
            clearTimeout(cntId);
            buttonChange();
        }
        return timeCnt;
    };

    //イベント：ボタンがクリックされたら
    buttonDOM.addEventListener("click",function(){
        buttonChange();
        getTimeCount();
    },false);

},false);