<?php
// Create the slider CTP to make the orbti gallery works.
add_action('init', 'orbit');
function orbit() {
    $args = array(
        'supports' => array( 'title', 'page-attributes', 'thumbnail', 'excerpt'  ),
        'hierarchical' => true,
    );

    $sliders = new post_type('slider','slider', false,  $args );

    $args2 = array(
        'supports' => array( 'title', 'editor', 'page-attributes', 'thumbnail', 'excerpt'  ),
        'hierarchical' => true,
    );

    $items = new post_type('portfolio','portfolio', false,  $args2 );

    new tax('type', 'types', 'portfolio', true );
}
function slider_image_box() {

	remove_meta_box('postimagediv', 'slider', 'side');

	add_meta_box('postimagediv', __('Slider Image - 1000 X 400 pixels - Bigger images will be cropped automatically.'), 'post_thumbnail_meta_box', 'slider', 'normal', 'high');

}
add_action('do_meta_boxes', 'slider_image_box');