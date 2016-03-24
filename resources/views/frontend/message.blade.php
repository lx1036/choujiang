<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言</title>
<!--link type="text/css" rel="stylesheet" href="web/css/wechatface.css"/-->
<style type="text/css">
	body{ margin:0;padding:0;}
	ul,li,p{ margin:0;padding:0; list-style:none;}
	.list_top{background-color:#dc1326;}
	.list_top img{width:960px;margin:0 auto;display:block;}
	.list_bottom img{width:800px;margin:0 auto;display:block;}
	
	.list_bottom{width:100%; background-color:#fae7c4;}
	.list{width:100%; background-color:#fae7c4;}
	.list ul{width:1200px; margin:0 auto;height:400px;}
	.list ul li{padding:30px 0 0;zoom:1;}
	.list ul li .b{position:relative;border:3px solid #d91c23;display:inline-block;border-radius:150px;min-height:72px;font:bold 40px/40px "Microsoft YaHei";color:#d91c23;}
	.list ul li.left{ text-align:left;}
	.list ul li.right{text-align:right;}
	.list ul li .b .pic{ position:absolute;display:inline-block;width:90px;height:90px;overflow:hidden;border:8px solid #d91c23;border-radius:100px;top:-16px;}
	.list ul li .b .pic img{width:90px;height:90px;}
	.list ul li.left .b{padding:8px 35px 0 60px;}
	.list ul li.right .b{padding:8px 60px 0 35px;}
	.list ul li.left .b .pic{left:-45px;}
	.list ul li.right .b .pic{right:-45px;}
	.list ul li i{ display:inline-block;width:40px;height:37px; position:absolute;top:-21px; background:url(heart.png) no-repeat 0 0;}
	.list ul li.left i{right:13px;}
	.list ul li.right i{left:13px;}
	
</style>
</head>

<body style="overflow:hidden">
<div class="list_top"><img src="{{asset('images/msg_top.jpg')}}" /></div>
<div class="list">
  <ul id="new_message">
  </ul>
</div>
<div class="list_bottom"><img src="{{asset('images/msg_bottom.jpg')}}" /></div>
        <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://apps.bdimg.com/libs/bootstrap/2.3.2/js/bootstrap.min.js"></script>
				<!--script src="web/js/wechatface.js"></script-->
        <script src="{{asset('js/chat.js')}}"></script>
</body>
</html>
