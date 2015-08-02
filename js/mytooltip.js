//bootstrap使用
	function buildTooltip(id, title, placement){
		$(id).tooltip({
			trigger: "manual",
			title: title,
			placement: placement
		})
		$(id).tooltip('show');
	}
	
	function destroyTooltip(id) {
		$(id).bind("focus", function () {
			$(id).tooltip('destroy');
		})
	}