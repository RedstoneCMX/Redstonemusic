$(function(){
	$(window).scroll(function(){
		var top = document.body.scrollTop;
		//alert(top);
		if(top >= 155){
			//alert(top);
			$(".nav").css({"position":"fixed","z-index":"3","top":"0px"});
		}
		else{
			$(".nav").removeAttr('style');
		}

	});
});