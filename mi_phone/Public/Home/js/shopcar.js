function toshare(){
	$('.cha').removeAttr('onclick');
	$('.cha').attr('onclick',"car()");
	$(".am-share").addClass("am-modal-active");	
	if($(".sharebg").length>0){
		$(".sharebg").addClass("sharebg-active");
	}else{
		$("body").append('<div class="sharebg"></div>');
		$(".sharebg").addClass("sharebg-active");
	}
	$(".sharebg-active,.share_btn").click(function(){
		$(".am-share").removeClass("am-modal-active");	
		setTimeout(function(){
			$(".sharebg-active").removeClass("sharebg-active");	
			$(".sharebg").remove();	
		},300);
	})
}

function tobuy(){
	$('.cha').removeAttr('onclick');
	$('.cha').attr('onclick',"buy()");
	$(".am-share").addClass("am-modal-active");
	if($(".sharebg").length>0){
		$(".sharebg").addClass("sharebg-active");
	}else{
		$("body").append('<div class="sharebg"></div>');
		$(".sharebg").addClass("sharebg-active");
	}
	$(".sharebg-active,.share_btn").click(function(){
		$(".am-share").removeClass("am-modal-active");
		setTimeout(function(){
			$(".sharebg-active").removeClass("sharebg-active");
			$(".sharebg").remove();
		},300);
	})
}