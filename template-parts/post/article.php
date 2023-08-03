
<!-- <link rel="stylesheet" href="/wp-content/themes/newwave/css/service.css">

<section class="service">
<div class="service-background">
  <div class="service-wrapper">
    <div class="service-header">
        <div class="header-mood-wrapper">
            <img src="/wp-content/themes/newwave/img/icons/category_romantic.png" alt="" class="close-icon">
        </div>
        <div class="header-close-wrapper">
        <button class="close-button"><img src="/wp-content/themes/newwave/img/icons/close_icon.png" alt="" class="close-icon"></button>
        </div>
    </div>
    <div class="service-content-wrapper">
      <div class="service-content-container">
        <div class="service-left">
            <div class="service-heading">
                <h1 class="service-name">Всё включено!</h1>
                <p class="service-short-description">
                    Соберите команду и отправляйтесь в назбываемое путешествие на роскошной яхте с
                    профессиональной командой.
                </p>
                <a href="" class="service-button">Заказать</a>
            </div>
            <div class="service-info-container">
                <ul class="service-info-list">
                    <li class="service-info-item">
                    Стоимость тура:
                    <span
                        class="service-price-before">$11,500</span>
                    <span
                        class="service-price-after">$10,500</span>
                    </li>
                    <li class="service-info-item">
                    Длительность: <span class="service-info-color">4 дня и 3 ночи</span>
                    </li>
                    <li class="service-info-item">
                    Максимальное количество: <span class="service-info-color">10 человек</span>
                    </li>
                </ul>
            </div>
            <div class="service-full-description">
                Test description
            </div>
        </div>
        <div class="service-right">
          <div class="service-photo-gallery-wrapper">
            <div class="service-photo-gallery-container">
              Photos
            </div>
          </div>
          <div class="service-video-wrapper">
            <div class="service-video-container">
              video
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
-->

<section class="article">
<div class="article-wrapper">
    <div class="header">
    <div class="heading">
        <div class="category-text">Статья</div>
        <?php
            the_title( '<h1 class="title">', '</h1>' );
        ?>
    </div>
    </div>
    <div style="
    background-size: cover;
    background: linear-gradient(to top, #0c1f29, #00000075), url('<?php echo get_the_post_thumbnail_url(null, 'article-bg-thumbnail'); ?>');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    height: 968px;
    position: absolute;
    z-index: -1;
    left: 0;
    top:0;
    filter: blur(10px);
     "></div>
    <div style="
    background: linear-gradient(to top, #111, transparent), url('<?php echo get_the_post_thumbnail_url(null, 'article-thumbnail'); ?>') no-repeat center center;
    background-size: cover;
    border-radius: 15px;
    width: 100%;
    height: 60vw;
    max-height: 730px;
    line-height: 730px;
    text-align: center;
    position: relative;
    margin-bottom: 36px;
    ">
    </div>
    <div class="article-content-wrapper">
    <?php
        the_content();
    ?>
    </div>
</div>
</section>

