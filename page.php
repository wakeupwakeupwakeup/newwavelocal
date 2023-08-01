<?php
get_header();
?>
<link rel="stylesheet" href="/wp-content/themes/newwave/css/templates-css/articles.css">
<link rel="stylesheet" href="/wp-content/themes/newwave/css/templates-css/pages.css">
<section class="page">
    <div class="page_wrapper">
        <div class="header">
            <div class="heading">
                <?php
                    the_title( '<h1 class="title">', '</h1>' );
                ?>
            </div>
        </div>

        <div style="
            background-size: cover;
            background: linear-gradient(to top, #0c1f29, #00000075), url('<?php echo get_the_post_thumbnail_url(null, 'page-bg-thumbnail'); ?>');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-width: 1170px;
            width: 100%;
            height: 968px;
            position: absolute;
            z-index: -1;
            left: 0;
            top:0;
            filter: blur(10px);
            ">
        </div>
        <!--<div style="
            background: linear-gradient(to top, #111, transparent), url('<?php echo get_the_post_thumbnail_url(null, 'page-thumbnail'); ?>') no-repeat center center;
            background-size: cover;
            border-radius: 15px;
            width: 100%;
            height: 730px;
            line-height: 730px;
            text-align: center;
            position: relative;
            margin-bottom: 64px;
            ">
        </div>-->
        <div class="page-content-wrapper">
        <?php
            the_content();
        ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>