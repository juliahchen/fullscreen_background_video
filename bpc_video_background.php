<?php 
/*
Plugin Name: Fullscreen Background Video
Plugin URI: http://bluepenguinconsulting.com
Description: jQuery WordPress plugin to easily add a background video to an element. Video will be fullscreen.
Author: Julia H Chen
Version: 1.0
Author URI: http://bluepenguinconsulting.com
*/
/*
Copyright (c) 2016, Julia H Chen
All rights reserved.
*/

/**
 * Constants
 */

define( 'BPCFBV_VERSION', '1.0' );


/**
 * 
 * @param  $id			id of <video>
 * @param  $id_image	id of div that holds background image for mobile devices
 * @param  $container	id of element containing video (usually <header>)
 * @param  $width		width (aspect ratio)
 * @param  $height		height (aspect ratio)
 * @param  $opt			optional space below video
 */
function bpc_video_background($id ='hero_video', $id_image='hero_image',  $container='header_vid', $width=16, $height=9, $opt=0) {

if (is_front_page()) {
	
	

?>

<script>
(function($) {

		function fullscreen(id, id_image,  container, width, height, opt){
		
   			var videoDiv = document.getElementById(id);
			var imageDiv = document.getElementById(id_image);
			var containerDiv = document.getElementById(container);
			var mediaAspect = height/width;	
			var containerAspect = $(window).height() / $(window).width();
			
			if (/Mobi/.test(navigator.userAgent)) {
    			// mobile -- show image
				$(videoDiv).remove();
				$(imageDiv).css('display', 'block');
			}
			else {
		 	
			if (containerAspect < mediaAspect) {
				// too wide
				
				videoDiv.style.width = $(window).width() + "px";
				videoDiv.style.height = ($(window).width() / (width / height)) + "px";
				
				$(containerDiv).css("height", ($(window).height()-opt));
				
				var marginch =  ($(window).width() * (height / width)) - $(window).height();
				
				if (marginch <0 ) {
					videoDiv.style.left = 0;
					videoDiv.style.top = 0;
				}
				else {
					videoDiv.style.left = 0;
					
					videoDiv.style.top = "-"+ (marginch + opt) +"px";
				}
				
			}
			
			else {
				// too tall
	
				videoDiv.style.width = ($(window).height() * (width / height)) + "px";
				
				videoDiv.style.height = $(window).height() + "px";
				$(containerDiv).css("height", ($(window).height()-opt));
				
				var marginch =  ($(window).height() * (width / height)) - $(window).width();
	
				
				if (marginch <0 ) {
					videoDiv.style.left = 0;
					videoDiv.style.top = 0;
				}
				else {
					videoDiv.style.top = "-"+opt+"px";
					videoDiv.style.left = "-"+marginch+"px";
				}
			}
			
			}
		
	
    }
  
    fullscreen("<?php echo $id; ?>", "<?php echo $id_image; ?>", "<?php echo $container; ?>", <?php echo $width; ?>, <?php echo $height; ?>, <?php echo $opt; ?>);

  // Run the function in case of window resize
  $(window).resize(function() {
       fullscreen("<?php echo $id; ?>", "<?php echo $id_image; ?>", "<?php echo $container; ?>", <?php echo $width; ?>, <?php echo $height; ?>, <?php echo $opt; ?>); 
	});        
 
  })( jQuery );
</script>
<?php
}}
add_action( 'bpc_video_background', 'bpc_video_background' );



?>
