<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>幸运奖抽奖</title>
        <!-- 新 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="/css/cj.css" rel="stylesheet" type="text/css">

        <style>

        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <table class="table table-hover" id="lucky_list">
                        <thead>
                        <tr>
                            <th>
                                50个幸运奖
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //打印n行n列
                        $color = ['','success','error','warning','info'];
                        $m = 5;$n = 10;
                        for($i=0;$i<$m;$i++)
                        {
                        ?> <tr class=<?=$color[$i%5]?> > <?php
                            for($j=0;$j<$n;$j++)
                            {
                            ?> <td>当当</td> <?php
                            }
                            ?> </tr> <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <button id="start" class="btn" type="button">开始</button>
                    <button id="end" class="btn" type="button">结束</button>
                </div>
            </div>
        </div>

        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>
            var emplist = null;

            var tds = 50;
            var clock;
            var luckylist = null;
            var ids;

            //
            //$('#start').on('click', function () {
            //
            //});


            $("#start").click(function(){
                clock = setInterval("filltable(tds)",50);
            });
            $("#end").click(function(){
                clearInterval(clock);
                var len = luckylist.length;
                var ids = luckylist.map(function(datai){ return datai['id'];});

//    $.post("/employee/set-prize?numbers="+person.number+"&grade="+grade);
                //设置wintimes为-1
                $.ajax({
                    url: "/setlucky",
                    type: "POST",
//         data: ids=ids,
                    dataType: "json",
                    async: false,
                    success: function (data) {
                    }
                });
            });

            var getJson = function () {
                $.ajax({
                    url: "/employee",
                    type: "GET",
                    dataType: "json",
                    async: false,
                    success: function (data) {
                        emplist = data;
                    }
                });
//    $.getJSON("/employee", function (data) {
//        emplist = data;
////        console.log(emplist.length);
//    });
            };
            //n=50
            function filltable(n)
            {
                //随机打散
                var shuffled = emplist.sort(function(){
                    return Math.random() > .5 ? -1:1;
                });
                luckylist = shuffled.slice(0,n);//随机选取50
                //填充表格
                var m = 5;
                var l = 10;
                for(var i=0;i<m;i++)
                {
                    for(var j=0;j<l;j++)
                    {
                        cur = j+i*l;
                        $("#lucky_list td").eq(cur).html(luckylist[cur].name);
                    }
                }
            }
        </script>
    </body>
</html>