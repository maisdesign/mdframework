jQuery(document).ready(function($) {
		$(".tab_content_login2").hide();
		$("ul.tabs_login2 li:first").addClass("active_login").show();
		$(".tab_content_login2:first").show();
		$("ul.tabs_login2 li").click(function() {
			$("ul.tabs_login2 li").removeClass("active_login2");
			$(this).addClass("active_login2");
			$(".tab_content_login2").hide();
			var activeTab = $(this).find("a").attr("href");
				$(activeTab).show(); 
			return false;
		});
	});