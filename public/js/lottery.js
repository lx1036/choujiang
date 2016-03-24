!(function($){
	li_data = new Array();
	cur_data = new Array();
	winner = new Array();
	is_start = false;

	lottery_last_count = parseInt($("#lottery_last_count").text());

	interval_idx = 0;
	function show_data(){
		max_show_count = 7;
		var lottery_list = '';
		if (cur_data.length == 0){
			while(cur_data.length < max_show_count && cur_data.length != li_data.length){
				var tmp = li_data[rand(li_data.length - 1)];
				
				var in_array = false;
				for (var i = 0; i < cur_data.length; i++){
					if (cur_data[i].openid == tmp.openid){
						in_array = true;
						break;
					}
				}
				if (in_array == false){
					cur_data.push(tmp);
				}
			}
		}else{
			if (li_data.length > max_show_count){
				cur_data.shift();			
				while(cur_data.length < max_show_count){
					var tmp = li_data[rand(li_data.length - 1)];
					var in_array = false;
					for (var i = 0; i < cur_data.length; i++){
						if (cur_data[i].openid == tmp.openid){
							in_array = true;
							break;
						}
					}
					if (in_array == false){
						cur_data.push(tmp);
					}
				}
			}
		}
		var lottery_list = '';
		for(var i = 0; i < max_show_count && i < cur_data.length; i++){
			if (cur_data[i].headimgurl == ''){
				cur_data[i].headimgurl = 'images/p.jpg';
			}
			lottery_list += '<li openid="' + cur_data[i].openid + '" class="p0' + (i + 1) 
				+ '"> <img src="' + cur_data[i].headimgurl 
				+ '"/><span class="name">' 
				+ cur_data[i].nickname + '</span></li>';
		}
		$("#lottery_list > li:lt(7)").remove();
		$("#lottery_list").prepend(lottery_list);
		//$("#lottery_list").html(lottery_list);
	}
	function rand(y){
		x = 0;
		return parseInt(Math.random()*(y - x + 1) + x);
	}

	begin_lottery = function (){
		if (is_start == true) {
			end_lottery();
			return;
		}
		$("#lottery_list > li:eq(7) > a > img").attr("src", '/images/stop.jpg');
		is_start = true;
		if (lottery_last_count <= 0){ return ; }
		var url = '/user';
		$.getJSON(url, function(data){
			li_data = data;
			show_data();
			interval_idx = setInterval(show_data,100);
		});
	}

	end_lottery = function(){
		$("#lottery_list > li:eq(7) > a > img").attr("src", '/images/cj_btn.jpg');
		is_start = false;
		clearInterval(interval_idx);
		update_winner_list();
	}

	// +++++
	$(document).on("click","#end_lottery", function(){
		$("#begin_lottery").show();
		$("#end_lottery").hide();
		clearInterval(interval_idx);
		update_winner_list();
	});
	// +++++
	//
	//=======
	function update_winner_list(){
		var t = {
			"openid":$("#lottery_list > li:eq(6)").attr("openid"),
			"nickname":$("#lottery_list > li:eq(6) > span").text()
		}
		winner.push(t);
		
		var res_html = '';

		for (var i = 0; i < winner.length; i++){
			if (i % 4 == 0){
				res_html += "<tr>";
			}
			res_html += "<td><h4>" +winner[i].nickname+ "</h4></td>";
			if (i % 4 == 3){
				res_html += "</tr>";
			}
		}
		$("#winner_list").html(res_html);
		$("#winner_count").html(winner.length);
		lottery_last_count -= 1;
		$("#lottery_last_count").html(lottery_last_count);
		$.post("/lottery/web/callback.php?type=set_lottery_id&id=" + t.openid);
	}
	
	//=======
	var url = '/user';
	$.getJSON(url, function(data){
		li_data = data;
		show_data();
	});
})(window.jQuery);
