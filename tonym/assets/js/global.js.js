$(document).ready(function() {
	$(".accordion-toggle").click(function() {
		var target = $(this).find("i");
		if(target.hasClass("icon-chevron-right")) {
			target.removeClass("icon-chevron-right");
			target.addClass("icon-chevron-down");
		}
		else {
			target.removeClass("icon-chevron-down");
			target.addClass("icon-chevron-right");
		}
	});
});