<div class="article-card"  style="background-image: url(<?php echo get_the_post_thumbnail_url(null, 'article-card-thumbnail'); ?>);" id="article-<?php the_ID() ?>">
        <div class="author-button-wrapper">
        <!--
          <div class="author-wrapper">
            <img src="/wp-content/themes/newwave/img/author_avatar.png" alt="" class="author-img">
            <div class="author-data-container">
              <span class="author-name">Ryan Gosling</span>
              <span class="author-date">11 feb, 2023</span>
            </div>
          </div>
        -->
        <div class="learn-more-button-wrapper">
          <a href="<?php the_permalink(); ?>" class="learn-more-button">Learn more</a>
          <img src="/wp-content/themes/newwave/img/icons/learn_more_icon.png" alt="" class="learn-more-button-icon">
        </div>
      </div>
    </div>
