<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="no" name="apple-mobile-web-app-capable">
    <meta http-equiv="Cache-Control" content="no-cache">
    <title>抽奖</title>
    <link href="/css/cj.css" rel="stylesheet" type="text/css">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
</head>

<body class="{!! $prize_title !!}" grade="{!! $prize_title !!}">
    <div class="bg_sd">
        <a href="#" class="btn btn01" id="start">抽奖</a>
        {{--<a href="#" class="btn btn01_hover" id="end" style="display: none;">停止</a>--}}
        <ul>
            @for($i=0; $i<50; $i++)
                <li>猴子君</li>
            @endfor
        </ul>
    </div>
<script type="text/javascript">
    var emplist = '';
    var ids;
    var clock, ajax_clock;
    var luckylist;
    var btnswitch = 0;
    $('#start').on('click', function () {
        if($(this).hasClass('btn01')){
            var tmp = luckyBookOrLuckyPerson();
            if(tmp == 'LuckyBook'){
                getJsonLuckyBooks();
            }else if(tmp == 'LuckyPerson'){
                getJsonLuckyPerson();
            }
            start();
            ajax_clock = setInterval(ajaxVoice, 3000);
        }else if($(this).hasClass('btn01_hover')){
            finish();
        }
    });

//    $(selector).keydown(function(event){
//        var key_code = event.keyCode;
//        if (key_code==13)
//        {
//            xxxxxx();
//        }
//    });

    $('#start').on('keydown', function (event) {
        if($(this).hasClass('btn01')){
            var tmp = luckyBookOrLuckyPerson();
            if(tmp == 'LuckyBook'){
                getJsonLuckyBooks();
            }else if(tmp == 'LuckyPerson'){
                getJsonLuckyPerson();
            }
            if(event.keyCode == 13){
                start();
            }
            ajax_clock = setInterval(ajaxVoice, 3000);
        }else if($(this).hasClass('btn01_hover')){
            if(event.keyCode == 13){
//                start();
                finish();
            }
//            finish();
        }
    });

//    $("#start").click(function () {
//        if(btnswitch==0){
//            $(this).removeClass("btn_01");
//            $(this).addClass("btn01_hover");
//            clock = setInterval(refreshLuckyList, 10);
//            btnswitch = 1-btnswitch;
//        }else if(btnswitch==1){
//            $(this).removeClass("btn01_hover");
//            $(this).addClass("btn_01");
//            clearInterval(clock);
//            ids = luckylist.map(function (datai) {
//                return datai['id'];
//            });
//            btnswitch = 1-btnswitch;
//            updatedb();
//        }
//    });
    var luckyBookOrLuckyPerson = function () {
        var grade = $('body').attr('grade');
        if(grade == 'bg_sd50'){
            return 'LuckyBook';
        }
        return 'LuckyPerson';
    };

    var start  = function () {
        $("#start").removeClass("btn01");
        $("#start").addClass("btn01_hover");
        clock = setInterval(refreshLuckyList,10);
    };
    var finish = function () {
        $("#start").removeClass("btn01_hover");
        $("#start").addClass("btn01");
        clearInterval(clock);
        clearInterval(ajax_clock);
        ids = luckylist.map(function (datai) {
            return datai['id'];
        });
        var tmp = luckyBookOrLuckyPerson();
        if(tmp == 'LuckyBook'){
            updateDBLuckyBooks();
        }else if(tmp == 'LuckyPerson'){
            updateDBLuckyPerson();
        }
    };
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
    };

    function refreshLuckyList(){
        //随机打散
        var shuffled = emplist.sort(function () {
            return Math.random() > .5 ? -1 : 1;
        });
        luckylist = emplist.slice(0,50);
//        var i=0;
        var lis = '';
        for(var i=0;i<50;i++){
            lis += '<li>'+shuffled[i].name+'&nbsp;'+shuffled[i].number+'</li>';
        }
        $(".bg_sd ul").html(lis);
    }

    //从数据库luckybooks中获取所有
    function getJsonLuckyBooks() {
        $.ajax({
            url: "/employee/luckybooklist",
            type: "GET",
            dataType: "json",
            async: true,
            success: function (data) {
                emplist = data;
            }
        });
    }

    var getJsonLuckyPerson = function () {
        $.getJSON("/employee", function (data) {
            emplist = data;
//        console.log(emplist.length);
        });
    };

    //更新数据库luckybooks
    function updateDBLuckyBooks() {
//        console.log(ids);
        //设置is_delete为2
        $.ajax({
            url: "/employee/setluckybooklist",
            type: "POST",
            data: {"ids": ids},
            dataType: "json",
            async: true,
            success: function (data) {
//                console.log(data);
            },
            error: function () {
//                console.log('error');
            }
        });
    }

    function updateDBLuckyPerson() {
        var grade = luckyBookOrLuckyPerson();
//        console.log(ids,grade);
        $.ajax({
            url: "/employee/set-prize",
            type: "POST",
            data: {"numbers": ids, "grade": grade},
            dataType: "json",
            async: true,
            success: function (data) {
//                console.log(data);
            },
            error: function () {
//                console.log('error');
            }
        });
//        console.log(tmp);
//        $.post("/employee/set-prize?numbers="+ids+"&grade="+grade);
    }
</script>
</body>
</html>
