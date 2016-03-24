<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<title>摇一摇-大屏幕</title>
		<style>
			body{ margin:0;padding:0;}
			ul,li,p{ margin:0;padding:0; list-style:none;}
			.bg_top{width:100%; background-color:#fdd840;}
			.bg_top img{width:100%;max-width:960px; margin:0 auto;display:block;}
			.content{width:100%;height:860px;padding:15px 0;background:#d91c23 url({{ asset('images/cj_bg.jpg') }}) no-repeat center 0;}
			.time{ width:70%; height:600px; position:relative; margin:0 auto; display:block; float:left; }
			.time span{ top:250px; text-align: center; position:relative; font-size:50px; display:block; }
			.time span b{ font-size:80px; font-family:cursive; }
			.time img{ width: 200px;  cursor:pointer;}
			.right{ width:30%; height:600px; position:relative; margin:0 auto; display:block; float:right; }
			.right .row { width:100%; position:relative; }
			.right .title{ text-align: center; font-size:30px; padding-bottom:20px; }
			.right .secret{ width:100%; height:100px; font-size:40px; padding-top:30px;}
			.right div img{ width:30%; float:left; }
			.right div p{ width:68%; float:right; font-size:30px; }
	
			.row .info { left-padding:10px; }
			.row .times { font-family:cursive; padding-top:20px; }
			.begin_lottery{
				width:200px;
				text-align:center;
				position:relative;
				display:block;
				top:250px;
			}
		</style>
	</head>
	<body style="overflow-y:hidden">
		<div class="bg_top"><img src="{{asset('images/cj_top.jpg')}}" /> </div>
	<div class="content">
		<div class="time">
			<span style="display:none" id="count_down">倒计时:<b id="count_down_time">03:00:00</b></span>
			<span >
				<a src="javascript:;" id="begin_count_down"> <img src="{{ asset('images/cj_btn.jpg') }}"/> </a>
			</span>
		</div>
		<div class="right" id="right">
			<div class="row title"> 摇一摇排行榜 </div>
			<div class="row">
				<img src="{{asset('images/p.jpg')}}" id="img_width"/>
				<p>王朝</p>
				<p class="times">1234次</p>
			</div>
			<div class="row">
				<img src="{{asset('images/p.jpg')}}"/>
				<div class="info">
					<p>马汉</p>
					<p class="times">1234次</p>
				</div>
			</div>
			<div class="row">
				<img src="{{asset('images/p.jpg')}}"/>
				<div class="info">
					<p>马汉</p>
					<p class="times">1234次</p>
				</div>
			</div>
			<div class="row secret">
					回复：大爱当当
			</div>
		</div>
	</div>
  <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="{{ asset('js/frontend/shake.js') }}"> </script>
	</body>
</html>
