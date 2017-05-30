<?php
function product_launch_enqueue_style(){
    wp_enqueue_style( 'product_launch', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'product_launch_enqueue_style' );

function add_visitor($name, $email, $format){
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
            		'email' => $email,
                    'format' => $format
            	));
            $msg = get_post_meta(6, 'message', true);
        }
    } else {
        $msg = "All fields are required.";
    }

    return $msg;
}

add_theme_support('post-thumbnails');
function visitors_list(){
    add_menu_page('visitors\' list','visitors\' list', 'manage_options','visitors-list','display_visitors', 'dashicons-media-text' );
}

function display_visitors(){
    global $wpdb;
    $list = $wpdb->get_results('SELECT name , email , format FROM visitors');
    echo "<table> ";
    foreach ($list as $visitor) {
        echo "<tr>";
        echo "<td>$visitor->name</td>";
        echo "<td>$visitor->email</td>";
        echo "<td>$visitor->format</td>";
        echo "</tr>";
    }
    echo "</table> ";
}

add_action('admin_menu', 'visitors_list');
?>
