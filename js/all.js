$(document).ready(function(){

	$('#main-header').css("top", $('#wpadminbar').height() );

	$(window).scroll(function(){
		if( $(document).scrollTop() >= 100) {
			$('#main-header').addClass('fixed');
		}else {
			$('#main-header').removeClass('fixed');
		}
	});
});