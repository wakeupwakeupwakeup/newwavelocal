<?php
    get_header();
?>
<link rel="stylesheet" href="/wp-content/themes/newwave/css/templates-css/articles.css">
<div class="blog-bg"></div>
<section class="main-section">
<?php
// Get the current category ID
$category = get_category_by_slug( 'articles' );

if ( $category ) {
    // Get the current page number from the query string
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    // Query posts from the specific category with pagination
    $args = array(
        'cat' => $category->cat_ID,
        'paged' => $paged,
    );
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        ?>
        <div class="article-header">
            <h1 class="title"><?php echo esc_html( $category->name ); ?></h1>
            <p class="category-text article-subheader"><?php echo esc_html( $category->description ); ?></h2>
        </div>
        <div class="article-wrapper">
            <div class="article-grid">
                <?php
                while ( $query->have_posts() ) {
                    $query->the_post();
                    get_template_part('template-parts/post/blog-article-card');
                    // Output the post content here
                }
                ?>
            </div>
        </div>
        <div class="article-pagination">
            <!-- Pagination -->
            <?php
            $pagination_args = array(
                'format' => '?paged=%#%',
                'current' => $paged,
                'total' => $query->max_num_pages,
                'prev_text' => __( '&laquo; Previous' ),
                'next_text' => __( 'Next &raquo;' ),
            );
            echo paginate_links( $pagination_args );
            ?>
        </div>
        <?php
    } else {
        // No posts found
        ?>
        <div class="alert alert-info">Нет статей</div>
        <?php
    }

    wp_reset_postdata(); // Restore the global post data
}
?>
</section>

<?php
    get_footer();
?>