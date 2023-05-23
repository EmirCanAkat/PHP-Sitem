(function ($) {
	"use strict";

	var home_style = $("#home_style").val();

	if ("particles-style-2" == home_style) {
		/*
		|-----------------------------------------------------
		|	Constellation area
		|-----------------------------------------------------
		*/
		if ($.fn.constellation) {
			$('.canvas-area canvas').constellation({
				star: {
					width: 3
				},
				line: {
					color: 'rgba(255,255,255,0.7)'
				},
				length: (window.innerWidth / 9),
				radius: (window.innerWidth / 5)
			});
		}
	}

	if ("rain-style" == home_style) {
		/*
		|-----------------------------------------------------
		|	Init Rainy style
		|-----------------------------------------------------
		*/
		function rain() {
			var image = document.getElementById('rainy-image');
			var parent = document.getElementById('rainy-parent');
			image.onload = function() {
				var engine = new RainyDay({
					image: this,
					parentElement: parent
				});
				engine.rain([ [3, 3, 0.88], [5, 5, 0.9], [6, 2, 1] ], 100);
			};
			image.crossOrigin = 'anonymous';
			image.src = $("#rainy-image").attr("src");
		}
		window.addEventListener("load", rain, false);
	}

	if ("video-style" == home_style) {
		/*
		|-----------------------------------------------------
		|	YTPlayer for video style
		|-----------------------------------------------------
		*/
		jQuery(function(){
			jQuery(".tubular").YTPlayer();
		});
	}

	if ("waterpipe-style" == home_style) {
		/*
		|-----------------------------------------------------
		|	Waterpipe style
		|-----------------------------------------------------
		*/
		var smokyBG = $('#wavybg-wrapper').waterpipe({
			gradientStart: '#ff5500',
			gradientEnd: '#f5883b',
		});
	}

}(jQuery));