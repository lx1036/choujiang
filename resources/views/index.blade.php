<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://cdn.bootcss.com/bootstrap/2.2.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://www.bootcss.com/p/layoutit/css/bootstrap-combined.min.css" rel="stylesheet">
        <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://www.bootcss.com/p/layoutit/js/bootstrap.min.js"></script>
    </head>

    <body>

        <style type="text/css">
            body{
                overflow: hidden;
            }
            iframe{
                width: 100%;
                height: 100%;
            }
            .carousel-indicators{
                display: none;
            }
            .container-fluid{
                padding: 0;
            }
            .carousel-control{
                top:20px;
            }
        </style>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="carousel slide" id="carousel-341764" data-interval="false">
<!--                        <ol class="carousel-indicators">
                            <li class="active" data-slide-to="0" data-target="#carousel-341764">
                            </li>
                            <li data-slide-to="1" data-target="#carousel-341764">
                            </li>
                            <li data-slide-to="2" data-target="#carousel-341764">
                            </li>
                        </ol>-->
                        <div class="carousel-inner">
                        </div> <a data-slide="prev" href="#carousel-341764" class="left carousel-control">‹</a> <a data-slide="next" href="#carousel-341764" class="right carousel-control">›</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
<script type="text/javascript">
(function($){
//异步加载
var data =[
//    {"src":"http://choujiang.chinacloudapp.cn/bubble", "h4":"大头照多彩气泡", "p":"关注文化当当后，发送你的靓照就会出现在多彩气泡中。"},
    {"src":"http://choujiang.chinacloudapp.cn/prize/lucky-book", "h4":"幸运书单奖", "p":"从全体员工中随机抽取50名幸运奖中奖名单，点击开始名单开始滚动，点击结束停止滚动，抽出中奖列表；本次中奖者仍然有资格进行后续抽奖。"},
    {"src":"http://choujiang.chinacloudapp.cn/prize/three-prize", "h4":"微信抽奖三等奖", "p":"关注“文化当当”微信公众号，回复关键字参与手机“摇一摇”抽奖活动。"},
    {"src":"http://choujiang.chinacloudapp.cn/prize/two-prize", "h4":"微信抽奖二等奖", "p":"关注“文化当当”微信公众号，回复关键字参与手机“摇一摇”抽奖活动。"},
    {"src":"http://choujiang.chinacloudapp.cn/prize/one-prize", "h4":"微信抽奖一等奖", "p":"关注“文化当当”微信公众号，回复关键字参与手机“摇一摇”抽奖活动。"},
    {"src":"http://choujiang.chinacloudapp.cn/prize/special-prize", "h4":"特等奖抽奖规则", "p":"全体员工自动参与抽奖，已获得一二三等奖者不再参与特等奖抽取。"},
    {"src":"http://choujiang.chinacloudapp.cn/prize/lucky-prize", "h4":"150个幸运奖抽奖规则", "p":"全体员工自动参与抽奖，已获得一二三特等奖者不再参与特等奖抽取。"},
//    {"src":"http://choujiang.chinacloudapp.cn/frontend/message", "h4":"", "p":""},
    {"src":"http://choujiang.chinacloudapp.cn/liuxiang/button/chart", "h4":"", "p":""},
];
$.each(data,function(i){
    var pagedom = '<div class="item" ><iframe name=frame1 marginwidth=0 marginheight=0 frameborder=0 noresize scrolling=no></iframe>'
//                        +'<div class="carousel-caption"><h4> '+data[i]["h4"]+'</h4><p>'+data[i]["p"]+'</p></div>'
                        + '</div>';
    $(".carousel-inner").append(pagedom);
});
var cur = 0;
var end = data.length-1;
$(".carousel-inner .item:eq("+cur+") iframe").attr({"src":data[cur]["src"]});
$(".carousel-inner .item:eq(6) iframe").attr({"src":data[6]["src"]});
$(".carousel-inner .item:eq("+cur+")").addClass("active");
$(".carousel-control").click(function(){
    if($(this).hasClass("left")){
        cur = cur == 0 ? end:cur-1;
    }else if($(this).hasClass("right")){
        cur = cur == end ? 0:cur+1;
    }
    var $page = $(".carousel-inner .item:eq("+cur+") iframe");
    if($page.attr("src") === undefined ){
        $page.attr("src",data[cur]["src"]);
    }
});
//$(".carousel-control").on("click",function(){
//    $(".carousel-inner .item").each(function(i,page){
//        $page = $(page);
//        if($page.hasClass("active")){
//           $frame = $(".carousel-inner .active").next().find("iframe"); 
//           if($frame && $frame.attr("src") === undefined){
//                $frame.attr("src",data[i+1]["src"]);
//            }
//        }
//    });
//});
})(window.jQuery);
</script>