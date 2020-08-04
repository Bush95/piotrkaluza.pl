<?php

// Image Upscale
function binary_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
    // upscale
    if ( !$crop ) return null;

    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);

    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );

    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'binary_thumbnail_upscale', 10, 6 );


/**
 * Smooth Image Loading
 * @param  int $imageID - attachment image ID
 * @param  string $imageSize- image size defined in add_image_size
 * @param  string $alt- image alt
 * @return void
 */
function progressiveImage($imageID, $imageSize = 'thumbnail', $alt = '', $pixelImageSize = 'pixels') {
	if (!$imageID) {
		return;
	}

	$largeImage = wp_get_attachment_image_src($imageID, $imageSize);
	$largeImageSrc = $largeImage[0];

    //banner-pixels

	?>
	<img src="<?php echo wp_get_attachment_image_src($imageID, $pixelImageSize)[0]; ?>" alt="<?php echo $alt; ?>" class="progressive-image" data-large="<?php echo $largeImageSrc; ?>">
	<?php
}

// Set image quality to 100
add_filter('jpeg_quality', function($arg){return 84;});

add_image_size('hd', 1800, 1230, false);
add_image_size('banner-pixels', 19, 10, true);
add_image_size('pixels', 100, 60, false);
add_image_size('image-thumb', 1000, 800, false);
add_image_size('post-thumb', 800, 533, true);
add_image_size('post-thumb-featured', 1000, 560, true);
add_image_size('post-thumb-small', 90, 60, true);
add_image_size('gallery-thumb', 500, 316, true);

?>
