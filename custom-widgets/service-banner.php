<?php


// functions.php (or in a custom plugin)
// Add custom meta box for selecting a post
function add_custom_post_meta_box() {
    add_meta_box(
        'custom_post_meta_box',
        'Select a Post',
        'display_custom_post_meta_box',
        'post', // Replace 'post' with your custom post type slug, if applicable
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_custom_post_meta_box' );

// Display the custom post meta box content
function display_custom_post_meta_box( $post ) {
    // Retrieve the saved post ID from post meta
    $selected_post_id = get_post_meta( $post->ID, '_selected_post_id', true );

    // Output the post selection field
    wp_dropdown_posts( array(
        'name' => 'selected_post_id',
        'selected' => $selected_post_id,
        'show_option_none' => 'Select a Post', // Show a default option with custom text
    ) );
}

// functions.php (or in a custom plugin)
// Save the custom post meta box data
function save_custom_post_meta_box( $post_id ) {
    if ( isset( $_POST['selected_post_id'] ) ) {
        update_post_meta( $post_id, '_selected_post_id', absint( $_POST['selected_post_id'] ) );
    }
}
add_action( 'save_post', 'save_custom_post_meta_box' );

// functions.php (or in a custom plugin)
// Enqueue the custom block script
function enqueue_custom_block_script() {
    wp_enqueue_script(
        'custom-widget-block-script',
        get_template_directory_uri() . '/custom-widgets/service-banner.js', // Replace with the correct file path
        array( 'wp-blocks', 'wp-editor', 'wp-i18n', 'wp-element', 'wp-components' ),
        '1.0',
        true
    );
}
add_action( 'enqueue_block_editor_assets', 'enqueue_custom_block_script' );

?>
