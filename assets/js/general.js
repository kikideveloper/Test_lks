$(document).ready(function() {
	$("a.mobile").click(function() {
		$(".sidebar").slideToggle('fast');
	});

	window.onresize=function(event){
		if ($(window).width()>420) {
			$(".sidebar").show();
		}
	};
});
function slideSwitch(){
	var $ke = $('#slide img.ke');
	if($ke.length == 0) $ke = $('#slide img:last');
	var $next = $ke.next().length ? $ke.next() : $('#slide img:first');
	$ke.addClass('last-ke');
	$next.css({opacity : 0.0})
	.addClass('ke')
	.animate({opacity : 1.7}, 1000, function(){
		$ke.removeClass('ke last-ke');
	});
}
$(function(){
	setInterval("slideSwitch()", 5000);
});