<?php
function product_launch_enqueue_style(){
    wp_enqueue_style( 'product_launch', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'product_launch_enqueue_style' );

function add_visitor($name, $email){
    global $wpdb;
    if ($name != "" && $email != "") {
        $visitor = $wpdb->get_results( $wpdb->prepare("SELECT email FROM visitors WHERE email = %s", $email), OBJECT);
        if (!empty($visitor)) {
            $msg = "Email already registered.";
        } else {
            $wpdb->insert(
            	'visitors',
            	array(
            		'name' => $name,
            		'email' => $email
            	));
            $msg = "Your are now registered.";
        }
    } else {
        $msg = "All fields are required.";
    }

    return $msg;
}
?>
