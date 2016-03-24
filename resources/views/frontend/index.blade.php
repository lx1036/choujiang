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
	.content ul{width:740px;position:relative;margin:0 auto;}
	.content li{position:absolute;}
	.content li,.content li img{width:180px;height:180px;border-radius:30px;}
	.content li.p07,.content li.p07 img{width:360px;height:360px;}
	.content li.btn,.content li.btn img{width:360px;height:180px;}
	.content li.p01{top:0;left:0}
	.content li.p02{top:190px;left:0}
	.content li.p03{top:380px;left:0}
	.content li.p04{top:0;left:560px}
	.content li.p05{top:190px;left:560px;}
	.content li.p06{top:380px;left:560px;}
	.content li.p07{top:0;left:190px;}
	.content li.btn{top:380px;left:190px;}
	.content li .name{height:30px;font:bold 26px/30px "Microsoft YaHei";color:#d91c23;display:inline-block; position:absolute;bottom:2px;left:0; text-align:center;width:180px; overflow:hidden;}
	.content li.p07 .name{width:360px}
</style>
</head>

<body style="overflow-y:hidden">
	<div class="bg_top"><img src="{{ asset('images/cj_top.jpg') }}" /></div>
	<div class="content">
	  <ul id="lottery_list">
	    <li class="p01"><img src="{{ asset('images/p.jpg') }}" /></li>
	    <li class="p02"><img src="{{ asset('images/p.jpg') }}" /></li>
	    <li class="p03"><img src="{{ asset('images/p.jpg') }}" /></li>
	    <li class="p04"><img src="{{ asset('images/p.jpg') }}" /></li>
	    <li class="p05"><img src="{{ asset('images/p.jpg') }}" /></li>
	    <li class="p06"><img src="{{ asset('images/p.jpg') }}" /></li>
	    <li class="p07"><img src="{{ asset('images/p.jpg') }}" /></li>
	    <li class="btn"><a href="javascript:begin_lottery()"><img src="{{ asset('images/cj_btn.jpg') }}" /></a></li>
	  </ul>
	</div>
        <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://apps.bdimg.com/libs/bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/lottery.js') }}"></script>
        <!--script src="{{ asset('js/animate.js') }}"></script-->
</body>
</html>
