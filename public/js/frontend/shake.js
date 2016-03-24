!(function($){		
	//设置右侧行高
	$("#right .row").not('.title').not('.secret').height($("#img_width").width() + 10);
	
	var interval_id;
	var time = 12000;

	$("#begin_count_down").on("click",function(){
		$("#count_down").show();
		$("#begin_count_down").hide();
		// 更新 时间
		interval_id = setInterval(count_down, 10);
	});

	// 设置时间
	function count_down(){
		if (time <= 0){
			clearInterval(interval_id);
		}
		var ms = time % 100;
		times = parseInt((time - ms)/100);
		s = times % 60;
		m = (times - s) / 60;
		time -= 1;
		$("#count_down_time").text(num2str(m) + ":" + num2str(s) + ":" + num2str(ms,2));
	}
	function num2str(num, len){
		if (arguments.length == 1){
			len = 2;
		}
		var txtnum = num.toString();
		var zeros = "00000";
		len = len - txtnum.length;
		return zeros.substring(0,len) + txtnum;
	}
	function update_top(){
		$.get('', function(data){
			$.each(data, function(){
				for (var i = 1; i <= 3; i++){
					var row = $("#right > div:eq(" + i + ")");
					$(row).child("img").attr('src', data[i - 1].headimgUrl);
					$(row).children('p')[0].text(data[i - 1].nickname);
					$(row).children('p')[1].text(data[i - 1].shakecount + "次");
				}
			});
			
		});
	}
	
})(window.jQuery);
