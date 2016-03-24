<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>当当2016年会</title>
        <!-- 新 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        {{--<link href="//cdn.bootcss.com/emojify.js/0.9.5/emojify.min.css" rel="stylesheet">--}}

        <style>
            {{--body,html,div,p,ul,li{--}}
                {{--margin:0;--}}
                {{--padding: 0;--}}
                {{--background: url("{!! asset('/images/liuxiang/wechat_wall/bg.jpg') !!}");--}}
            {{--}--}}
            {{--ul{--}}
                {{--list-style: none;--}}
            {{--}--}}
            {{--body,html{--}}
                {{--width:100%;--}}
                {{--height: 100%;--}}
                {{--background: url("bg3.jpg");--}}
                {{---webkit-background-size:cover;--}}
                {{--background-size:cover;--}}
            {{--}--}}
            {{--.out_content{--}}
                {{--position: relative;--}}
                {{--height: 100%;--}}
            {{--}--}}
            {{--h1{--}}
                {{--text-align: center;--}}
                {{--height: 60px;--}}
                {{--line-height: 60px;--}}
            {{--}--}}
            {{--.inner_content{--}}
                {{--width: 100%;--}}
                {{--position: absolute;--}}
                {{--top: 60px;--}}
                {{--bottom: 0;--}}
            {{--}--}}
            {{--.inner_content ul{--}}
                {{--width: 100%;--}}
                {{--height: 100%;--}}
                {{--overflow: hidden;--}}
            {{--}--}}
            {{--.inner_content ul li{--}}
                {{--width: 96%;--}}
                {{--height: 150px;--}}
                {{--margin-bottom:10px;--}}
                {{--border:solid 1px #11c900;--}}
                /*background-color: rgba(0,0,0,0.2);*/
                {{--border-radius: 20px;--}}
                {{--margin-left:2%;--}}
                {{--position: relative;--}}
            {{--}--}}
            {{--.inner_content ul li .content_left{--}}
                {{--position: absolute;--}}
                {{--width:240px;--}}
                {{--border-right:dashed 2px #eea236;--}}
                {{--text-align: center;--}}
                {{--height:100%;--}}
            {{--}--}}
            {{--.nickname{--}}
                {{--position: absolute;--}}
                {{--height: 30px;--}}
                {{--left: 0;--}}
                {{--top:10px;--}}
                {{--font-size: 28px;--}}
                {{--width:100%;--}}
                {{--text-align: center;--}}
                {{--display: inline-block;--}}
            {{--}--}}
            {{--.content_left .img_div{--}}
                {{--position: absolute;--}}
                {{--top: 45px;--}}
                {{--bottom: 15px;--}}
                {{--left:70px;--}}
                {{--width:100px;--}}
                {{--height: 100px;--}}
            {{--}--}}
            {{--.img_div img{--}}
                {{--height: 100%;--}}
                {{---webkit-border-radius:10px;--}}
                {{---moz-border-radius:10px;--}}
                {{---webkit-border-radius: 10px;--}}
                {{---moz-border-radius: 10px;--}}
                {{--border-radius: 10px;--}}
            {{--}--}}
            {{--.content{--}}
                {{--font-size: 35px;--}}
                {{--position: absolute;--}}
                {{--left: 260px;--}}
                {{--right: 15px;--}}
                {{--top: 18px;--}}
                {{--bottom: 18px;--}}
                {{--overflow: hidden;--}}
                {{--display: inline-block;--}}
            {{--}--}}
            /*男*/
            {{--.gender_1 .content_left{--}}
                /*background: #eea236;*/
{{--                background: url("{!! asset('/images/liuxiang/wechat_wall/boy.jpg') !!}") no-repeat;--}}
            {{--}--}}
            {{--.gender_1 .content_right{--}}
                /*background: #2e6da4;*/
                {{--background: url("{!! asset('/images/liuxiang/wechat_wall/boy_middle.jpg') !!}") repeat-x;--}}
            {{--}--}}
            /*女*/
            {{--.gender_2 .gender_0{--}}

            {{--}--}}

            /*#wechat_wall{ height: 90%; width: 90%;  margin:5%; }*/
            /*#wechat_wall li{ width:100%; height:23%; margin-bottom:2%; border:solid 1px #EEEEEE;position: relative;}*/
            /*#wechat_wall li .nickname{ position: absolute; width:20%; height:25%;left: 0; top:0;}*/
            /*#wechat_wall li img{ position: absolute; width:100px; height:65%;left: 0; top:;}*/



            @charset "utf-8";
            * {-webkit-text-size-adjust:none;-webkit-tap-highlight-color:rgba(0,0,0,0);}
            body,button,dd,dl,dt,fieldset,form,h1,h2,h3,h4,h5,h6,input,legend,li,ol,p,select,table,td,textarea,th,ul {margin: 0;padding: 0}
            fieldset, img {border:0 none;}
            ul, li{overflow: hidden;}
            ol, ul, li {list-style-type:none;height: 620px;}
            button{cursor:pointer}
            html { font-size: 14px;}
            body{min-height:320px;font-size:14px;font-family:'microsoft yahei',Verdana,Arial,Helvetica,sans-serif;color:#323232;-webkit-text-size-adjust: none; background-color: #fafafa;}
            .bg{ background:url('{!! asset('images/wechat/bg_sq.jpg') !!}'); height:100%;overflow: hidden;}
            .title{ max-width:1200px; margin:0 auto; text-align:center;}
            .title img{width:100%;}
            .sq{max-width:1200px; margin:0 auto;}
            .sq li{height:155px;position:relative;padding:5px 1% 20px 180px;font:30px/48px 'Microsoft YaHei';}
            .sq .pic{ position:absolute;top:6px;left:40px;width:100px;height:100px;}
            .sq .pic img{ width:100px;height:100px;border-radius:10px;}
            .sq .name{ position:absolute;top:115px;color:#fff;width:180px; text-align:center;font:30px/40px 'Microsoft YaHei';left:0; overflow:hidden;white-space: nowrap;text-overflow: ellipsis;height:40px;}
            .sq .txt{display:block;padding:5px 30px 5px 50px;border-radius:10px;max-height: 150px;overflow: hidden; float:left;}
            .sq .txt i{ display:block;width:16px;height:36px; overflow:hidden; background-repeat:no-repeat; position:absolute;top:13px;left:165px}
            .sq .txt_girl{ background-color:#7bec7b;font-size: -webkit-xxx-large;}
            .sq .txt_boy{ background-color:#fff;font-size: -webkit-xxx-large;}
            .sq .txt_girl i{background-image:url('{!! asset('images/wechat/j_01.png') !!}');}
            .sq .txt_boy i{background-image:url('{!! asset('images/wechat/j_02.png') !!}');}
            .pic_bg01{display:block;width:105px; height:126px; position:fixed;right:10px;bottom:0;}
            .pic_bg02{display:block;width:94px; height:108px; position:fixed;left:0;bottom:0;}

            /*.sq li .name{ position:absolute;top:115px;color:#fff;width:180px; text-align:center;font:30px/40px 'Microsoft YaHei';left:0; overflow:hidden;white-space: nowrap;text-overflow: ellipsis;height:40px;}*/
            /*.sq li .txt{display:block;padding:2px 30px 5px 50px;border-radius:10px; float:left;}*/
        </style>
    </head>
    <body class="bg">
        <div class="title"><img src="{!! asset('images/wechat/pic_sq.jpg') !!}"></div>
        <div class="pic_bg01"><img src="{!! asset('images/wechat/pic_01.png') !!}"></div>
        <div class="pic_bg02"><img src="{!! asset('images/wechat/pic_02.png') !!}"></div>
        <ul id="wechat_wall" class="sq">
            {{--<li>--}}
                {{--<span class="pic">--}}
                    {{--<img src="{!! asset('images/wechat/ren.jpg') !!}">--}}
                {{--</span>--}}
                {{--<span class="name">--}}
                    {{--一二三--}}
                {{--</span>--}}
                {{--<span class="txt txt_girl">--}}
                    {{--<i></i>--}}
                    {{--你这是冷知识大比拼啊，可能也只有我这种无聊的人研究出来了。第一种就是普通发文字，这个你肯定明白。关键第二种是怎么发的，需要点击--}}
                {{--</span>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<span class="pic">--}}
                    {{--<img src="{!! asset('images/wechat/ren.jpg') !!}">--}}
                {{--</span>--}}
                {{--<span class="name">--}}
                    {{--一二三四五--}}
                {{--</span>--}}
                {{--<span class="txt txt_boy">--}}
                    {{--<i></i>--}}
                    {{--关键第二种是怎么发的，需要点击进去。--}}
                {{--</span>--}}
            {{--</li>--}}
{{--            <p><span class="pic"><img src="{!! asset('images/wechat/ren.jpg') !!}"></span><span class="name">一二三四五</span><span class="txt txt_boy"><i></i>关键第二种是怎么发的，需要点击进去。</span></p>--}}
{{--            <p><span class="pic"><img src="{!! asset('images/wechat/ren.jpg') !!}"></span><span class="name">一二三四五</span><span class="txt txt_boy"><i></i>关键第二种是怎么发的，需要点击进去。</span></p>--}}
        </ul>
        {{--<div class="sq">--}}
              {{--</div>--}}
        {{--<div class="out_content">--}}
            {{--<img src="{!! asset('/images/liuxiang/wechat_wall_banner.jpg') !!}" style="width: 90%;height: 10%;">--}}
            {{--<div class="inner_content">--}}
                {{--<h1>微信上墙</h1>--}}
                {{--<ul id="wechat_wall">--}}

                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}

        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        {{--<script src="//cdn.bootcss.com/emojify.js/0.9.5/emojify.js"></script>--}}
        <script>
//            emojify.setConfig({
//                emojify_tag_type : 'div',           // Only run emojify.js on this element
//                only_crawl_id    : null,            // Use to restrict where emojify.js applies
//                img_dir          : 'http://www.emoji-cheat-sheet.com/graphics/emojis',  // Directory for emoji images
//                ignored_tags     : {                // Ignore the following tags
//                    'SCRIPT'  : 1,
//                    'TEXTAREA': 1,
//                    'A'       : 1,
//                    'PRE'     : 1,
//                    'CODE'    : 1
//                }
//            });
//            emojify.run();

            var id = 1;
            var update_message = function(){
                $.ajax({
                    type     : 'GET',
                    url      : '/liuxiang/wechat/ajaxwall?id=' + id,
                    success  : function (data) {
//                        console.log(id);
                        if (data.length != 0){
//                            console.log('data:'+data.length);
                            id += 1;
                            $('#wechat_wall').append(data);
//                            console.log($('ul > li').length);
//                            if ($('ul > li').length === 4){
//                                update_message();
////                                solidTop();
//                            }
                        }
                    },
                    error   : function(){
//                        console.log('error');
                    }
                });
            };
            var clearli = function () {
//                console.log($('ul > li').length);
                if ($('ul > li').length > 4){
                    solidTop();
                }
            };
            function solidTop(){
                var oDiv = $("#wechat_wall li:first-child");
                $("#wechat_wall li").animate({top:"-160px"},1000,function(){
//                    oDiv.hide('slow');
                    $("#wechat_wall li").css("top",2);
                    oDiv.remove();
                });
            }

            setInterval(clearli, 2000);
            setInterval(update_message, 3000);
        </script>
    </body>
</html>