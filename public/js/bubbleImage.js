var volume = 18;//屏幕最大可容纳泡泡数
var bubbleInterval = 500;//泡泡发射时间间隔
var lastMaxId = 0;//上次最大id号
var headImgUrlArr;//图片数组
var i;
var MAX = 0;//本次ajax请求图片数
var lastMax = 0;//上次ajax请求图片数
refresh();
//上一次泡泡未生成完，就获取到下一批泡泡怎么办？每一次必须生成完才进行下一次请求
function refresh() {
    $.ajax({
        url: "/msg/newimagemsgs",
        type: "GET",
        data: "id=" + lastMaxId,
        dataType: "json",
//      timeout: "3",
        async: true,
        success: function (data) {
            var interval = 1000;
            var len = data.length;
            if (len) {
                headImgUrlArr = [];
                lastMaxId = data[len-1]['id'];
                headImgUrlArr = data.map(function(datai){ return datai['pic_url'];});
                i = -1;
                lastMax = MAX;
                MAX = len;
                Demo('');
            }
            interval = lastMax == 0 ? 1000 : lastMax * bubbleInterval;
            setTimeout(function () {
                refresh();
            }, interval);
        }
    });
}

function Demo(url)
{
    var body = document.getElementsByTagName("body")[0];
    var bubbles = body.children;
    var bubCntNow = bubbles.length;
    if (++i <= MAX) {
        if (url != '') {
            if(bubCntNow>volume){
                  body.removeChild(bubbles[0]);
            }
            CreateBubble(url);
        }
        setTimeout("Demo(headImgUrlArr[i])", bubbleInterval); //demo没有引号时所有气泡一起产生，时间不生效
    }
}