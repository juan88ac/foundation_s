<?php 
/**
 * Custom Post type register framework
 */
include('acpt/init.php');
add_action('init', 'makethem');
function makethem() {
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
