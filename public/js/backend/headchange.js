!function($){
		$("#navigate > li").removeClass('active');
		var url = window.location.href;
		var idx = url.lastIndexOf("/");
		if (url.substring(idx) == "/backend"){
			url = "/backend";
		}else{
			url = "/backend" + url.substring(idx);
		}
		$.each($("#navigate > li > a"), function(idx, value){
			if ($(value).attr("href") == url){
				$(value).parent().addClass("active");
			}
		});
}(window.jQuery);
