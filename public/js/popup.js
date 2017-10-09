$(document).ready(function(e) {
	var mouseX = e.pageX,
	mouseY = e.pageY;
    
	$('.tiptext').hover(function(){
		  $(this).children(".description").show(1000);
	}, function(){
		$(this).children(".description").slideUp("slow");
	});
	
});