!(
function($){
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

	// ----
	update_message = function(){
		$.get("/msg/newtexthtmlmsgs?time=" + Date.parse(new Date()),
			function (data){

				$("#new_message").html(data);
				deal_msg("#new_message");
			}
		);
	}
	update_message();
	setInterval(update_message, 5000);
	// -----

	//禁止滚动
	 $ (window).scroll (function () { $ (this).scrollTop (0) });
     
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
	var url = '/lottery/web/callback.php?type=get_user';
	$.getJSON(url, function(data){
		li_data = data;
		show_data();
	});

	// danmu
	var interval_id;
	$(document).on("click", "#close_danmu", function(){
		$("#begin_danmu").show();
		$("#danmu_div").hide();
		$.each($("#danmu_div > font"), function(key, value){clearInterval($(value).attr("interval_id"));$(value).remove();});
		clearInterval(interval_id, 60000);
	});
	update_danmu = function (){
		$.getJSON("/lottery/web/callback.php?type=fetch_new_message&count=3&format=json&time=" + Date.parse(new Date()),
			function(data){
				$.each(data, function(key, value){
					danmu(value.content);
				});
			});
	}
	right_move = function (id){
		var left = parseInt($(id).css("padding-left"));
		if (left <= $("#danmu_div").offset().left + 10){
			clearInterval($(id).attr("interval_id"));
			$(id).remove();
		}else{
			left -= 10;
		}
		$(id).css("padding-left", left);
	}

	danmu = function(message){
//		var message = get_message_for_danmu();
		var height = rand($("#danmu").height());
		var left = $("#danmu").width() - 200;
		var loc = "padding-left:" + left + "px; padding-top:"+ height + "px;";
		var color = "color:" + getRandomColor() + ";"
		var id = "a" + rand(10000) + "";
		
		var node="<font id = \"" + id + "\" class=\"textStyle\" style=\"" + color + loc+ "\">" + message + "</font>";
		$("#danmu_div").append(node);
		var val = setInterval("right_move("+ id + " )", 100);
		$("#" + id).attr("interval_id", val);
	}
	$(document).on("click","#begin_danmu", function(){
		$("#close_danmu").parent().css("padding-left",$("#begin_danmu").offset().left);
		$("#close_danmu").parent().css("padding-top",$("#begin_danmu").offset().top);
		$("#begin_danmu").hide();
		$("#danmu_div").show();
		interval_id = setInterval("update_danmu()", 1000);
	});

	function getRandomColor(){    
 	 	return (function(m,s,c){return (c ? arguments.callee(m,s,c-1) : '#') + s[m.floor(m.random() * 16)]})(Math,'0123456789abcdef',5)       
	} 
	function sleep(n) { var start = new Date().getTime(); while (true) if (new Date().getTime() - start > n) break; }  
	// end-danmu
	
	function deal_msg (id){
		if ("wechat_msg" == $(id).attr("type")){
		        var text = wechatFace.faceToHTML($(id).attr("data"));
			$(id).html(text);
		        return;
		}
		$.each($(id).children(), function(i, obj){
		        deal_msg(obj);
		});
        };

})(window.jQuery);
