$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: '/docroot/mecd/img/loading.gif',
				play: 15000,
				pause: 10000,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:0
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});


$(document).ready(function() { 
     $(".caption").css({ position: "absolute",bottom: "-100px",width: "400px",margin: "0.8em",padding: "10px 8px 25px 8px" });
});
