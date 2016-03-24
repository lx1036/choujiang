!(function($){
	var modal = {
		openmodal : function (title, body){
			$("#modal_head").text(title);
			$("#modal_data").text(body);
			$("#modal").removeClass("hide fade");
		},
		closemodal : function (){ $("#modal").addClass("hide fade"); }
	}
	//搜索特等奖名单按钮
	$("#search_winner").on("click", function(){
		var text = $("#search_winner_text").val();
		if (text == ''){ modal.openmodal("警告","搜索为空，请输入"); return; }
		var url = "/employee/search?name=" + text;
		$.getJSON(url, function(data){
			var text = '';
			var iter = 1;
			$.each(data, function(i, value){
				var btn_name = "标记";
				var btn_class="btn-success btn";
				if (value["wintimes"] > 0 ){ btn_name="删除标记"; btn_class="btn btn-danger";}
				text += "<tr><td>" + iter + "</td><td>" 
						 + value["number"] + "</td><td>" 
						 + value["name"] + "</td><td>" 
						 + value["department"] + "</td><td><button  class=\"" + btn_class + "\"  type=\"button\" click='javascript:;' value='" 
						 + value["number"] +"' wintimes='" 
						 + value["wintimes"]+ "'>" 
						 +btn_name+"</button></td></tr>";
		  	iter += 1;
		  });
			$("#search_result").html(text);
		});
	});
	
	$(document).on("click", "#search_result button", function(){
		var number = $(this).val();
		var url = "/employee/filter?numbers=";
		var msg = "标记员工工号为";
		var btn_name = "删除标记";
		var btn_class="btn-danger btn";
		var wintimes = "1";

		if (parseInt($(this).attr("wintimes")) > 0){
			url = '/employee/reset?number=';
			msg = "删除标记工号为";
			btn_name = "标记";
			btn_class="btn-success btn";
			wintimes = "0";
		}
		var parent = $(this);
		$.post(url + number, function(data){
			if (parseInt(data) <= 0 ){ 
				modal.openmodal("警告", "标记失败,请重试"); 
			}
			else{ 
				//modal.openmodal("成功", msg + number + "的员工成功!");
				$(parent).removeClass().addClass(btn_class);
				$(parent).text(btn_name);
				$(parent).attr("wintimes",wintimes);
		 }
		});
	});
	
	$("#reset_btn").on("click", function(){
		var url = '/employee/reset';
		$.post(url, function(data){
			if (parseInt(data) > 0){
				modal.openmodal("恭喜","重置成功");			
			}else{
				modal.openmodal("警告","重置失败");			
			}
		});
	});

	$("#lottery_management_left > li > a").on("click", function(){
		var idx = $(this).attr("value");
		$("#lottery_management_right > div").hide();
		$("#lottery_management_right > div:eq(" + idx + ")").show();
		$("#lottery_management_left > li").removeClass("active");
		$(this).parent().addClass("active");
	});
	$("#lottery_management_left > li > a:eq(0)").click();
	$("#close_modal, #modal_close_x").on("click", function(){ modal.closemodal(); });

	$("#query_token").on("click", function(){
		$.ajax({
			url:'/liuxiang/gettoken',
		}).done(function(data){
			var html = '';
			for (var i = 0, length = data.length; i < length; i++){
				html += '<tr class="success"><td>'
						+ data[i].count_setting
						+'</td><td>'
						+ data[i].number_person
						+'</td><td>'
						+ data[i].shake_token
						+'</td></tr>';
			}
			$('#query_token tbody').append(html);
			/*
			datas.map(function(obj){
				console.log(obj.count_setting + '/' + obj.number_person + '/' +obj.shake_token);
			});*/
		});
	});

	$("#sub_menu_grade").on('change', function(){
		var selection = $(this).find('option:selected').text();
		if (selection != 'None'){
			$('#sub_menu_content').show();
		}else {
			$('#sub_menu_content').hide();
		}
		//var html = '<h3>'+ selection +'</h3>';
		//$(this).parent().append(html);
	});
	
})(window.jQuery);
