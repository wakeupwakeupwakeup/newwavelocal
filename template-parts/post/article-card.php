<div class="article_entry">
  <div class="article_title_wrapper related-card-title">
  <?php
    the_title( '<h2>', '</h2>' );
  ?>
  </div>
  <div class="article-card"  style="background: linear-gradient(to top, #111, transparent), url(<?php echo
  get_the_post_thumbnail_url(null, 'article-card-thumbnail'); ?>); background-size: 100%; background-repeat: no-repeat; background-size: cover; background-position: center center; max-height: 100%;" id="article-<?php the_ID() ?>">
    <div class="learn-more-button-wrapper">
      <a href="<?php the_permalink(); ?>" class="learn-more-button">Узнать больше</a>
      <img src="/wp-content/themes/newwave/img/icons/learn_more_icon.png" alt="" class="learn-more-button-icon">
    </div>
  </div>
</div>