# WordPress Fullscreen Background Video

## Description

WordPress plugin to easily assign a video background to an element. Video fills entire viewport. On browser resize, video resizes. For mobile, image is displayed.
Tested WP 4.6.1

License: (MIT) Copyright (C) 2016 Julia Chen

### Requirements

jQuery (Tested 1.11.0)

### Browsers Tested

## How to Use

Upload bpc_video_background.php to your /plugins directory. 

Activate plugin. 

Add `<?php bpc_video_background($id, $id_image, $container, $width, $height) ?>` (fill in your parameters) to your page template.

Parameters:

* $id			id of `<video>`
* $id_image		id of div that holds background image for mobile devices
* $container	id of element containing video
* $width		width (aspect ratio, default 16)
* $height		height (aspect ratio, default 9)

Example:

In home page template
`<header id="my_vid"><div id="my_image"></div><video id="my_video" autoPlay loop muted src="video.mp4" ></video></header>`

Add
`<?php bpc_video_background("my_video", "my_image", "my_vid", 16, 9) ?>`

Update your CSS to add text, nav on top of the video element. Also add an image for $id_image

## Changelog

= 1.0 =

* Initial Release
