<?php

add_action('wp_ajax_get_mood_entries', 'get_mood_entries_callback');
add_action('wp_ajax_nopriv_get_mood_entries', 'get_mood_entries_callback');
add_action('wp_ajax_get_service_post', 'get_service_post');
add_action('wp_ajax_nopriv_get_service_post', 'get_service_post');
add_filter('show_admin_bar', 'show_admin_bar_for_admins');
add_theme_support('post-thumbnails');
add_theme_support( 'widgets' );

function show_admin_bar_for_admins() {
    return current_user_can('administrator');
}


function enqueue_lazy_block_preview_styles() {
    wp_enqueue_style( 'lazy-block-preview_main', get_template_directory_uri() . '/css/main.css', array(), '1.0.0' );
    wp_enqueue_style( 'lazy-block-preview_articles', get_template_directory_uri() . '/css/articles.css', array(), '1.0.0' );
    wp_enqueue_style( 'lazy-block-preview_banner', get_template_directory_uri() . '/css/templates-css/service-banner.css', array(), '1.0.0' );
}
add_action( 'enqueue_block_editor_assets', 'enqueue_lazy_block_preview_styles' );

// require_once get_template_directory() . '/custom-widgets/service-banner.php';

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

function register_service_block() {
    register_block_type('newwave/service-banner', array(
        'render_callback' => 'render_service_block',
    ));
}
add_action('init', 'register_service_block');

function render_service_block($attributes) {
    // Retrieve attributes (if needed) and prepare the post link URL and post object
    $post_id = $attributes['post_id'];
    $post_link = get_permalink($post_id);
    $post = get_post($post_id);

    // Retrieve the post thumbnail
    $thumbnail_url = get_the_post_thumbnail_url($post, 'thumbnail');

    // Retrieve the post title and excerpt
    $title = get_the_title($post);
    $excerpt = get_the_excerpt($post);

    // Generate the HTML output for the custom block
    ob_start();
    ?>
    <div class="custom-post-link-block">
        <a href="<?php echo esc_url($post_link); ?>">
            <?php if ($thumbnail_url) : ?>
                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($title); ?>">
            <?php endif; ?>
            <h2><?php echo esc_html($title); ?></h2>
            <p><?php echo esc_html($excerpt); ?></p>
        </a>
    </div>
    <?php
    return ob_get_clean();
}

?>