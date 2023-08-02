<div class="article-card"  style="background: linear-gradient(to top, #111, transparent), url(<?php echo
get_the_post_thumbnail_url(null, 'article-card-thumbnail'); ?>); background-size: 100%" id="article-<?php the_ID() ?>">
        <div class="learn-more-button-wrapper">
          <a href="<?php the_permalink(); ?>" class="learn-more-button">Learn more</a>
          <img src="/wp-content/themes/newwave/img/icons/learn_more_icon.png" alt="" class="learn-more-button-icon">
        </div>
    </div>
