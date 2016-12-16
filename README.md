# Fullscreen Background Video

## Description

Easily assign a video background to an element. Video fills entire viewport on launch. On browser resize, video resizes. For mobile an image is displayed.

License: (MIT) Copyright (C) 2016 Julia Chen

### Requirements

jQuery (Tested 1.11.0)

### Browsers Tested

## How to Use

-Include bpc_video_background.js file
-Update the parameters

Parameters:

* `id`			id of `<video>`
* `id_image`		id of div that holds background image for mobile devices
* `container`	id of element containing video
* `width`			width (aspect ratio, default 16)
* `height`			height (aspect ratio, default 9)

Example:

In your page template
```
<header id="my_container"><div id="my_image"></div><video id="my_video" autoPlay loop muted src="video.mp4" ></video></header>
```

Update
```
fullscreen(my_video, my_image,  my_container, 16, 9);
// Run the function in case of window resize
$(window).resize(function() {
	fullscreen(my_video, my_image,  my_container, 16, 9);
});
```

Update your CSS to add text, nav on top of the video element. Also add an image for `id_image`. From our example:
```
<style>
#my_container {overflow:hidden;display:block; position:relative; }
#my_video {overflow: hidden;position: absolute;top: 0;left: 0;right: 0;z-index: 0;height: 100%;}
#hero_image {display: none;background: url(hero_image.jpg) no-repeat top center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;height: 600px;}
</style>
```
## Changelog

= 1.0 =

* Initial Release
