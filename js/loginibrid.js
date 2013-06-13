/* Login Ibrid JS */
jQuery(document).ready(function($) {
	$(".magicamente").hide();
    $(".tadaa").show();
	$('.tadaa').click(function(){
		$(".magicamente").slideToggle();
    });
	$('.smorta').click(function(){
		$(".magicamente").slideToggle();
    }); 
});
jQuery(document).ready(function($) {
    $( "#tabs" ).tabs();
  });