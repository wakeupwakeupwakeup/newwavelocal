<?php
get_header();
?>
  <link rel="stylesheet" href="/wp-content/themes/newwave/css/templates-css/articles.css">
  <link rel="stylesheet" href="/wp-content/themes/newwave/css/templates-css/pages.css">
  <script>
    $(document).ready(function() {
      $('.related-articles-container').slick(getRelatedArticlesSliderSettings());
    });
  </script>
<?php
$latest_post_ids = [];
while ( have_posts() ) :
    array_push($latest_post_ids, get_the_ID());
    the_post();
    get_template_part( 'template-parts/post/article', 'page' );
endwhile;
?>
<!--
<section class="banner">
<div class="banner-wrapper">
    <div class="banner-container">
    <h2 class="title">
        Погрузитесь в магию и духовность
        Тайланда с незабываемой поездкой
        к памятнику Большого Будды!
    </h2>
    <p class="text">
        Закажите услугу сегодня и откройте для себя
        новые горизонты духовности и путешествий!
    </p>
    <a href="" class="general-button">
        Заказать услугу
    </a>
    </div>
</div>
</section>
-->
<section class="related-articles-section">
<div class="related-articles-wrapper">
    <h2 class="title page-title">Похожие <span class="color">статьи</span></h2>
    <div class="related-articles-container">
    <?php
        $articles = new WP_Query(array(
            'category_name' => 'articles',
            'posts_per_page' => 3,
            'post__not_in' => $latest_post_ids,
            'orderby' => 'rand',
        ));
        if ($articles->have_posts()) {
            while ($articles->have_posts()) {
            $articles->the_post();
                get_template_part('template-parts/post/related-article-card');
            }
        }
    ?>
    </div>
</div>
</section>
<?php
get_footer();
?>