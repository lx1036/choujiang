;!(function($) {
	var filter_url = '/backend/filtermsg';

	var modal = {
		openmodal : function (title, body){
			$("#modal_head").text(title);
			$("#modal_data").text(body);
			$("#modal").removeClass("hide fade");
		},
		closemodal : function (){ $("#modal").addClass("hide fade"); }
	}

	$("#select_all").change(function(){
		$("#text_msg > tr > td > input").prop("checked", $(this).prop("checked"));
	});
	$("#commit_filter").click(function(){
		var ids = '';
		var except_ids = '';
		$.each($("#text_msg > tr > td > input:checked"), function(i, data){
			ids = ids + ',' +  $(data).attr("row_id");
		});
		$.each($("#text_msg > tr > td > input").not(':checked'), function(i, data){
			except_ids = except_ids + ',' +  $(data).attr("row_id");
		});
		ids = ids.substring(1);
		except_ids = except_ids.substring(1);
		$.post(filter_url, {ids: ids, except_ids : except_ids}, function(data){
			if (data == false){
				modal.openmodal("警告", "过滤失败"); 
			}else{
				document.location.reload();
			}
		});
	});
	$("#scenemanagement_left> li > a").on("click", function(){
		var idx = $(this).attr("value");
		$("#scenemanagement_right > div").hide();
		$("#scenemanagement_right > div:eq(" + idx + ")").show();
		$("#scenemanagement_left > li").removeClass("active");
		$(this).parent().addClass("active");
	});
	$("#lottery_management_left > li > a:eq(0)").click();
	
	$("#close_modal, #modal_close_x").on("click", function(){ modal.closemodal(); });
})(window.jQuery);
