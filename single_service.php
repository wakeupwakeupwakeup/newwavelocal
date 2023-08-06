<?php 
    get_header();
?>

<link rel="stylesheet" href="/wp-content/themes/newwave/css/gallery-slider.css">
<link rel="stylesheet" href="/wp-content/themes/newwave/css/service.css">
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
            slideMargin: 10,
            thumbItem: 3,
            adaptiveHeight: true,
            controls: true,
            prevHtml: '<span class="icon-arrow-left"></span>',
            nextHtml: '<span class="icon-arrow-right"></span>'
        });
    const photosWrapper = $('.service-photo-gallery-wrapper')
    $( window ).resize(function() {
        update_gallery($(document).width());
    });

    $(document).ready(function() {
        update_gallery($(document).width());
    });

    function update_gallery(window_width) {
        if (window_width < 1008) {
            const service_heading = $('.service-heading');
            photosWrapper.appendTo(service_heading);
            var childrenElements = service_heading.children();
            var targetElement = childrenElements.eq(0);
            targetElement.after(photosWrapper);
        } else {
            photosWrapper.appendTo($('.service-right'));
        }
    }
</script>

<?php 
    get_footer();
?>