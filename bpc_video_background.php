<?php
/*
Plugin Name: Fullscreen Background Video
Plugin URI: http://bluepenguinconsulting.com
Description: jQuery WordPress plugin to easily add a background video to an element. Video will be fill the viewport.
Author: Julia H Chen
Version: 1.0
Author URI: http://bluepenguinconsulting.com
*/
/*
Copyright (c) 2016, Julia H Chen
All rights reserved.
*/

/*
 *
 * @param  $id				id of <video>
 * @param  $id_image	id of div that holds background image for mobile devices
 * @param  $container	id of element containing video (usually <header>)
 * @param  $width			width (aspect ratio)
 * @param  $height		height (aspect ratio)
 */

function bpc_video_background($id, $id_image, $container, $width=16, $height=9) {

    add_action('wp_footer','bpc_video_background_init');

    add_action('wp_head','bpc_video_background_css');

}

function bpc_video_background_init($id, $id_image, $container, $width=16, $height=9) {

?>

<script>
	'use strict';
	(function($) {

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
						$(videoDiv).css("top", "-"+ margin);
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
						$(videoDiv).css("left", "-"+ margin);
					}
				}
			}
		}

		fullscreen("<?php echo $id; ?>", "<?php echo $id_image; ?>", "<?php echo $container; ?>", <?php echo $width; ?>, <?php echo $height; ?>);
  	// Run the function in case of window resize
		$(window).resize(function() {
    	fullscreen("<?php echo $id; ?>", "<?php echo $id_image; ?>", "<?php echo $container; ?>", <?php echo $width; ?>, <?php echo $height; ?>);
		});

})( jQuery );
</script>
<?php
}
add_action( 'bpc_video_background', 'bpc_video_background' );


function bpc_video_background_css() {

	$output="<style>#".$container." {overflow:hidden;display:block; position:relative; }#".$id." {overflow: hidden;position: absolute;top: 0;left: 0;right: 0;z-index: 0;height: 100%;}".$id_image."{display:none;}</style>";

	echo $output;

}

?>
