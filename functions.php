<?php
function product_launch_enqueue_style(){
    wp_enqueue_style( 'product_launch', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'product_launch_enqueue_style' );
?>
