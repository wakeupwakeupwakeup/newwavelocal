<?php 
    get_header();
?>

<link rel="stylesheet" href="/wp-content/themes/newwave/css/service.css">
<link rel="stylesheet" href="/wp-content/themes/newwave/css/gallery-slider.css">
<link type="text/css" rel="stylesheet" href="/wp-content/themes/newwave/css/lightslider.min.css" />                  
<script src="/wp-content/themes/newwave/js/lightslider.min.js"></script>


<?php
$latest_post_ids = [];
while ( have_posts() ) :
    array_push($latest_post_ids, get_the_ID());
    the_post();
    get_template_part( 'template-parts/post/service', 'page' );
endwhile;
?>

<script>
var slider = $("#photos_slider").lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem: 3,
            adaptiveHeight: true,
            controls: true,
            prevHtml: '<span class="icon-arrow-left"></span>',
            nextHtml: '<span class="icon-arrow-right"></span>',
            responsive: [
            {
                breakpoint: 800,
                settings: {
                thumbItem: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                thumbItem: 2
                }
            }
            ]
        });
</script>

<?php 
    get_footer();
?>