$(function () {
    const HANDS = {
        'g': {
            'display_txt': 'グー'
        },
        'c': {
            'display_txt': 'チョキ'
        },
        'p': {
            'display_txt': 'パー'
        }
    };

    const matrix = {
        'g': {
            'g': 'DRAW',
            'c': 'WIN',
            'p': 'LOSE'
        },
        'c': {
            'g': 'LOSE',
            'c': 'DRAW',
            'p': 'WIN'
        },
        'p': {
            'g': 'WIN',
            'c': 'LOSE',
            'p': 'DRAW'
        }
    }

    const errorMsg = 'NO CONTEST'

    let myHand = ''
    let rivalHand = ''

    function setMyHand(){
        myHand = $(':radio[name="Hand"]:checked').val();
    }
    
    function setRivalHand(){
        let random = Math.floor(Math.random() * 10); //0～9までの整数
        if (random > 6) {
            rivalHand = 'g'
        } else if (random > 3) {
            rivalHand = 'c'
        } else {
            rivalHand = 'p'
        }
    }

    function showBothHands() {
        try {
            $("#myHand").text("あなたの手は" + HANDS[myHand].display_txt);
            $("#rivalHand").text("相手の手は" + HANDS[rivalHand].display_txt);
        }
        catch {
            $("#result").text(errorMsg)
        }
    }

    function match(x, y, matrix) {
        try {
            return matrix[x][y];
        }
        catch(e) {
            console.log(e.message);
            return errorMsg
        }
    }

    function matcheContinue(){
        myHand = ''
        $("#battle").text("もう一回");
    }

    $("#result").hide(); //一旦勝敗結果の<p>は隠す

    $(":radio[name='Hand']").on('change', function(event){
        setMyHand();
        setRivalHand();
    });

    $("#battle").on('click', function (event) {
        $("p").show(); //クリックされたら<p>を表示する
        showBothHands();
        $("#result").text(match(myHand, rivalHand, matrix))
        matcheContinue();
    });
});