<?php

add_action('wp_ajax_get_mood_entries', 'get_mood_entries_callback');
add_action('wp_ajax_nopriv_get_mood_entries', 'get_mood_entries_callback');
add_action('wp_ajax_get_service_post', 'get_service_post');
add_action('wp_ajax_nopriv_get_service_post', 'get_service_post');
add_filter('show_admin_bar', 'show_admin_bar_for_admins');
add_theme_support('post-thumbnails');

function show_admin_bar_for_admins() {
    return current_user_can('administrator');
}

function get_service_post() {
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
  
    $service_post = new WP_Query(array(
        'p' => $post_id,
        'posts_per_page' => 1,
    ));
    if ($service_post->have_posts()) {
        while ($service_post->have_posts()) {
            $service_post->the_post();
            get_template_part('template-parts/post/service');
        }
    }
  
    wp_die();
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