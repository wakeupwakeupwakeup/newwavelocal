<?php

add_action('wp_ajax_get_mood_entries', 'get_mood_entries_callback');
add_action('wp_ajax_nopriv_get_mood_entries', 'get_mood_entries_callback');
add_filter('show_admin_bar', 'show_admin_bar_for_admins');
add_theme_support('post-thumbnails');

function show_admin_bar_for_admins() {
    return current_user_can('administrator');
}

function get_mood_entries_callback() {
    $mood = 'romantic';
    if (array_key_exists('mood', $_POST)) {
        $mood = $_POST['mood'];
    }
    $mood_services = new WP_Query(array(
        'category_name' => $mood,
        'posts_per_page' => -1,
    ));
    if ($mood_services->have_posts()) {
        while ($mood_services->have_posts()) {
            $mood_services->the_post();
            get_template_part('template-parts/post/service-card');
        }
    }
    // Make sure to stop further processing to avoid extra output
    wp_die();

}


?>