(function($) {
	'use strict';

	function fullscreen(id, id_image,  container, width, height){
		var videoDiv = document.getElementById(id);
		var imageDiv = document.getElementById(id_image);
		var containerDiv = document.getElementById(container);
		var mediaAspect = height/width;
		var containerAspect = $(window).height() / $(window).width();
		var margin;

		if (/Mobi/.test(navigator.userAgent)) {
			// mobile -- show image
			$(videoDiv).remove();
			$(imageDiv).css('display', 'block');
		}
		else {

			if (containerAspect < mediaAspect) {
				// too wide
				$(videoDiv).css("width", $(window).width());
				$(videoDiv).css("height", ($(window).width() / (width / height)));
				$(containerDiv).css("height", $(window).height());
				margin =  ($(window).width() * (height / width)) - $(window).height();

				if (margin <0 ) {
					$(videoDiv).css("left", 0);
					$(videoDiv).css("top", 0);
				}
				else {
					$(videoDiv).css("left", 0);
					$(videoDiv).css("top", "-"+ margin+"px");
				}

			}

			else {
				// too tall
				$(videoDiv).css("width", ($(window).height() * (width / height)));
				$(videoDiv).css("height", $(window).height());
				$(containerDiv).css("height", $(window).height());
				margin =  ($(window).height() * (width / height)) - $(window).width();

				if (margin <0 ) {
					$(videoDiv).css("left", 0);
					$(videoDiv).css("top", 0);
				}
				else {
					$(videoDiv).css("top", 0);
					$(videoDiv).css("left", "-"+ margin+"px");
				}
			}
		}
	}

	fullscreen("id", "id_image",  "container", 16, 9);
	// Run the function in case of window resize
	$(window).resize(function() {
		fullscreen("id", "id_image",  "container", 16, 9);
	});

})( jQuery );
