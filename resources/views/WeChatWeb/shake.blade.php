<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>摇一摇</title>
		<style type="text/css">
			*{padding:0;margin: 0}
			.shake_box {
				background: url({{ asset('images/xiaolian.png') }} ) no-repeat #1e2020 center center;
				position: fixed;
				top : 0;
				left: 0;
				width  : 100%;
				height : 100%;
			}
			.shakTop,.shakBottom {
				background: #282c2d;
				position : fixed;
				left  : 0;
				width : 100%;
				height: 50%;
			}
			.shakTop    {top    : 0;}
			.shakBottom {bottom : 0;}

			.shakTop span,.shakBottom span{
				background: url({{ asset('images/shakBox.png') }}) no-repeat;
				position : absolute;
				left: 50%;
				width : 450px;
				height: 254px;
				margin: 0 0 0 -275px;
			}
			.shakTop    span{bottom : 0;}
			.shakBottom span{
				background-position: 0 -254px;
				top : 0;
			}

			.shake_box_focus .shakTop{
				animation        : shakTop 1s 1 linear;
				-moz-animation   : shakTop 1s 1 linear;
				-webkit-animation: shakTop 1s 1 linear;
				-ms-animation    : shakTop 1s 1 linear;
				-o-animation     : shakTop 1s 1 linear;
			}
			.shake_box_focus .shakBottom{
				animation        : shakBottom 1s 1 linear;
				-moz-animation   : shakBottom 1s 1 linear;
				-webkit-animation: shakBottom 1s 1 linear;
				-ms-animation    : shakBottom 1s 1 linear;
				-o-animation     : shakBottom 1s 1 linear;
			}

			/* 向上拉动画效果 */
			@-webkit-keyframes shakTop   {
				0%   {top: 0;}
				50%  {top: -200px;}
				100% {top: 0;}
			}
			@-moz-keyframes shakTop      {
				0%   {top: 0;}
				50%  {top: -200px;}
				100% {top: 0;}
			}
			@-ms-keyframes shakTop       {
				0%   {top: 0;}
				50%  {top: -200px;}
				100% {top: 0;}
			}
			@-o-keyframes shakTop        { 
				0%   {top: 0;}
				50%  {top: -200px;}
				100% {top: 0;}
			}
			
			/* 向下拉动画效果 */
			@-webkit-keyframes shakBottom   {
				0%   {bottom: 0;}
				50%  {bottom: -200px;}
				100% {bottom: 0;}
			}
			@-moz-keyframes shakBottom      {
				0%   {bottom: 0;}
				50%  {bottom: -200px;}
				100% {bottom: 0;}
			}
			@-ms-keyframes shakBottom       {
				0%   {bottom: 0;}
				50%  {bottom: -200px;}
				100% {bottom: 0;}
			}
			@-o-keyframes shakBottom        { 
				0%   {bottom: 0;}
				50%  {bottom: -200px;}
				100% {bottom: 0;}
			}
		</style>
		
		<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
		<script type="text/javascript">

			//先判断设备是否支持HTML5摇一摇功能
			if (window.DeviceMotionEvent) {
				//获取移动速度，得到device移动时相对之前某个时间的差值比
				window.addEventListener('devicemotion', deviceMotionHandler, false);
			}else{
				alert('您好，你目前所用的设置好像不支持重力感应哦！');
			}

			//设置临界值,这个值可根据自己的需求进行设定，默认就3000也差不多了
			var shakeThreshold = 3000;
			//设置最后更新时间，用于对比
			var lastUpdate     = 0;
			//设置位置速率
			var curShakeX=curShakeY=curShakeZ=lastShakeX=lastShakeY=lastShakeZ=0;
      //摇动次数
      var shakeCount = 0;

  	  //倒计时结束后，post用户openid和摇动次数
			function shake_times(){
				var markWinnerUrl = '/user/markwinner';
		    $.post(markWinnerUrl,{
		        openid: "<?=$_REQUEST['openid']?>",
		        shakecount:"1",
						times : "1"
		    });	
			}
			function deviceMotionHandler(event){

				//获得重力加速
				var acceleration =event.accelerationIncludingGravity;

				//获得当前时间戳
				var curTime = new Date().getTime();

				if ((curTime - lastUpdate)> 100) {

					//时间差
					var diffTime = curTime -lastUpdate;
						lastUpdate = curTime;


					//x轴加速度
					curShakeX = acceleration.x;
					//y轴加速度
					curShakeY = acceleration.y;
					//z轴加速度
					curShakeZ = acceleration.z;

					var speed = Math.abs(curShakeX + curShakeY + curShakeZ - lastShakeX - lastShakeY - lastShakeZ) / diffTime * 10000;

					if (speed > shakeThreshold) {
            shakeCount++;
						//播放音效
						shakeAudio.play();
						//播放动画
						$('.shake_box').addClass('shake_box_focus');
						shake_times();
						clearTimeout(shakeTimeout);
						var shakeTimeout = setTimeout(function(){
							$('.shake_box').removeClass('shake_box_focus');
						},1000)

					}

					lastShakeX = curShakeX;
					lastShakeY = curShakeY;
					lastShakeZ = curShakeZ;
				}
			}


			//预加摇一摇声音
			var shakeAudio = new Audio();
			    shakeAudio.src = '{{ asset('sound/shake_sound.mp3') }}';
			var shake_options = {
			    preload  : 'auto'
			}
			for(var key in shake_options){
			    if(shake_options.hasOwnProperty(key) && (key in shakeAudio)){
			        shakeAudio[key] = shake_options[key];
			    }
			}
			shake_times();
		</script>
	</head>
	
	<body>
		<div class="shake_box">
			<div class="shakTop"><span></span></div>
			<div class="shakBottom"><span></span></div>
		</div>
	</body>
</html>
