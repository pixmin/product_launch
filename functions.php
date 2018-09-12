<?php

// Add Stylesheet
function product_launch_enqueue_style(){
    wp_enqueue_style( 'product_launch', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'product_launch_enqueue_style' );

// Save visitor in database (wpdb)
function add_visitor($name, $email, $format) {

    // Check required fields
    if ($name == "" || $email == "") {
        return "All fields are required.";
    }

    // Check if visitor exits
    global $wpdb;
    $visitor = $wpdb->get_results(
        $wpdb->prepare("SELECT email FROM visitors WHERE email = %s", $email),
        OBJECT
    );
    if (!empty($visitor)) {
        return "Email already registered.";
    }

    // Insert data
    $wpdb->insert(
        'visitors',
        array(
            'name' => $name,
            'email' => $email,
            'format' => $format
        )
    );

    // All went well, get the thank you message
    $msg = get_post_meta(6, 'message', true);
}

// Enable post thumbnails
add_theme_support('post-thumbnails'); // Not needed anymore?

// Admin menu
function gp_visitors_list() {
    add_menu_page(
        'Product Launch', // Page title
        'Product Launch', // Menu entry
        'manage_options', // Capability
        'visitors-list', // Menu slug
        'gp_display_visitors', // Function called
        'dashicons-media-text' // Icon
    );
}

// Show visitors listing
function gp_display_visitors() {

    global $wpdb;
    $list = $wpdb->get_results('SELECT name, email, format FROM visitors');

    ?>
    <section class="wrap">
        <h2>Product Launch data</h2>
        <table class="wp-list-table widefat fixed striped posts">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Format</th>
                </tr>
            </thead>
            <tbody><?php

                foreach ($list as $visitor) {
                    echo "<tr>";
                    echo "<td>$visitor->name</td>";
                    echo "<td>$visitor->email</td>";
                    echo "<td>$visitor->format</td>";
                    echo "</tr>";
                }
                
            ?></tbody>
        </table>
    </section>
    <?php
}

// Hook up new menu
add_action('admin_menu', 'gp_visitors_list');
