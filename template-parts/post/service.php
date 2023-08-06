<script>
  function order(){
    const destination = $(".support-form-wrapper");
    $('html,body').animate({
        scrollTop: destination.offset().top-50
    },'slow');
  }
</script>
<div style="
    background-size: cover;
    background: linear-gradient(to top, #0c1f29, #000000B9), url('<?php echo get_the_post_thumbnail_url(null, 'service-bg-thumbnail'); ?>');
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
<div class="service-wrapper">
  <div class="service-header">
      <div class="header-mood-wrapper">
          <!--<img src="/wp-content/themes/newwave/img/icons/category_romantic.png" alt="" class="mood-icon"> -->
          <p class="mood-name mood_romantic_color">
            <?php
              $categories = get_the_category();
              if ($categories) {
                // Loop through the categories and display their names
                foreach ($categories as $category) {
                  if ($category->category_parent == 2) {
                    echo '<p class="mood-name mood_' . $category->category_nicename . '_color">' . $category->name . '</p>';
                    $mood_id = 'romantic';

                    break;
                  }
                }
              } else {
                echo 'No categories found.';
              }
            ?>
          </p>
      </div>
      <div class="header-close-wrapper">
      <!-- <button class="close-button" onclick="closePopup()"><img src="/wp-content/themes/newwave/img/icons/close_icon.png" alt="" class="close-icon"></button> -->
      </div>
  </div>
  <div class="service-content-wrapper">
    <div class="service-content-container">
      <div class="service-left">
          <div class="service-heading">
              <?php
                the_title( '<h1 class="service-name">', '</h1>' );
              ?>
              <p class="service-short-description">
                <?php
                    $short_description = get_post_custom_values('tours_short_description', get_the_ID());
                    echo $short_description[0];
                ?>
              </p>
              <button onclick="order()" class="order-button">Заказать</button>
          </div>
          <div class="service-info-container">
                <ul class="service-info-list">
                    <li class="service-info-item">
                    Стоимость тура:
                    <!--
                    <span
                        class="service-price-discount">$11,500</span>
                    -->
                    <span class="service-price-normal">
                    <?php
                        $price = get_post_custom_values('tour_price', get_the_ID());
                        echo '$' . $price[0];
                    ?>
                    </span>
                    </li>
                    <li class="service-info-item">
                    Длительность: 
                    <span class="service-info-color">
                    <?php
                        $duration_array = get_post_custom_values('tour_duration', get_the_ID());
                        if ($duration_array[0] > 1) {
                            echo $duration_array[0] . " дней";
                        } else {
                            echo "1 день";
                        }
                    ?>
                    </span>
                    </li>
                    <li class="service-info-item">
                    Максимум людей: 
                    <span class="service-info-color">
                    <?php
                        $people = get_post_custom_values('tour_max_people', get_the_ID());
                        echo $people[0];
                    ?>
                    </span>
                    </li>
                </ul>
          </div>
          <div class="service-full-description">
          <?php
            the_content();
          ?>
          </div>
      </div>
      <div class="service-right">
        <div class="service-photo-gallery-wrapper">
          <div class="service-photo-gallery-container">
          <ul id="photos_slider">
            <?php
              $photos = get_field('tour_photos');
              foreach ($photos as &$photo) {
                if ($photo) {
                  echo "
                  <li data-thumb='" . $photo . "'>
                    <img src='" . $photo . "' alt='Photo'>
                  </li>
                  ";
                }
              }
            ?>
          </ul>
          </div>
        </div>
        <!--
        <div class="service-video-wrapper">
          <div class="service-video-container">
          <iframe width="450px" height="250px"
            src="https://www.youtube.com/embed/JALbrXlsvvw"
            frameborder="0"
            allow="accelerometer; encrypted-media; gyroscope;"
            allowfullscreen>
          </iframe>
          </div>
        </div>
        -->
      </div>
    </div>
  </div>
</div>