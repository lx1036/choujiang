<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="no" name="apple-mobile-web-app-capable">
    <meta http-equiv="Cache-Control" content="no-cache">
    <title>当当员工大会抽奖</title>
    <link href="/css/cj.css" rel="stylesheet" type="text/css">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
</head>

<body class="bg_cj">
    <div class="bg_cj_box">
      <div class="title">
          <img src="/images/cj_title.png">
        <div class="jiang">
            <span class="prizetitle" grade="{!! $grade !!}">{!! $prize_title !!}</span>&nbsp;&nbsp;&nbsp;
            <span class="prizecount">0</span>
        </div>
      </div>
      <div class="cj">
        <div class="pic"><img src="/images/ren.gif"></div>
        <div class="name">猴子君</div>
        <a href="##" class="btn btn_start">抽奖</a>
        <!--<a href="##" class="btn btn_over">抽奖</a>-->
      </div>
    </div>


<script type="text/javascript">
var emplist = '';
var lottery_clock, ajax_clock;
var person = null;
var switchbtn = 0;
//$.getJSON("/employee", function (data) {
//    emplist = data;
//});


$('a.btn').on('click', function () {
    if($(this).hasClass('btn_start')){
        clickChangeCss();
        getJson();
        start();
        ajax_clock = setInterval(ajaxVoice, 3000);
    }else if($(this).hasClass('btn_over')){
//        clickRemoveChangeCss();
        finish();
    }
});

var clickChangeCss = function () {
    if(!$('.bg_cj_box').hasClass('click')){
        $('.bg_cj_box').addClass('click');
    }
};

var clickRemoveChangeCss = function () {
    if($('.bg_cj_box').hasClass('click')){
        $('.bg_cj_box').removeClass('click');
    }
};

var getJson = function () {
    $.getJSON("/employee", function (data) {
        emplist = data;
//        console.log(emplist.length);
    });
};

var start  = function () {
    $('.btn').removeClass('btn_start');
    $(".btn").addClass("btn_over");
    lottery_clock = setInterval(refreshLucky,10);
};
var finish = function () {
    var grade       = $('.prizetitle').attr('grade');
//    console.log(grade);
    var prize_count = $('span.prizecount').html();
    $('span.prizecount').html(parseInt(prize_count) + 1);
    $(".btn").removeClass("btn_over");
    $(".btn").addClass("btn_start");
    clearInterval(lottery_clock);
    clearInterval(ajax_clock);
    $.post("/employee/set-prize?numbers="+person.number+"&grade="+grade);
};

function refreshLucky(){
    //名单随机化
    if(emplist.length != 0){
        var luckyNum = parseInt(Math.random()*(emplist.length-1));
        person = emplist[luckyNum];
        $(".name").html(person.number+"&nbsp;&nbsp"+person.name);
    }
}

var ajaxVoice = function () {
    $.ajax({
        type : 'GET',
        url  : '/liuxiang/wechat/prizevoicestop',
        success : function (data) {
//            console.log(data);
            if(data == 'true'){
                finish();
            }
        },
        error : function () {

        }
    });
}



</script>
    
</body>
</html>