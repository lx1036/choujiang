<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>抽奖</title>
<style type="text/css">
	body{ margin:0;padding:0;}
	ul,li,p{ margin:0;padding:0; list-style:none;}
	.bg_top{width:100%; background-color:#fdd840;}
	.bg_top img{width:100%;max-width:960px; margin:0 auto;display:block;}
	.content{width:100%;height:860px;padding:15px 0;background:#d91c23 url({{ asset('images/cj_bg.jpg') }}) no-repeat center 0;}
	.content .bg ul{width:740px;position:relative;margin:0 auto;}
	.content .bg { margin-left: auto; margin-right: auto; width:360px; height:390px; background:#FC9; -moz-border-radius: 15px; -webkit-border-radius: 15px; border-radius:15px; }
	.bg li{position:absolute;}
	.bg li,.content li img{width:180px;height:180px;border-radius:30px;}
	.bg li{font-size:30px; text-align:center;width:360px;}
	.bg li.btn,.content li.btn img{width:360px;height:180px;}
	.bg li.p01{top:0px;}
	.bg li.p02{top:50px;}
	.bg li.p03{top:100px;}
	.bg li.p04{top:150px;font-size:80px;color:red;}
	.bg li.p05{top:250px;}
	.bg li.p06{top:300px;}
	.bg li.p07{top:350px;}
	.bg li.btn{top:400px;}
	.bg li .name{height:30px;font:bold 26px/30px "Microsoft YaHei";color:#d91c23;display:inline-block; position:absolute;bottom:2px;left:0; text-align:center;width:180px; overflow:hidden;}
</style>
</head>

<body style="overflow-y:hidden">
	<div class="bg_top"><img src="{{ asset('images/cj_top.jpg') }}" /></div>
	<div class="content">
		<div class="bg">
	  <ul id="lottery_list">
	    <li class="p01">张三丰</li>
	    <li class="p02">张三丰</li>
	    <li class="p03">张三丰</li>
	    <li class="p04">张三丰</li>
	    <li class="p05">张三丰</li>
	    <li class="p06">张三丰</li>
	    <li class="p07">张三丰</li>
	    <li class="btn"><a href="javascript:begin_lottery()"><img src="{{ asset('images/cj_btn.jpg') }}" /></a></li>
	  </ul>
		</div>
	</div>
  <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://apps.bdimg.com/libs/bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <script src="{{asset('js/frontend/special_lottery.js')}}"></script>
</body>
</html>
