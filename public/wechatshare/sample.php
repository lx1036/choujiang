<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxe662b0bb3c01df13", "de52685fa0c96c9ae166bdd3ac5dd1ec");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <style>
    html {
      -ms-text-size-adjust: 100%;
      -webkit-text-size-adjust: 100%;
      -webkit-user-select: none;
      user-select: none;
    }
    body {
      line-height: 1.6;
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      background-color: #f1f0f6;
    }
    * {
      margin: 0;
      padding: 0;
    }
    button {
      font-family: inherit;
      font-size: 100%;
      margin: 0;
      *font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    ul,
    ol {
      padding-left: 0;
      list-style-type: none;
    }
    a {
      text-decoration: none;
    }
    .label_box {
      background-color: #ffffff;
    }
    .label_item {
      padding-left: 15px;
    }
    .label_inner {
      padding-top: 10px;
      padding-bottom: 10px;
      min-height: 24px;
      position: relative;
    }
    .label_inner:before {
      content: " ";
      position: absolute;
      left: 0;
      top: 0;
      width: 200%;
      height: 1px;
      border-top: 1px solid #ededed;
      -webkit-transform-origin: 0 0;
      transform-origin: 0 0;
      -webkit-transform: scale(0.5);
      transform: scale(0.5);
      top: auto;
      bottom: -2px;
    }
    .lbox_close {
      position: relative;
    }
    .lbox_close:before {
      content: " ";
      position: absolute;
      left: 0;
      top: 0;
      width: 200%;
      height: 1px;
      border-top: 1px solid #ededed;
      -webkit-transform-origin: 0 0;
      transform-origin: 0 0;
      -webkit-transform: scale(0.5);
      transform: scale(0.5);
    }
    .lbox_close:after {
      content: " ";
      position: absolute;
      left: 0;
      top: 0;
      width: 200%;
      height: 1px;
      border-top: 1px solid #ededed;
      -webkit-transform-origin: 0 0;
      transform-origin: 0 0;
      -webkit-transform: scale(0.5);
      transform: scale(0.5);
      top: auto;
      bottom: -2px;
    }
    .lbox_close .label_item:last-child .label_inner:before {
      display: none;
    }
    .btn {
      display: block;
      margin-left: auto;
      margin-right: auto;
      padding-left: 14px;
      padding-right: 14px;
      font-size: 18px;
      text-align: center;
      text-decoration: none;
      overflow: visible;
      /*.btn_h(@btnHeight);*/
      height: 42px;
      border-radius: 5px;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      color: #ffffff;
      line-height: 42px;
      -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
    }
    .btn.btn_inline {
      display: inline-block;
    }
    .btn_primary {
      background-color: #04be02;
    }
    .btn_primary:not(.btn_disabled):visited {
      color: #ffffff;
    }
    .btn_primary:not(.btn_disabled):active {
      color: rgba(255, 255, 255, 0.9);
      background-color: #039702;
    }
    button.btn {
      width: 100%;
      border: 0;
      outline: 0;
      -webkit-appearance: none;
    }
    button.btn:focus {
      outline: 0;
    }
    .wxapi_container {
      font-size: 16px;
    }
    h1 {
      font-size: 14px;
      font-weight: 400;
      line-height: 2em;
      padding-left: 15px;
      color: #8d8c92;
    }
    .desc {
      font-size: 14px;
      font-weight: 400;
      line-height: 2em;
      color: #8d8c92;
    }
    .wxapi_index_item a {
      display: block;
      color: #3e3e3e;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }
    .wxapi_form {
      background-color: #ffffff;
      padding: 0 15px;
      margin-top: 30px;
      padding-bottom: 15px;
    }
    h3 {
      padding-top: 16px;
      margin-top: 25px;
      font-size: 16px;
      font-weight: 400;
      color: #3e3e3e;
      position: relative;
    }
    h3:first-child {
      padding-top: 15px;
    }
    h3:before {
      content: " ";
      position: absolute;
      left: 0;
      top: 0;
      width: 200%;
      height: 1px;
      border-top: 1px solid #ededed;
      -webkit-transform-origin: 0 0;
      transform-origin: 0 0;
      -webkit-transform: scale(0.5);
      transform: scale(0.5);
    }
    .btn {
      margin-bottom: 15px;
    }

  </style>
</head>
<body>
  <h3 id="menu-share">分享接口</h3>
  <span class="desc">获取“分享到朋友圈”按钮点击状态及自定义分享内容接口</span>
  <button class="btn btn_primary" id="onMenuShareTimeline">onMenuShareTimeline</button>
  <span class="desc">获取“分享给朋友”按钮点击状态及自定义分享内容接口</span>
  <button class="btn btn_primary" id="onMenuShareAppMessage">onMenuShareAppMessage</button>
  <span class="desc">获取“分享到QQ”按钮点击状态及自定义分享内容接口</span>
  <button class="btn btn_primary" id="onMenuShareQQ">onMenuShareQQ</button>
  <span class="desc">获取“分享到腾讯微博”按钮点击状态及自定义分享内容接口</span>
  <button class="btn btn_primary" id="onMenuShareWeibo">onMenuShareWeibo</button>
  <span class="desc">获取“分享到QZone”按钮点击状态及自定义分享内容接口</span>
  <button class="btn btn_primary" id="onMenuShareQZone">onMenuShareQZone</button>




  <h3 id="menu-location">地理位置接口</h3>
  <span class="desc">使用微信内置地图查看位置接口</span>
  <button class="btn btn_primary" id="openLocation">openLocation</button>
  <span class="desc">获取地理位置接口</span>
  <button class="btn btn_primary" id="getLocation">getLocation</button>
  <br>
  <span class="desc">checkJsApi</span>
  <button class="btn btn_primary" id="checkJsApi">checkJsApi</button>
  <h3 id="menu-device">设备信息接口</h3>
  <span class="desc">获取网络状态接口</span>
  <button class="btn btn_primary" id="getNetworkType">getNetworkType</button>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      'checkJsApi',
      'onMenuShareTimeline',
      'onMenuShareAppMessage',
      'onMenuShareQQ',
      'onMenuShareWeibo',
      'onMenuShareQZone',
      'hideMenuItems',
      'showMenuItems',
      'hideAllNonBaseMenuItem',
      'showAllNonBaseMenuItem',
      'translateVoice',
      'startRecord',
      'stopRecord',
      'onVoiceRecordEnd',
      'playVoice',
      'onVoicePlayEnd',
      'pauseVoice',
      'stopVoice',
      'uploadVoice',
      'downloadVoice',
      'chooseImage',
      'previewImage',
      'uploadImage',
      'downloadImage',
      'getNetworkType',
      'openLocation',
      'getLocation',
      'hideOptionMenu',
      'showOptionMenu',
      'closeWindow',
      'scanQRCode',
      'chooseWXPay',
      'openProductSpecificView',
      'addCard',
      'chooseCard',
      'openCard'
    ]
  });
  wx.ready(function () {

    document.querySelector('#checkJsApi').onclick = function () {
      wx.checkJsApi({
        jsApiList: [
          'checkJsApi',
          'onMenuShareTimeline',
          'onMenuShareAppMessage',
          'onMenuShareQQ',
          'onMenuShareWeibo',
          'onMenuShareQZone',
//          'hideMenuItems',
//          'showMenuItems',
//          'hideAllNonBaseMenuItem',
//          'showAllNonBaseMenuItem',
//          'translateVoice',
//          'startRecord',
//          'stopRecord',
//          'onVoiceRecordEnd',
//          'playVoice',
//          'onVoicePlayEnd',
//          'pauseVoice',
//          'stopVoice',
//          'uploadVoice',
//          'downloadVoice',
//          'chooseImage',
//          'previewImage',
//          'uploadImage',
//          'downloadImage',
//          'getNetworkType',
          'openLocation',
          'getLocation',
//          'hideOptionMenu',
//          'showOptionMenu',
//          'closeWindow',
//          'scanQRCode',
//          'chooseWXPay',
//          'openProductSpecificView',
//          'addCard',
//          'chooseCard',
//          'openCard'
        ], // 需要检测的JS接口列表，所有JS接口列表见附录2,
        success: function(res) {
//          alert(res);
          // 以键值对的形式返回，可用的api值true，不可用为false
          // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
        }
      });
    };


    document.querySelector('#onMenuShareAppMessage').onclick = function () {
      wx.onMenuShareAppMessage({
        title: '互联网之子',
        desc: '在长大的过程中，我才慢慢发现，我身边的所有事，别人跟我说的所有事，那些所谓本来如此，注定如此的事，它们其实没有非得如此，事情是可以改变的。更重要的是，有些事既然错了，那就该做出改变。',
        link: 'http://movie.douban.com/subject/25785114/',
        imgUrl: 'http://demo.open.weixin.qq.com/jssdk/images/p2166127561.jpg',
        trigger: function (res) {
          // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
          alert('用户点击发送给朋友');
        },
        success: function (res) {
          alert('已分享');
        },
        cancel: function (res) {
          alert('已取消');
        },
        fail: function (res) {
          alert(JSON.stringify(res));
        }
      });
      alert('已注册获取“发送给朋友”状态事件');
    };

    // 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
    document.querySelector('#onMenuShareTimeline').onclick = function () {
      wx.onMenuShareTimeline({
        title: '互联网之子',
        link: 'http://movie.douban.com/subject/25785114/',
        imgUrl: 'http://demo.open.weixin.qq.com/jssdk/images/p2166127561.jpg',
        trigger: function (res) {
          // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
          alert('用户点击分享到朋友圈');
        },
        success: function (res) {
          alert('已分享');
        },
        cancel: function (res) {
          alert('已取消');
        },
        fail: function (res) {
          alert(JSON.stringify(res));
        }
      });
      alert('已注册获取“分享到朋友圈”状态事件');
    };

    // 2.3 监听“分享到QQ”按钮点击、自定义分享内容及分享结果接口
    document.querySelector('#onMenuShareQQ').onclick = function () {
      wx.onMenuShareQQ({
        title: '互联网之子',
        desc: '在长大的过程中，我才慢慢发现，我身边的所有事，别人跟我说的所有事，那些所谓本来如此，注定如此的事，它们其实没有非得如此，事情是可以改变的。更重要的是，有些事既然错了，那就该做出改变。',
        link: 'http://movie.douban.com/subject/25785114/',
        imgUrl: 'http://img3.douban.com/view/movie_poster_cover/spst/public/p2166127561.jpg',
        trigger: function (res) {
          alert('用户点击分享到QQ');
        },
        complete: function (res) {
          alert(JSON.stringify(res));
        },
        success: function (res) {
          alert('已分享');
        },
        cancel: function (res) {
          alert('已取消');
        },
        fail: function (res) {
          alert(JSON.stringify(res));
        }
      });
      alert('已注册获取“分享到 QQ”状态事件');
    };

    // 2.4 监听“分享到微博”按钮点击、自定义分享内容及分享结果接口
    document.querySelector('#onMenuShareWeibo').onclick = function () {
      wx.onMenuShareWeibo({
        title: '互联网之子',
        desc: '在长大的过程中，我才慢慢发现，我身边的所有事，别人跟我说的所有事，那些所谓本来如此，注定如此的事，它们其实没有非得如此，事情是可以改变的。更重要的是，有些事既然错了，那就该做出改变。',
        link: 'http://movie.douban.com/subject/25785114/',
        imgUrl: 'http://img3.douban.com/view/movie_poster_cover/spst/public/p2166127561.jpg',
        trigger: function (res) {
          alert('用户点击分享到微博');
        },
        complete: function (res) {
          alert(JSON.stringify(res));
        },
        success: function (res) {
          alert('已分享');
        },
        cancel: function (res) {
          alert('已取消');
        },
        fail: function (res) {
          alert(JSON.stringify(res));
        }
      });
      alert('已注册获取“分享到微博”状态事件');
    };

    // 2.5 监听“分享到QZone”按钮点击、自定义分享内容及分享接口
    document.querySelector('#onMenuShareQZone').onclick = function () {
      wx.onMenuShareQZone({
        title: '互联网之子',
        desc: '在长大的过程中，我才慢慢发现，我身边的所有事，别人跟我说的所有事，那些所谓本来如此，注定如此的事，它们其实没有非得如此，事情是可以改变的。更重要的是，有些事既然错了，那就该做出改变。',
        link: 'http://movie.douban.com/subject/25785114/',
        imgUrl: 'http://img3.douban.com/view/movie_poster_cover/spst/public/p2166127561.jpg',
        trigger: function (res) {
          alert('用户点击分享到QZone');
        },
        complete: function (res) {
          alert(JSON.stringify(res));
        },
        success: function (res) {
          alert('已分享');
        },
        cancel: function (res) {
          alert('已取消');
        },
        fail: function (res) {
          alert(JSON.stringify(res));
        }
      });
      alert('已注册获取“分享到QZone”状态事件');
    };

    // 7 地理位置接口
    // 7.1 查看地理位置
    document.querySelector('#openLocation').onclick = function () {
      wx.openLocation({
        latitude: 23.099994,
        longitude: 113.324520,
        name: 'TIT 创意园',
        address: '广州市海珠区新港中路 397 号',
        scale: 14,
        infoUrl: 'http://weixin.qq.com'
      });
    };

    // 7.2 获取当前地理位置
    document.querySelector('#getLocation').onclick = function () {
      wx.getLocation({
        success: function (res) {
          alert(JSON.stringify(res));
        },
        cancel: function (res) {
          alert('用户拒绝授权获取地理位置');
        }
      });
    };

    var shareData = {
      title: '微信JS-SDK Demo',
      desc: '微信JS-SDK,帮助第三方为用户提供更优质的移动web服务',
      link: 'http://demo.open.weixin.qq.com/jssdk/',
      imgUrl: 'http://mmbiz.qpic.cn/mmbiz/icTdbqWNOwNRt8Qia4lv7k3M9J1SKqKCImxJCt7j9rHYicKDI45jRPBxdzdyREWnk0ia0N5TMnMfth7SdxtzMvVgXg/0'
    };
//    wx.onMenuShareAppMessage(shareData);
    wx.onMenuShareTimeline(shareData);


    // 6 设备信息接口
    // 6.1 获取当前网络状态
    document.querySelector('#getNetworkType').onclick = function () {
      wx.getNetworkType({
        success: function (res) {
          alert(res.networkType);
        },
        fail: function (res) {
          alert(JSON.stringify(res));
        }
      });
    };


  });
</script>
</html>
